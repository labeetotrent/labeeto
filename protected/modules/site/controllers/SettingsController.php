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

    public function actionSaveDiscovery()
    {
        $this->user->attributes = $_POST;
       if ($this->user->fitmatch_show_me == 'on') {
            $this->user->fitmatch_show_me = 1;
        }
        else {
            $this->user->fitmatch_show_me = 0;
      }
    

        if($this->user->fitmatch_gym_match == 'on') {
            $this->user->fitmatch_gym_match = 1;
       }
        else {
            $this->user->fitmatch_gym_match = 0;
        }
    
       if($this->user->matchm == 'on') {
           $this->user->matchm = 1;
        }
        else {
           $this->user->matchm = 0;
        }
 if($this->user->matchf == 'on') {
           $this->user->matchf = 1;
        }
        else {
            $this->user->matchf = 0;
        }

        if($this->user->validate())
        {
            $this->user->save();

            echo 'OK';
        }
    }
}
