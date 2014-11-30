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

    public function actionUserUpdateCustom()
    {
        if(isset($_POST['questionId']) && isset($_POST['answer']))
        {
            $question = Question::model()->findByPk($_POST['questionId']);
            if($question !== null)
            {
                $answer = Answer::model()->findByAttributes(array('question_id' => $question->id)); //@todo В принципе можно тянуть сразу по $_POST['questionId']
                if($answer !== null)
                {
                    $answer->answer = $_POST['answer'];
                    $answer->save();
                }
            }
        }
    }

    public function actionCreateCustomQuestion()
    {
        if(isset($_POST['question']) && isset($_POST['answer']))
        {
            $question = new Question();
            $question->default = 0; //@todo Unknown
            $question->question = $_POST['question'];
            $question->user_id = Yii::app()->user->getId();
            if($question->validate() && $question->save())
            {
                $answer = new Answer();
                $answer->answer = $_POST['answer'];
                $answer->question_id = $question->getPrimaryKey();
                $answer->user_id = Yii::app()->user->getId();
                $answer->save();

                print $this->renderPartial('/elements/custom_question', array('customQuestion' => $question));
            }
        }
    }
    public function actionSetAvatar()
    {
        $folder = Yii::app()->basePath.'/../uploads/';
        if(isset($_POST['photoId']))
        {
            $photo = Photo::model()->findByAttributes(array('id' => $_POST['photoId'], 'user_id' => Yii::app()->user->getId()));
            if($photo !== null)
            {
                if($user = User::model()->current());
                {
                    $img = WideImage::load($folder.'photo/'.$photo->photo);
                    $img = $img->resizeDown('120','120', 'fill');
                    $img->saveToFile($folder.'/avatar/'.$user->photo);
                    print json_encode(array('result' => 'OK', 'photo' => $user->photo));
                }
            }
        }
    }
}