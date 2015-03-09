<?php
/**
 * Created by PhpStorm.
 * User: slashman
 * Date: 26.01.15
 * Time: 9:09
 */

class Facebook {

    const RESULT_ERROR = 'ERROR';
    const RESULT_SUCCESS = 'SUCCESS';
    const RESULT_REGISTERED = 'REGISTERED';
    const RESULT_LOGON = 'LOGON';

    const MAX_PHOTOS = 2;

    private $_session;

    public function __construct($session = null)
    {
        if($session == null) {
            if (!Yii::app()->isGuest)
            {
                $user = User::model()->findByPk(Yii::app()->user->getId());
                $this->_session = new \Facebook\FacebookSession($user->facebook_token);
            }
            else
            {
                $this->_brokenSession('Guest');
                return false;
            }
        }
        else
        {
            $this->_session = $session;
        }

        try {
            $this->_session->validate();
        } catch (FacebookRequestException $ex) {
            // Session not valid, Graph API returned an exception with the reason.
            echo $ex->getMessage();
            $this->_brokenSession('FacebookRequestException');
        } catch (\Exception $ex) {
            // Graph API returned info, but it may mismatch the current app or have expired.
            echo $ex->getMessage();
            $this->_brokenSession('Exception');
        }
    }

    private function _brokenSession($message = '')
    {
        die($message); //@todo Remove
        Yii::app()->redirect('http://ya.ru');
    }

    public function updateToken()
    {
        $longSession = $this->_session->getLongLivedSession();
        $this->_session = new \Facebook\FacebookSession($longSession->getToken());
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
                $cover = $this->getCover();
                var_dump($cover);die();
                $dbUser->email = $user_info->getEmail();
                $dbUser->fname = $user_info->getFirstName();
                $dbUser->address = $user_info->getLocation()->getProperty('name');
                $dbUser->gender = $this->getGender($user_info->getGender());
                $dbUser->birthday = $this->getBirthday($user_info->getBirthday());
                $dbUser->about = $user_info->getProperty('bio');
                $dbUser->facebook_token = $this->_session->getToken();
                $dbUser->facebook_cover = $this->saveCover($cover);
                $dbUser->save();

                if($this->login($dbUser->facebook_id, $dbUser->facebook_token))
                    return self::RESULT_SUCCESS; //Already registered
            }
            else
            {
                $avatar = $this->getAvatar();
                $cover = $this->getCover();
                $dbUser = new User();
                $dbUser->password = md5($user_info->getId());
                $dbUser->username = $user_info->getFirstName();
                $dbUser->facebook_id = $user_info->getId();
                $dbUser->facebook_token = $this->_session->getToken();
                $dbUser->facebook_cover = $this->saveCover($cover);
                $dbUser->photo = $this->saveAvatar($avatar);
                $dbUser->address = $user_info->getLocation()->getProperty('name');
                $dbUser->gender = $this->getGender($user_info->getGender());
                $dbUser->birthday = $this->getBirthday($user_info->getBirthday());
                $dbUser->about = $user_info->getProperty('bio');
                $dbUser->created = new CDbExpression('NOW()');
                $dbUser->updated = new CDbExpression('NOW()');

                if($dbUser->validate())
                {
                    if($dbUser->save())
                    {
                        //AddUser to OpenFire
                        $ofUser = new UserService(false);
                        $ofUser->api('add', array($dbUser->id, $dbUser->password, $dbUser->username, $dbUser->email));

                        $this->grabUserPhotos($dbUser->getPrimaryKey());

                        if($this->login($dbUser->facebook_id, $dbUser->facebook_token))
                            return self::RESULT_REGISTERED;
                    }
                }
            }
        }
        return self::RESULT_ERROR;
    }

    public function login($facebookUid, $session)
    {
        if(!Yii::app()->user->isGuest)
            Yii::app()->user->logout(true);


        $identity = new FacebookIdentity($facebookUid, $session);
        if($identity->authenticate())
        {
            Yii::app()->user->login($identity, (Yii::app()->params['loggedInDays'] * 60 * 60 * 24 ));
            return true;
        }

        return null;
    }
    public function getGender($gender)
    {
        if($gender == 'male')
            return 0;
        else
            return 1;
    }

    public function getLatestPhotos()
    {
        $request = new \Facebook\FacebookRequest(
            $this->_session,
            'GET',
            '/me/photos/uploaded'
        );
        $response = $request->execute();
        return $response->getGraphObject();
    }

    private function grabUserPhotos($userId)
    {
        $userPhotos = $this->getLatestPhotos()->getProperty('data')->asArray();
        for($i = 0; $i < self::MAX_PHOTOS; $i++)
        {
            $photo = $userPhotos[$i];
            //Save source
            $file = explode('.', $photo->source);
            $fileExtension = explode('?', $file[count($file)-1]);
            $fileExtension = $fileExtension[0];
            $fileName = md5($photo->source.rand()).'.'.$fileExtension;

            if(file_put_contents(Yii::app()->basePath.'/../uploads/photo/'.$fileName,file_get_contents($photo->source)))
            {
                $dbPhoto = new Photo();
                $dbPhoto->photo = $fileName;
                $dbPhoto->date = new CDbExpression('NOW()');
                $dbPhoto->user_id = $userId;
                $dbPhoto->save();
            }
        }
    }

    public function getBirthday($birthday)
    {
        return $birthday->format('Y-m-d');
    }
    public function getAvatar()
    {
        $request = new \Facebook\FacebookRequest(
            $this->_session,
            'GET',
            '/me/picture',
            array (
                'redirect' => false,
                'height' => '200',
                'type' => 'normal',
                'width' => '200',
            )
        );
        $response = $request->execute();
        return $response->getGraphObject()->asArray();
    }
    public function getCover()
    {
        $request = new \Facebook\FacebookRequest(
            $this->_session,
            'GET',
            '/me',
            array (
                'fields' => 'cover'
            )
        );
        $response = $request->execute();
        return $response->getGraphObject()->asArray();
    }
    public function getAbout()
    {
        $request = new \Facebook\FacebookRequest(
            $this->_session,
            'GET',
            '/me'
        );
        $response = $request->execute();
        return $response->getGraphObject()->asArray();
    }
    public function saveAvatar($graphArray, $overrideFileName = null)
    {
        $file = explode('.', $graphArray['url']);
        $fileExtension = explode('?', $file[count($file)-1]);
        $fileExtension = $fileExtension[0];
        $fileName = md5($graphArray['url'].rand()).'.'.$fileExtension;

        if(!empty($overrideFileName))
            $fileName = $overrideFileName;

        if(file_put_contents(Yii::app()->basePath.'/../uploads/avatar/'.$fileName,file_get_contents($graphArray['url'])))
            return $fileName;
        else
            die(':(');
    }
    public function saveCover($graphArray, $overrideFileName = null)
    {
        $file = explode('.', $graphArray['source']);
        $fileExtension = explode('?', $file[count($file)-1]);
        $fileExtension = $fileExtension[0];
        $fileName = $graphArray['id'].'.'.$fileExtension;

        if(!empty($overrideFileName))
            $fileName = $overrideFileName;

        if(file_put_contents(Yii::app()->basePath.'/../uploads/cover/'.$fileName,file_get_contents($graphArray['source'])))
            return $fileName;
        else
            die(':(');
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