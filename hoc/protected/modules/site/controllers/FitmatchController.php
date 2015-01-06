<?php
class FitmatchController extends SiteBaseController
{
    public $layout = 'feed';
    public $user;


    public function filters()
    {
        return array(
            'member',
        );
    }

    public function actionIndex()
    {
        $this->user = User::model()->findByPk(Yii::app()->user->id);
        $this->render('index');
    }
}