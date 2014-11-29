<?php
class AjaxController extends SiteBaseController {
    public function actionUserUpdateAbout()
    {
        if(isset($_POST['about']))
        {
            $user = User::model()->findByPk(Yii::app()->user->getId());
            if($user !== null)
            {
                $user->about = $_POST['about'];
                $user->save();
            }
        }
    }
    public function actionUserUpdateEducation()
    {
        if(isset($_POST['education']))
        {
            $user = User::model()->findByPk(Yii::app()->user->getId());
            if($user !== null)
            {
                $user->education = $_POST['education'];
                $user->save();
            }
        }
    }
    public function actionUserUpdateReligion()
    {
        if(isset($_POST['religion']))
        {
            $user = User::model()->findByPk(Yii::app()->user->getId());
            if($user !== null)
            {
                $user->religion = $_POST['religion'];
                $user->save();
            }
        }
    }
    public function actionUserUpdateEthnicity()
    {
        if(isset($_POST['ethnicity']))
        {
            $user = User::model()->findByPk(Yii::app()->user->getId());
            if($user !== null)
            {
                $user->ehtnicity = $_POST['ethnicity'];//@todo TYPO
                $user->save();
            }
        }
    }
    public function actionUserUpdateHeight()
    {
        if(isset($_POST['height']))
        {
            $user = User::model()->findByPk(Yii::app()->user->getId());
            if($user !== null)
            {
                $user->height = $_POST['height'];
                $user->save();
            }
        }
    }
    public function actionUserUpdateChildren()
    {
        if(isset($_POST['children']))
        {
            $user = User::model()->findByPk(Yii::app()->user->getId());
            if($user !== null)
            {
                $user->children = $_POST['children'];
                $user->save();
            }
        }
    }
    public function actionUserUpdatePassion()
    {
        if(isset($_POST['passion']))
        {
            $user = User::model()->findByPk(Yii::app()->user->getId());
            if($user !== null)
            {
                $user->passion = $_POST['passion'];
                $user->save();
            }
        }
    }
    public function actionUserUpdateGym()
    {
        if(isset($_POST['gym']))
        {
            $user = User::model()->findByPk(Yii::app()->user->getId());
            if($user !== null)
            {
                $user->gym = $_POST['gym'];
                $user->save();
            }
        }
    }
}