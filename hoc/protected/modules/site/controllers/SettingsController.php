<?php
/**
 * Created by PhpStorm.
 * User: slashman
 * Date: 09.03.15
 * Time: 23:09
 */

class SettingsController extends SiteBaseController
{
    public $layout = 'mobile_feed';
    public $user;
    public function beforeAction($action)
    {
        $this->user = User::model()->findByPk(Yii::app()->user->getId());
        return true;
    }
    public function actionDiscovery()
    {
        $this->render('discovery');
    }
    public function actionSystem()
    {
        $this->render('system');
    }
    public function actionContact()
    {
        $this->render('contact');
    }
    public function actionShare()
    {
        $this->render('share');
    }
}