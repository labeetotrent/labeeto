
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
        $params = [];

        //Optimize

        $criteria->with = array('fitmatchMy', 'fitmatchMe');
	if ($this->user->matchf == 1 && $this->user->matchm == 1) {
        $criteria->addCondition('gender <> '.$this->user->gender or 'gender == '.$this->user->gender);
	}
	elseif ($this->user->matchf == 1) {
	$criteria->addCondition('gender = 1');
	}
	elseif ($this->user->matchm == 1) {
	$criteria->addCondition('gender = 0');
	}
	else {
	$criteria->addCondition('gender = 3');
	}
        $criteria->addCondition('t.id <> :id');

//temp removing check for saved fitmatch for testing purposes
//      $criteria->addCondition('t.id NOT IN(SELECT to_user FROM fitmatch WHERE from_user = :id)');
  //      $criteria->addCondition('t.id NOT IN(SELECT from_user FROM fitmatch WHERE to_user = :id)');
        $criteria->addCondition('t.fitmatch_show_me = 1');
        $criteria->addCondition('YEAR(NOW()) - YEAR(t.birthday) >= :fromAge');
        $criteria->addCondition('YEAR(NOW()) - YEAR(t.birthday) <= :toAge');
        $criteria->addCondition('DISTANCE(t.lat, t.lon, :userId) <= :distance');

        $params[':fromAge']  = $this->user->fitmatch_age_lower;
        $params[':toAge']    = $this->user->fitmatch_age_upper;
        $params[':distance'] = $this->user->fitmatch_distance;
        $params[':userId']   = Yii::app()->user->getId();

  //      if($this->user->fitmatch_gym_match && $this->user->gym) { //Gym Match
  //          $criteria->addCondition('t.gym = :gym');
  //          $params[':gym'] = $this->user->gym;
  //      }

        $params[':id'] = Yii::app()->user->getId();
        $criteria->params = $params;

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
		$message = new Chat();
            $message->is_read = 0;
            $message->user_from = Yii::app()->user->getId();
            $message->user_to = $newFitmatch->to_user;
            $message->created = new CDbExpression('NOW()');
            $message->updated = new CDbExpression('NOW()');
 	    $message->message = "I saw you on Fitmatch!";       

//$message->message = CHtml::encode('[FITMATCH]');
            
$message->save();
                //   $notification = new Notification();
                 //   $notification->author_id = Yii::app()->user->getId();
                 //   $notification->type = 'FITMATCH';
                 //   $notification->user_id = $newFitmatch->to_user;
                 //   $notification->save();
                    $this->redirect(array('/fitmatch/index'));
                }
            }
        }


        if($fitmatch)
            $this->render('index', compact('fitmatch'));
        else
            $this->render('no_more');
    }
}
