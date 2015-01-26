<?php
/**
 * Created by PhpStorm.
 * User: slashman
 * Date: 26.01.15
 * Time: 9:09
 */

class Facebook {
    private $_session;

    public function __construct($session = null)
    {
        if(!$session) {
            if (!Yii::app()->isGuest)
            {
                $user = User::model()->findByPk(Yii::app()->user->getId());
                $this->_session = new \Facebook\FacebookSession($user->facebook_token);
            }
            else
            {
                $this->_brokenSession();
                return false;
            }
        }
        else
        {
            $this->_session = new \Facebook\FacebookSession($session);
        }

        try {
            $this->_session->validate();
        } catch (FacebookRequestException $ex) {
            // Session not valid, Graph API returned an exception with the reason.
            $this->_brokenSession();
            echo $ex->getMessage();
        } catch (\Exception $ex) {
            // Graph API returned info, but it may mismatch the current app or have expired.
            $this->_brokenSession();
            echo $ex->getMessage();
        }
    }

    private function _brokenSession()
    {
        Yii::app()->redirect('http://ya.ru');
    }

    public function updateToken()
    {
        $longSession = $this->_session->getLongLivedSession();
        $this->_session = $longSession = $longSession->getToken();
    }

    public function register()
    {
        $user_info = $this->getUserInfo();

        if($user_info)
        {
            $this->updateToken();
            $dbUser = User::model()->findByAttributes(array('facebook_id' => $user_info->getId()));
            if($dbUser)
            {
                $dbUser->facebook_token = $this->_session->getToken();
                $dbUser->save();
                return false; //Already registered
            }
            else
            {
                $dbUser = new User();
                $dbUser->username = $user_info->getName();
                $dbUser->email = $user_info->getEmail();
                $dbUser->fname = $user_info->getFirstName();
                $dbUser->lname = $user_info->getLastName();
                $dbUser->facebook_id = $user_info->getId();
                $dbUser->facebook_token = $this->_session->getToken();
                $dbUser->address = '';
                $dbUser->created = new CDbExpression('NOW()');
                $dbUser->updated = new CDbExpression('NOW()');
            }
        }
    }

    public function getUserInfo()
    {
        $user_profile = (new \Facebook\FacebookRequest(
            $this->_session, 'GET', '/me'
        ))->execute()->getGraphObject(\Facebook\GraphUser::className());

        if($user_profile)
            return $user_profile;
        else
            return false;
    }
}