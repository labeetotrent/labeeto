<?php
class AjaxController extends SiteBaseController {
    const PAGE_SIZE = 10;
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
            $gym = Gym::model()->findByAttributes(array('name' => $_POST['gym']));
            if($gym === null)
            {
                $gym = new Gym();
                $gym->name = $_POST['gym'];
                $gym->save();
            }
            $user = User::model()->findByPk(Yii::app()->user->getId());
            if($user !== null)
            {
                $user->gym = $gym->getPrimaryKey();
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
    public function actionGymAutocomplete($query)
    {
        $gyms = array();
        foreach(Gym::model()->findAll(array('condition' => "name LIKE '%".$query."%'")) as $gym)
        {
            $element = array('value' => $gym->name, 'data' => $gym->name);
            $gyms[] = $element;
        }

        print json_encode(array('query' => $query, 'suggestions' => $gyms));
    }
    public function actionPassionAutocomplete($query)
    {
        $fitnessInterests = array();
        foreach(FitnessInterest::model()->findAll(array('condition' => "name LIKE '%".$query."%'")) as $fitnessInterest)
        {
            $element = array('value' => $fitnessInterest->name, 'data' => $fitnessInterest->name);
            $fitnessInterests[] = $element;
        }

        print json_encode(array('query' => $query, 'suggestions' => $fitnessInterests));
    }

    public function actionVote()
    {
        $response = array('result' => 'NOT_VOTED');
        if(isset($_POST['id']) && isset($_POST['vote']))
        {
            $achievement = Achievements::model()->findByPk($_POST['id']);

            if(in_array($_POST['vote'], array('0','1')) && $achievement !== null)
            {
                $vote = Vote::model()->findByAttributes(array('user_id' => Yii::app()->user->getId(), 'achievements_id' => $_POST['id']));
                if($vote === null)
                {
                    $vote = new Vote();
                    $vote->achievements_id = $achievement->getPrimaryKey();
                    $vote->user_id = Yii::app()->user->getId();
                    $vote->created = date('Y-m-d H:i:s');
                    $vote->ip = $_SERVER['REMOTE_ADDR'];
                    $vote->down_vote = -1;
                    $vote->up_vote = -1;
                }
                if($_POST['vote'] == '1')
                {
                    $vote->down_vote = 0;
                    $vote->up_vote = 1;
                    $vote->updated = date('Y-m-d H:i:s');
                    $vote->save();
                    $core = Achievements::model()->getCore($achievement->id);
                    Achievements::model()->updateByPk($achievement->id, array('vote' => $core));
                    $response['result'] = 'VOTED';
                    $response['amount'] = $core;
                    $response['direction'] = 'UP';
                }
                elseif($_POST['vote'] == '0')
                {
                    if($vote->up_vote == -1 && $vote->down_vote == -1)
                    {
                        if(($achievement->vote - 1) >= 0)
                        {
                            $vote->down_vote = 1;
                            $vote->up_vote = 0;
                            $vote->updated = date('Y-m-d H:i:s');
                            $vote->save();
                        }
                        else
                            $vote->delete();
                        $core = Achievements::model()->getCore($achievement->id);
                        Achievements::model()->updateByPk($achievement->id, array('vote' => $core));
                        $response['result'] = 'VOTED';
                        $response['amount'] = $core;
                        $response['direction'] = 'DOWN';
                    }
                    elseif($vote->up_vote == '1' && $vote->down_vote == '0')
                    {
                        if(($achievement->vote - 2) >= 0)
                        {
                            $vote->down_vote = 1;
                            $vote->up_vote = 0;
                            $vote->updated = date('Y-m-d H:i:s');
                            $vote->save();
                        }
                        else
                            $vote->delete();

                        $core = Achievements::model()->getCore($achievement->id);
                        Achievements::model()->updateByPk($achievement->id, array('vote' => $core));
                        $response['result'] = 'VOTED';
                        $response['amount'] = $core;
                        $response['direction'] = 'DOWN';
                    }
                }
            }
        }

        print json_encode($response);
    }

    public function actionGetPosts()
    {
        if(isset($_GET['offset']) && isset($_GET['type']))
        {
            $posts = array();
            $info_user  = User::model()->findByPk(Yii::app()->user->id);
            $reported   = ReportUser::model()->getBlockedUser(Yii::app()->user->id) ;//"1,2,5,4,15";
            $suspended  = User::model()->getSuspendedUser();
            $trending = SearchTrending::model()->getTop5Search();
            $condition = '';
            if($reported != 0)
                $condition .= " AND t.user_id NOT IN (". $reported .") ";
            if( $suspended != 0 )
                $condition .= " AND t.user_id NOT IN (". $suspended .") ";

            if($_GET['type'] == 'POPULAR')
            {
                $posts = Achievements::model()->findAll(array(
                        'condition' => "status = ".Achievements::STATUS_ACTIVE . $condition,
                        'order' => 'vote DESC',
                        'offset' => $_GET['offset'],
                        'limit' => self::PAGE_SIZE,
                ));
            }
            elseif($_GET['type'] == 'RECENT')
            {
                $posts = Achievements::model()->findAll(array(
                        'condition' => "status = ".Achievements::STATUS_ACTIVE . $condition,
                        'order' => 'id DESC ',
                        'offset' => $_GET['offset'],
                        'limit' => self::PAGE_SIZE,
                ));
            }
            elseif($_GET['type'] == 'SEARCH')
            {
                $search = '';
                if(isset($_GET['search'])){
                    $search = preg_replace('/[^A-Za-z0-9\-]/', '', $_GET['search']);
                    $str_search = Achievements::model()->getIdSearch($search);
                    SearchTrending::model()->addNewCharacter($search);
                    $posts = Achievements::model()->findAll(array(
                            'condition' => "status = ".Achievements::STATUS_ACTIVE . $condition . $str_search,
                            'order' => 'id DESC ',
                            'offset' => $_GET['offset'],
                            'limit' => self::PAGE_SIZE,
                    ));
                }
                else
                {
                    $posts = Achievements::model()->findAll(array(
                            'condition' => "status = ".Achievements::STATUS_ACTIVE . $condition,
                            'order' => 'id DESC ',
                            'offset' => $_GET['offset'],
                            'limit' => self::PAGE_SIZE,
                    ));
                }
            }
            $finished = (count($posts) < self::PAGE_SIZE) ? 1 : 0;

            $output = '';
            foreach($posts as $post)
            {
                if($_GET['type'] == 'POPULAR')
                    $output .= $this->renderPartial('/elements/popular_view', array('data' => $post), true);
                elseif($_GET['type'] == 'RECENT')
                    $output .= $this->renderPartial('/elements/recent_view', array('data' => $post), true);
                elseif($_GET['type'] == 'RECENT')
                    $output .= $this->renderPartial('/elements/trending_view', array('data' => $post), true);
            }

            $response = array('finished' => $finished, 'output' => $output);

            print json_encode($response);
        }
    }

    public function actionAddComment()
    {
        if(isset($_POST['postId']) && isset($_POST['comment']))
        {
            $comment = new AchievementComment();
            $comment->achievement_id = $_POST['postId'];
            $comment->content = $_POST['comment'];
            $comment->created = new CDbExpression('NOW()');
            $comment->user_id = Yii::app()->user->getId();
            $comment->save();

            print $this->renderPartial('/elements/achievement_comment', array('data' => $comment, 'hidden' => 1), true);
        }
    }
}