<?php
/**
 * Internal Identity Class
 * Basically verifies a member by his email from the DB
 *
 *
 */
class FacebookIdentity extends CUserIdentity
{
    /**
     * @var int unique member id
     */
    private $_id;

    /**
     * Authenticate a member
     *
     * @return int value greater then 0 means an error occurred
     */
    public function authenticate()
    {
        $record = User::model()->findByAttributes(array('facebook_id' => $this->username));

        if($record->status ==1) {
            $this->errorCode=self::ERROR_BLOCKED;
            $this->errorMessage = Yii::t('members', 'Sorry, But the account is blocked.');
        }
        else {
            $this->_id = $record->id;

            $auth=Yii::app()->authManager;
            if(!$auth->isAssigned($record->role,$this->_id))  {
                if($auth->assign($record->role,$this->_id))
                {
                    Yii::app()->authManager->save();
                }
            }
            // We add username to the state
            //$this->setState('fullname', $record->firstname." ".$record->lastname);
            $this->setState('username', $record->username);
            $this->setState('email', $record->email);
            $this->setState('role', $record->role);
            $this->setState('facebook_id', $record->facebook_id);
            $this->setState('facebook_token', $record->facebook_token);
            $this->errorCode = self::ERROR_NONE;
            $record->last_logged = date('Y-m-d H:i:s');
            $record->is_online   = User::USER_ONLINE;
            $record->save();
        }

        return !$this->errorCode;
    }

    /**
     * @return int unique member id
     */
    public function getId()
    {
        return $this->_id;
    }
}