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

    function beforeAction($action) {
        $this->activeFooter = 'fitmatch';
        return true;
    }

    public function actionIndex()
    {
        $this->user = User::model()->findByPk(Yii::app()->user->id);
        $attributes = array();
        $condition = '';
        $criteria = new CDbCriteria();


        //Optimize

        $criteria->with = array('fitmatchMy', 'fitmatchMe');

        $criteria->addCondition('gender <> '.$this->user->gender);
        $criteria->addCondition('t.id <> :id');
        $criteria->addCondition('t.id NOT IN(SELECT to_user FROM fitmatch WHERE from_user = :id)');
        $criteria->addCondition('t.id NOT IN(SELECT from_user FROM fitmatch WHERE to_user = :id)');

        $criteria->params = array(':id' => Yii::app()->user->getId());

        $criteria->order = 'RAND()';

        $fitmatch = User::model()->find($criteria);

        $newFitmatch = new Fitmatch();

        if(isset($_POST['Fitmatch']))
        {
            $newFitmatch->attributes = $_POST['Fitmatch'];
            $newFitmatch->from_user = Yii::app()->user->getId();
            if($newFitmatch->validate())
            {
                if($newFitmatch->save() && $newFitmatch->result == 1)
                {
                    $notification = new Notification();
                    $notification->author_id = Yii::app()->user->getId();
                    $notification->type = 'FITMATCH';
                    $notification->user_id = $newFitmatch->to_user;
                    $notification->save();
                    $this->redirect(array('/fitmatch/index'));
                }
            }
        }



        $this->render('index', compact('fitmatch'));
    }
}