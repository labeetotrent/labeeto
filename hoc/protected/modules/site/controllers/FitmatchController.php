<?php
class FitmatchController extends SiteBaseController
{
    public $layout = 'feed';
    public $user;

    public function actionIndex()
    {
        $this->user = User::model()->findByPk(Yii::app()->user->id);
        $this->render('index');
    }
}