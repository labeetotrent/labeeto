<?php

class NotificationController extends SiteBaseController
{

    public $layout = 'feed';
    public $user;

    public function actionIndex()
    {
        $this->user = User::model()->findByPk(Yii::app()->user->getId());
        $this->render('index');
    }

}