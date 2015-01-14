<?php

class NotificationController extends SiteBaseController
{

    public $layout = 'feed';
    public $user;

    public function actionIndex()
    {
        $this->user = User::model()->findByPk(Yii::app()->user->getId());
        $notifications = Notification::model()->findAllByAttributes(array('user_id' => $this->user->getPrimaryKey()));

        $this->render('index', compact('notifications'));
    }

    public function actionAjaxReadNotifications()
    {
        Notification::model()->updateAll(array('is_read' => 1), 'user_id = :id', array(':id' => Yii::app()->user->getId()));
    }

}