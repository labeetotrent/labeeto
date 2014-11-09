<?php

class UserController extends SiteBaseController {
    public $text;
    public $user, $question;
    const PAGE_SIZE     = 10;
    public function init()
	{
		parent::init();
		
		$this->breadcrumbs[ Yii::t('global', 'Users') ] = array('user/index');
		//$this->pageTitle[] = Yii::t('global', 'Users');
	}
    
	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */

    public function actionLoginUser()
    {
        $model=new LoginForm;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if(isset($_POST['LoginForm']))
        {
            $model->attributes=$_POST['LoginForm'];
           // var_dump($_POST['LoginForm']); exit;
            if( $model->validate() )
            {
                // Login
                $identity = new InternalIdentity($model->email, $model->password);
                if($identity->authenticate())
                {
                    Yii::app()->user->setFlash('success', Yii::t('global', 'Thanks. You are now logged in.'));
                    Yii::app()->user->login($identity, (Yii::app()->params['loggedInDays'] * 60 * 60 * 24 ));
                    if((isset($_POST['LoginForm']['rememberme']) && ($_POST['LoginForm']['rememberme'] == 1))){
                       $duration = $model->rememberme ? 3600*24*0.5 : 0; //12 hours
                       Yii::app()->user->login($identity, $duration);
                    }
                    if((isset($_POST['LoginForm']['keepmelogged']) && ($_POST['LoginForm']['keepmelogged'] == 1))){
                       //$duration = $model->keepmelogged ? 3600*24*0.5 : 3600; //1 hours
                        $duration  = $model->keepmelogged = 3600*24*0.5;
                       Yii::app()->user->login($identity, $duration);
                    }
                    
                    $this->redirect('/my_feed');
                }
                else{
                    Yii::app()->user->setFlash('error', $identity->errorMessage);
                }
            }
        }
        $pop_up = true;
        $this->render('../index/index', compact('pop_up'));
    }

    public function actionLogout()
    {
        // Guests are not allowed
        if( Yii::app()->user->isGuest )
        {
            $this->redirect(Yii::app()->homeUrl);
        }
        $userOff = User::model()->findByPk( Yii::app()->user->id );
        $userOff->is_online = User::USER_OFFLINE;
        $userOff->save();

        Yii::app()->user->logout(true);
        Yii::app()->user->setFlash('success', Yii::t('global', 'You are now logged out.'));
        $this->redirect(Yii::app()->homeUrl);
    }

	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='user-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

    public function actionChangePassword(){

        $model =  new User();
        if(isset($_POST['User'])){
            $oldPassword = $model->hashPassword( $_POST['User']['oldpassword']);
            $infoUser = $model->findByPk(Yii::app()->user->id);
            if($oldPassword == $infoUser->password){
                $newPass = $model->hashPassword($_POST['User']['newpassword']);
                $model->updateByPk(Yii::app()->user->id,array('password'=>$newPass));
                Yii::app()->user->setFlash('success', Yii::t('login', 'Change password successful'));
            } else {
                Yii::app()->user->setFlash('error', Yii::t('login', 'Old Password incorrect, Please check again!'));
            }
        }
        $this->render('change_password',array(
            'model'=>$model,
        ));
    }

    public function actionLostPassword (){
        $email =$_GET['email'];
        $model =  new LostPasswordForm;
        $member = User::model()->findByAttributes(array('email' => $email));
            if($member){
                $password = $member->generatePassword(8);
                $hashedPassword = $member->hashPassword( $password);
                $message = Yii::t('global', "Dear {username},<br /><br />
    									We have reseted your password successfully.<br /><br />
    									You new password is: <b>{password}</b><br />",
                    array( '{username}' => $member->username, '{password}' => $password ));

                $message .= Yii::t('global', '<br /><br />----------------<br />Regards,<br />The {team} Team.<br />', array('{team}'=>Yii::app()->name));

                Utils::sendMail(Yii::app()->params['emailout'], $member->email, Yii::t('global', 'Password Reset Completed'), $message);

                User::model()->updateByPk($member->id, array('password'=>$hashedPassword));

                echo Yii::t('global', 'Thank You. Your password was reset. Please check your email for you new generated password.');
            }else {
                echo Yii::t('global', 'Your email not correct, Please check again!');
            }
    }

    public function actionMy_feed(){
        $this->layout = 'feed';
        //echo Achievements::model()->getCore(22); exit;
        if(!Yii::app()->user->isGuest){
            $info_user  = User::model()->findByPk(Yii::app()->user->id);
            $reported   = ReportUser::model()->getBlockedUser(Yii::app()->user->id) ;//"1,2,5,4,15";
            $suspended  = User::model()->getSuspendedUser();
            $trending = SearchTrending::model()->getTop5Search();
            $condition = '';
            if($reported != 0)
                $condition .= " AND t.user_id NOT IN (". $reported .") ";
            if( $suspended != 0 )
                $condition .= " AND t.user_id NOT IN (". $suspended .") ";
            $achievement = new CActiveDataProvider('Achievements', array(
                'criteria' => array(
                    'condition' => "status = ".Achievements::STATUS_ACTIVE . $condition,
                    'order' => 'id DESC ',
                ),
                'pagination'=>array(
                    'pageSize'=> self::PAGE_SIZE,
                )
            ));
            $popular = new CActiveDataProvider('Achievements', array(
                'criteria' => array(
                    'condition' => "status = ".Achievements::STATUS_ACTIVE . $condition,
                    'order' => 'vote DESC ',
                ),
                'pagination'=>array(
                    'pageSize'=> self::PAGE_SIZE,
                )
            ));
            $search = '';
            if(isset($_GET['search'])){
                $search = preg_replace('/[^A-Za-z0-9\-]/', '', $_GET['search']);
                $str_search = Achievements::model()->getIdSearch($search);
                SearchTrending::model()->addNewCharacter($search);
                $search = new CActiveDataProvider('Achievements', array(
                    'criteria' => array(
                        'condition' => "status = ".Achievements::STATUS_ACTIVE . $condition . $str_search,
                        'order' => 'id DESC ',
                    ),
                    'pagination'=>array(
                        'pageSize'=> self::PAGE_SIZE,
                    )
                ));
            }else{
                $search = new CActiveDataProvider('Achievements', array(
                    'criteria' => array(
                        'condition' => "status = ".Achievements::STATUS_ACTIVE . $condition,
                        'order' => 'id DESC ',
                    ),
                    'pagination'=>array(
                        'pageSize'=> self::PAGE_SIZE,
                    )
                ));
            }
            $this->user = User::model()->findByPk(Yii::app()->user->id);
            $this->render('my_feed', compact('achievement', 'info_user', 'popular', 'search', 'trending'));
        } else {
            $this->redirect('/');
        }

    }

    public function actionAchievement(){
        if(Yii::app()->user->isGuest){
            $this->redirect('/');
        }
        $achievement    = new Achievements();
        if(isset($_POST['media_post'])){
            $folder = Yii::app()->basePath.'/../uploads/photo/';

            $filename = $this->generateRandomString().$_FILES['media_post']['name'];
            if (move_uploaded_file($_FILES['media_post']['tmp_name'], $folder.$filename)){
                $achievement->media = $filename;
            }
        }
        $this->user     = User::model()->findByPk(Yii::app()->user->id);
        $content        = $_POST['content'];
        $achievement->content = $content;
        $achievement->user_id = Yii::app()->user->id;
        $achievement->save();
        $this->redirect('/my_feed');

    }

    public function actionLogin(){
        Yii::app()->Facebook->facebook();
        echo '<script type="text/javascript"> window.close();</script>';
    }

    public function actionLogoutFacebook(){

        if(isset($_SESSION['User']) && !empty($_SESSION['User'])){
            session_destroy();
        }
        $this->redirect('/');
    }
    public function actionRegister(){
        $bd                 = explode( '_', $_GET['birthday'] );
        $model              = new User();
        $model->username    = $_GET['username'];
        $model->email       = $_GET['email'];
        $model->password    = md5(sha1($_GET['password']));
        $model->birthday    = $bd[0].'-'.$bd[1].'-'.$bd[2];
        $model->height      = $_GET['height'];
        $model->gender      = $_GET['gender'];
        $model->ehtnicity   = $_GET['ehtnicity'];
        $model->gender_look = $_GET['gender_look'];
        $model->address     = $_GET['address'];
        $model->career      = $_GET['career'];
        $model->education   = $_GET['education'];
        $model->religion    = $_GET['religion'];
        $model->excercise   = $_GET['excercise'];
        $model->passion     = $_GET['passion'];
        $model->goal        = $_GET['goal'];
        $model->smoke       = $_GET['smoke'];
        $model->drink       = $_GET['drink'];
        $model->relations   = $_GET['relations'];
        $model->latitude    = $_GET['latitude'];
        $model->longtitude  = $_GET['longtitude'];
        $model->photo       = $_GET['photo'];
        $model->age         = '18-19';
        if($model->save()){
            //Register Newletters
            $newletters = new Newsletter();
            $newletters->email = $_GET['email'];
            $newletters->user_id = $model->id;
            $newletters->save();

            $identity = new InternalIdentity($_GET['username'],$_GET['password']);
            if($identity->authenticate())
            {
                Yii::app()->user->login($identity, (Yii::app()->params['loggedInDays'] * 60 * 60 * 24 ));

            }
        }
    }

    public function actionCheckEmail(){
        $this->layout = '';
        $record = User::model()->findByAttributes(array(),array(
            'condition'=>'email=:email ',
            'params'=>array('email'=>$_GET['email']),

        ));
        if($record===null){
            $arrayToJs = true;
            echo json_encode($arrayToJs);
        }else {
            $arrayToJs = false;          // found user with that name
            echo json_encode($arrayToJs);
        }

    }
    public function actionCheckUser(){
        $this->layout = '';
        $record = User::model()->findByAttributes(array(),array(
            'condition'=>'username=:username ',
            'params'=>array('username'=>$_GET['username']),

        ));
        if($record===null){
            $arrayToJs = true;
            echo json_encode($arrayToJs);
        }else {
            $arrayToJs = false;          // found user with that name
            echo json_encode($arrayToJs);
        }

    }

    public function actionProfile(){
        $this->layout = 'feed';
        if(!Yii::app()->user->isGuest){
            $this->user = User::model()->findByPk(Yii::app()->user->id);
            $this->question = Answer::model()->getAnswer(Yii::app()->user->id);
            $photos = Photo::model()->findAll('is_public=1 AND user_id='.Yii::app()->user->id);
            $private = Photo::model()->findAll('is_public=0 AND user_id='.Yii::app()->user->id);
            $video = Video::model()->findAll('is_public=0 AND user_id='.Yii::app()->user->id . ' ORDER BY id DESC');
            $online    = User::model()->findByPk(Yii::app()->user->id);
            $achievements = Achievements::model()->findAll('user_id ='. Yii::app()->user->id . ' ORDER BY created desc LIMIT 3');
            $this->render('profile',compact('photos','private','online', 'achievements', 'video'));
        } else {
            $this->redirect('/');
        }

    }

    
    public function actionProfile_other(){
        $this->layout = 'feed';
        if(!Yii::app()->user->isGuest){
            $this->user = User::model()->findByPk(Yii::app()->user->id);
            $online    = User::model()->findByPk(Yii::app()->user->id);
            $this->render('profile_other', compact('online'));
        } else {
            $this->redirect('/');
        }

    }

    public function actionAdmin(){
        if(Yii::app()->user->role == 'admin') $this->redirect('/admin');
        $model = new LoginForm;

        if( isset($_POST['LoginForm']) )
        {
            $model->attributes = $_POST['LoginForm'];
            if( $model->validate() )
            {
                // Login
                $identity = new InternalIdentity($model->email, $model->password);
                if($identity->authenticate())
                {
                    // Member authenticated, Login
                    Yii::app()->user->setFlash('success', Yii::t('login', 'Thanks. You are now logged in.'));
                    Yii::app()->user->login($identity, (Yii::app()->params['loggedInDays'] * 60 * 60 * 24 ));
                }
                else{
                    Yii::app()->user->setFlash('error', $identity->errorMessage);
                }

                // Redirect
                if(Yii::app()->user->role == 'admin') $this->redirect('/admin');
                else $this->redirect(Yii::app()->homeUrl);
            }
        }

        //$this->pageTitle[] = Yii::t('global', 'Login');
        $this->renderPartial('admin', array('model'=>$model));
    }

    public function actionUploadAvatar(){
        if (isset($_FILES['avatar'])){
            $folder = Yii::app()->basePath.'/../uploads/avatar/';

            $filename = $this->generateRandomString().$_FILES['avatar']['name'];
            if (move_uploaded_file($_FILES['avatar']['tmp_name'], $folder.$filename)){
                echo $filename;
            }
        }
    }
    function generateRandomString($length = 10) {
        return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
    }
    
    public function actionSetting(){
        $this->layout = 'feed';
        if(!Yii::app()->user->isGuest){
            $blocked = ReportUser::model()->getBlockedUser() ;//"1,2,5,4,15";
            
            if($blocked)
                $condition = "t.id IN (". $blocked .")"; //" AND .id IN (". $blocked .")"
            else
                $condition = 't.id < 0';
            $report = new CActiveDataProvider('User', array(
                'criteria' => array(
                    'condition' =>$condition,
                    'order' => 'id DESC ',
                ),
                'pagination'=>array(
                    'pageSize'=> self::PAGE_SIZE,
                )
            ));
            $this->user = User::model()->findByPk(Yii::app()->user->id);
            $this->render('setting', compact('report'));
        } else {
            $this->redirect('/');
        }

    }
    
    public function actionSaveEducation(){
        if (isset($_POST['education'])){
            User::model()->updateByPk(Yii::app()->user->id, array('education'=>$_POST['education']));
            echo Education::model()->getNameEducation($_POST['education']);
        }
    }
    
    public function actionSaveReligion(){
        if (isset($_POST['religion'])){
            User::model()->updateByPk(Yii::app()->user->id, array('religion'=>$_POST['religion']));
            echo Religion::model()->getNameReligion($_POST['religion']);
        }
    }
    
    public function actionSaveEthnicity(){
        if (isset($_POST['ehtnicity'])){
            User::model()->updateByPk(Yii::app()->user->id, array('ehtnicity'=>$_POST['ehtnicity']));
            echo Ethnicity::model()->getNameEthnicity($_POST['ehtnicity']);
        }
    }
    
    public function actionSavePassion(){
        if (isset($_POST['passion'])){
            User::model()->updateByPk(Yii::app()->user->id, array('passion'=>$_POST['passion']));
            echo $_POST['passion'];
        }
    }
    
    public function actionSaveGoal(){
        if (isset($_POST['goal'])){
            User::model()->updateByPk(Yii::app()->user->id, array('goal'=>$_POST['goal']));
            echo $_POST['goal'];
        }
    }
    
    public function actionSaveChildren(){
        if (isset($_POST['children'])){
            User::model()->updateByPk(Yii::app()->user->id, array('children'=>$_POST['children']));
            echo Children::model()->getNameChildren($_POST['children']);
        }
    }
    
    public function actionSaveHeight(){
        if ((isset($_POST['feet'])) && (isset($_POST['inches']))){
            $height = $_POST['feet'] . '.' . $_POST['inches'];
            User::model()->updateByPk(Yii::app()->user->id, array('height'=>$height));
            echo $height . ' FEET';
        }
    }
    
    public function actionSaveAbout(){
        if (isset($_POST['about'])){
            User::model()->updateByPk(Yii::app()->user->id, array('about'=>$_POST['about']));
            echo $_POST['about'] ;
        }
    }
    
    public function actionSaveExcercise(){
        if (isset($_POST['excercise'])){
            User::model()->updateByPk(Yii::app()->user->id, array('excercise'=>$_POST['excercise']));
            $t = '';
            $t.= '<span class="ws-range" role="slider" aria-readonly="false" tabindex="0" aria-disabled="false" aria-valuenow="'. $_POST['excercise'] .'" aria-valuetext="'. $_POST['excercise'] .'">';
            $t.= '<span class="ws-range-min ws-range-progress" style="margin-top: 0px; width: '. $_POST['excercise'] .'%;"></span>';
            $t.= '<span class="ws-range-rail ws-range-track" style="left: 11px; right: 9px;">';
            $t.= '<span class="ws-range-thumb" style="margin-left: -11px; margin-top: -6px; left: '. $_POST['excercise'] .'%;">';
            $t.= '</span></span></span>';
            echo $t;
        }
    }
    
    public function actionSaveDrink(){
        if (isset($_POST['drink'])){
            User::model()->updateByPk(Yii::app()->user->id, array('drink'=>$_POST['drink']));
            $t = '';
            $t.= '<span class="ws-range" role="slider" aria-readonly="false" tabindex="0" aria-disabled="false" aria-valuenow="'. $_POST['drink'] .'" aria-valuetext="'. $_POST['drink'] .'">';
            $t.= '<span class="ws-range-min ws-range-progress" style="margin-top: 0px; width: '. $_POST['drink'] .'%;"></span>';
            $t.= '<span class="ws-range-rail ws-range-track" style="left: 11px; right: 9px;">';
            $t.= '<span class="ws-range-thumb" style="margin-left: -11px; margin-top: -6px; left: '. $_POST['drink'] .'%;">';
            $t.= '</span></span></span>';
            echo $t;
            
        }
    }
    
    public function actionSaveSmoke(){
        if (isset($_POST['smoke'])){
            User::model()->updateByPk(Yii::app()->user->id, array('smoke'=>$_POST['smoke']));
            $t = '';
            $t.= '<span class="ws-range" role="slider" aria-readonly="false" tabindex="0" aria-disabled="false" aria-valuenow="'. $_POST['smoke'] .'" aria-valuetext="'. $_POST['smoke'] .'">';
            $t.= '<span class="ws-range-min ws-range-progress" style="margin-top: 0px; width: '. $_POST['smoke'] .'%;"></span>';
            $t.= '<span class="ws-range-rail ws-range-track" style="left: 11px; right: 9px;">';
            $t.= '<span class="ws-range-thumb" style="margin-left: -11px; margin-top: -6px; left: '. $_POST['smoke'] .'%;">';
            $t.= '</span></span></span>';
            echo $t;
        }
    }
    
    public function actionSaveDiet(){
        if (isset($_POST['diet'])){
            User::model()->updateByPk(Yii::app()->user->id, array('diet'=>$_POST['diet']));
            echo $_POST['diet'];
        }
    }
    
    
    public function actionSaveGym(){
        if (isset($_POST['gym'])){
            User::model()->updateByPk(Yii::app()->user->id, array('gym'=>$_POST['gym']));
            echo $_POST['gym'];
        }
    }
    
    public function actionSaveGender(){
        $user = User::model()->findByPk(Yii::app()->user->id);
        $t = '';
        if(isset($_POST['gender'])){
            User::model()->updateByPk(Yii::app()->user->id, array('gender_look'=>$_POST['gender']));
            if($_POST['gender'] == 1) 
                $gender = 'Female'; 
            else 
                $gender = 'Male';
            $t.= '<p>
                    <span class="txt-gender">'. Yii::t('global', 'Gender: ') .'</span>
                    <span class="txt-female">'. $gender .'</span>
                </p>';
        }
        
        
        if(isset($_POST['relationship'])){
            User::model()->updateByPk(Yii::app()->user->id, array('relations_look'=>$_POST['relationship']));
            $t.= '<p>
                    <span class="txt-gender">'.Yii::t('global', 'Relationship: ').'</span>
                    <span class="txt-female">'. $_POST['relationship']. '</span>
                 </p>';
        }
        
        if ((isset($_POST['age-from'])) && (isset($_POST['age-to']))){
            $age = $_POST['age-from'] . '-' . $_POST['age-to'];
            User::model()->updateByPk(Yii::app()->user->id, array('age'=>$age));
            $t.= '<p>
                <span class="txt-gender">'.Yii::t('global', 'Age: ').' </span>
                <span class="txt-female">'. $age .'</span>
             </p>';
        }
        
        if(isset($_POST['training'])){
            User::model()->updateByPk(Yii::app()->user->id, array('training'=>$_POST['training']));
            if($_POST['training'] == 1) 
                $l = 'Yes';
            else
                $l = 'No';
            $t.= '<p>
                    <span class="txt-gender">'.Yii::t('global', 'Training Buddy:').'</span>
                    <span class="txt-female">'. $l .'</span>
                 </p>';
        }
        echo $t;
    }

    public function actionAddQuestions(){
        $question = new Question();
        $question->question = $_GET['question'];
        $question->user_id = Yii::app()->user->id;
        $question->default = 0;
        $question->save();
        
        $answer = new Answer();
        $answer->answer = $_GET['answer'];
        $answer->question_id = $question->id;
        $answer->user_id = Yii::app()->user->id;
        $answer->save();
        echo $question->id;
        
    }
    
    public function actionChangeAvatar(){
        if (isset($_FILES['photo-change'])){
            $allowed_extensions = array("image/jpeg", "image/png", "image/gif", 'application/x-shockwave-flash', 'image/psd', 'image/bmp',
            'image/tiff', 'image/tiff', 'application/octet-stream',
            'image/jp2', 'application/octet-stream', 'application/octet-stream',
            'application/x-shockwave-flash', 'image/iff', 'image/vnd.wap.wbmp', 'image/xbm');
            $file_type = $_FILES['photo-change']['type'];
            $check = 1;
            foreach($allowed_extensions as $value){
                if($file_type == $value){
                   $check = 0;
                }
            }
            if($check == 0){
                
                $folder = Yii::app()->basePath.'/../uploads/avatar/';
    
                $filename = $this->generateRandomString().$_FILES['photo-change']['name'];
                move_uploaded_file($_FILES['photo-change']['tmp_name'], $folder.$filename);
                User::model()->updateByPk(Yii::app()->user->id, array('photo'=>$filename));
                echo $check; 
            }else{
                echo $check; 
            }
        }
    }

    public function actionUpdateQuestions(){
        $id_question = $_GET['id'];
        $checkQuestion = Question::model()->findByPk($id_question);
        if($checkQuestion){
            $checkQuestion->question = $_GET['question'];
            $checkQuestion->save();
            $checkAnswer = Answer::model()->findByAttributes(array("question_id"=>$id_question,'user_id'=>Yii::app()->user->id));
            if($checkAnswer){
                $checkAnswer->answer = $_GET['answer'];
                $checkAnswer->save();
            }else {
                $answer =  new Answer();
                $answer->question_id = $id_question;
                $answer->answer = $_GET['answer'];
                $answer->user_id = Yii::app()->user->id;
                $answer->save();
            }
            echo $checkQuestion->id;
        }else {
            echo 0;
        }
    }
    
    public function actionDeleteQuestions(){
        $id_question = $_GET['id'];
        $question = Question::model()->findByPk($id_question);
        if($question){
            Question::model()->deleteByPk($id_question);
            $answer =  Answer::model()->findByAttributes(array('user_id'=>Yii::app()->user->id, 'question_id'=>$id_question));
            if($answer){
                Answer::model()->deleteByPk($answer->id);
                echo $id_question;
            }else{
                echo 0;
            }
            
        }else{
            echo 0;
        }
    }

    public function actionUploadPhoto(){
        if (isset($_FILES['photos'])){
            
            $allowed_extensions = array("image/jpeg", "image/png", "image/gif", 'application/x-shockwave-flash', 'image/psd', 'image/bmp',
            'image/tiff', 'image/tiff', 'application/octet-stream',
            'image/jp2', 'application/octet-stream', 'application/octet-stream',
            'application/x-shockwave-flash', 'image/iff', 'image/vnd.wap.wbmp', 'image/xbm');
            $file_type = $_FILES['photos']['type'];
            $check = 1;
            foreach($allowed_extensions as $value){
                if($file_type == $value){
                   $check = 0;
                }
            }
            if($check == 0){
                $folder = Yii::app()->basePath.'/../uploads/photo/';
                $filename = $this->generateRandomString().$_FILES['photos']['name'];
                if (move_uploaded_file($_FILES['photos']['tmp_name'], $folder.$filename)){
                    $photo = new Photo();
                    $photo->photo = $filename;
                    $photo->is_public = 1;
                    $photo->date = date('Y-m-d h:s');
                    $photo->user_id = Yii::app()->user->id;
                    $photo->save();
                }
                echo $check;
            }else{
                echo $check;
            }
        }
    }
    public function actionUploadPrivate(){
        if (isset($_FILES['photos'])){
            
            $allowed_extensions = array("image/jpeg", "image/png", "image/gif", 'application/x-shockwave-flash', 'image/psd', 'image/bmp',
            'image/tiff', 'image/tiff', 'application/octet-stream',
            'image/jp2', 'application/octet-stream', 'application/octet-stream',
            'application/x-shockwave-flash', 'image/iff', 'image/vnd.wap.wbmp', 'image/xbm');
            $file_type = $_FILES['photos']['type'];
            $check = 1;
            foreach($allowed_extensions as $value){
                if($file_type == $value){
                   $check = 0;
                }
            }
            if($check == 0){
                $folder = Yii::app()->basePath.'/../uploads/photo/';
                $filename = $this->generateRandomString().$_FILES['photos']['name'];
                if (move_uploaded_file($_FILES['photos']['tmp_name'], $folder.$filename)){
                    $photo = new Photo();
                    $photo->photo = $filename;
                    $photo->is_public = 0;
                    $photo->date = date('Y-m-d h:s');
                    $photo->user_id = Yii::app()->user->id;
                    $photo->save();
                }
                echo $check;
            }else{
                echo $check;
            }
        }
    }
    public function actionDeletePhoto(){
        $idPhoto = $_GET['id'];
        $photo = Photo::model()->findByPk($idPhoto);
        if($photo){
            Photo::model()->deleteByPk($idPhoto);
        }

    }
    
    public function actionSearch(){
        $this->layout = 'feed';
        if(!Yii::app()->user->isGuest){
            if( isset($_POST['Search']) ){
                
                $condition      = " ";
                $ext            = " ";
                $username       = $_POST['Search']['username'];
                $gender         = $_POST['Search']['gender'];
                $age_start      = $_POST['Search']['age_start'];
                $age_end        = $_POST['Search']['age_end'];
                $within_start   = $_POST['Search']['within_start'];
                $within_end     = $_POST['Search']['within_end'];

                if( $username != '' )
                    $condition .= " username LIKE '%".$username."%'  ";
                if( $gender != '-1' ){
                    if( $username != '' )
                        $ext       = " AND ";
                    $condition .= $ext." gender = ".$gender." ";
                }
                if(  $age_start != '' ){
                    $year_age   = date("Y") - $age_start;
                    if( $username != '' || $gender != '' )
                        $ext       = " AND ";
                    $condition .= $ext." YEAR(birthday) <= ".$year_age." ";
                }
                if( $age_end != '' ){
                    $year_age_end  = date("Y") - $age_end;
                    if( $username != '' || $gender != '' || $age_start != '' )
                        $ext       = " AND ";
                    $condition .= $ext." YEAR(birthday) >= ".$year_age_end." ";
                }
                $users = new CActiveDataProvider('User', array(
                    'criteria' => array(
                        'condition' => $condition,
                        'order'     => 'membership DESC',
                    )
                ));
                $this->render('search',compact('users','username', 'gender', 'age_start', 'age_end', 'within_start', 'within_end'));
                exit;
            }
            $this->user = User::model()->findByPk(Yii::app()->user->id);
            $this->render('search');
        } else {
            $this->redirect('/');
        }

    }
    
    public function actionAdvanceSearch(){
        $this->layout = 'feed';
        if(!Yii::app()->user->isGuest){
            if( isset($_POST['Search']) ){

                $condition      = " ";
                $ext            = " ";
                $username       = $_POST['Search']['username'];
                $gender         = $_POST['Search']['gender'];
                $age_start      = $_POST['Search']['ages_start'];
                $age_end        = $_POST['Search']['ages_end'];
                $within_start   = $_POST['Search']['within'];
                $miles          = $_POST['Search']['miles'];
                $height_start   = $_POST['Search']['height_start'];
                $height_end     = $_POST['Search']['height_end'];
                $education      = $_POST['Search']['education'];
                $race           = $_POST['Search']['race'];
                $faith          = $_POST['Search']['faith'];
                $kids           = $_POST['Search']['kids'];
                $exercise_level = $_POST['Search']['exercise_level'];
                $drink_level    = $_POST['Search']['drinking_level'];
                $smoking_level  = $_POST['Search']['smoking_level'];
                $looking_friendship = $_POST['Search']['looking_friendship'];


                if( $username != '' )
                    $condition .= " username LIKE '%".$username."%'  ";

                if( $looking_friendship !='-1' ){
                    if( $username != ''  )
                        $ext       = " AND ";
                    $condition .= $ext." gender_look = ".$looking_friendship." ";
                }
                if( $gender != '-1' ){
                    if( $username != '' || $looking_friendship !='-1')
                        $ext       = " AND ";
                    $condition .= $ext." gender = ".$gender." ";
                }

                if($height_start !=''){
                    if($username !=''  ||$looking_friendship !='-1'||$gender != '-1')
                         $ext = "AND";
                    $condition .= $ext." height = ".$height_start." ";
                } 

                if($height_end !=''){
                     if($username !='' ||$looking_friendship !='-1'|| $height_start !=''||$gender != '-1')
                        $ext = "AND";
                    $condition .= $ext." height = ".$height_end." ";
                }

                if( $education !='-1'){
                    if( $username != '' ||$looking_friendship !='-1')
                        $ext       = " AND ";
                    $condition .= $ext." education = ".$education." ";
                }
                
                if($kids !='-1'){
                     if($username !='' || $education !='-1'||$looking_friendship !='-1')
                        $ext="AND";
                    $condition .= $ext." children = ".$kids." ";
                }
                if($race!='-1'){
                    if($username !='' || $education !='-1' || $kids !='-1'||$looking_friendship !='-1')
                        $ext = 'AND';
                    $condition .= $ext." ehtnicity = ".$race." ";
                }
                if($faith !='-1'){
                    if($username !=''  || $education !='-1' || $kids !='-1' || $race!='-1'||$looking_friendship !='-1')
                         $ext = 'AND';
                    $condition .= $ext." religion = ".$faith." "; 
                }

                if($exercise_level !='-1'){
                    if($username !=''  || $education !='-1' || $kids !='-1' || $race!='-1' || $faith !='-1'||$looking_friendship !='-1')
                         $ext = 'AND';
                    $condition .= $ext." smoke = ".$exercise_level." "; 
                }
                if($drink_level !='-1'){
                    if($username !=''  || $education !='-1' || $kids !='-1' || $race!='-1' || $faith !='-1' || $exercise_level !='-1'||$looking_friendship !='-1')
                         $ext = 'AND';
                    $condition .= $ext." drink = ".$exercise_level." "; 
                }

                if($smoking_level !='-1'){
                    if($username !=''  || $education !='-1' || $kids !='-1' || $race!='-1' || $faith !='-1' || $exercise_level !='-1' || $drink_level!='-1' ||$looking_friendship !='-1')
                         $ext = 'AND';
                    $condition .= $ext." drink = ".$exercise_level." "; 
                }



                if(  $age_start != '' ){
                    $year_age   = date("Y") - $age_start;
                    if( $username != '' || $gender != '' ||$looking_friendship !='-1')
                        $ext       = " AND ";
                    $condition .= $ext." YEAR(birthday) <= ".$year_age." ";
                }
                if( $age_end != '' ){
                    $year_age_end  = date("Y") - $age_end;
                    if( $username != '' || $gender != '' || $age_start != ''||$looking_friendship !='-1' )
                        $ext       = " AND ";
                    $condition .= $ext." YEAR(birthday) >= ".$year_age_end." ";
                }
                $users = new CActiveDataProvider('User', array(
                    'criteria' => array(
                        'condition' => $condition,
                        'order'     => 'membership DESC',
                    )
                ));

                $this->render('advance_search',compact('users','username', 'gender', 'age_start',   'age_end', 'within_start', 'miles','height_start', 'height_end','education','race','faith','kids','exercise_level','drink_level','smoking_level'));
                exit;
            }
            $this->user = User::model()->findByPk(Yii::app()->user->id);
            $this->render('advance_search');
        } else {
            $this->redirect('/');
        }

    }

    public function actionVerify(){
        $this->layout = 'feed';
        if(!Yii::app()->user->isGuest){
            if (isset($_FILES['verifyPhoto'])){
                $folder = Yii::app()->basePath.'/../uploads/photoVerify/';
                $filename = $this->generateRandomString().$_FILES['verifyPhoto']['name'];
                if (move_uploaded_file($_FILES['verifyPhoto']['tmp_name'], $folder.$filename)){
                    $verify = new VerifyProfile();
                    $verify->photo = $filename;
                    $verify->date = date('Y-m-d h:s');
                    $verify->code = $_POST['code'];
                    $verify->user_id = Yii::app()->user->id;
                    $verify->save();
                    $user = User::model()->findByPk(Yii::app()->user->id);
                    $user->verifyPhoto = User::WAIT_VERIFY;
                    $user->save();
                }
            }
            User::model()->findByPk(Yii::app()->user->id, array('verified'=>1));
            $this->user = User::model()->findByPk(Yii::app()->user->id);
            $this->render('verifyPhoto');
        } else {
            $this->redirect('/');
        }

    }
    
    public function actionReportUser(){
        if($_GET['user'] != Yii::app()->user->id){
            $report = new ReportUser();
            $report->user_id = Yii::app()->user->id;
            $report->blocked_user = $_GET['user'];
            $report->type_report = $_GET['type'];
            $report->content = $_GET['comment'];
            $report->achievements_id = $_GET['achievements_id'];
            $report->created = date('Y:m:d H:m:s');
            $report->updated = date('Y:m:d H:m:s');
            $report->save();
        }
    }
    
    public function actionUnlockUser(){
        $check = ReportUser::model()->findByAttributes(array('user_id'=>Yii::app()->user->id, 'blocked_user'=>$_GET['id']));
        if($check != Null){
            ReportUser::model()->deleteByPk($check->id);
        }
    }

    public function actionCheckStatusOnline(  ){
        $members = new User();
        $members->updateStatusOnline();
    }
    
    public function actionAjaxUser(){
        //$result = ReportUser::model()->findByAttributes(array('user_id'=>Yii::app()->user->id));
        $str = ReportUser::model()->getBlockedUser();
        if($str != 0){
            $request = $_GET['term'];
            if( $request !='' ){
                if($str != '')
                    $model = User::model()->findAll(array("condition"=>"t.username LIKE '$request%' AND role != 'admin' AND t.id NOT IN(". $str .")"));
    	        else
                    $model = User::model()->findAll(array("condition"=>"t.username LIKE '$request%' AND role != 'admin'"));
                $data=array();
    	        foreach($model as $get){
    	            $data[]=$get->username;
    	        }
    	        $this->layout='empty';
    	        echo json_encode($data);
    	    }
        }
    }
    
    public function actionAddBlocked(){
        if(isset($_GET['user'])){
            $nameuser = $_GET['user'];
            $data = User::model()->find( 't.username =:username', array(':username'=>$nameuser ) );
            $html = '';
            if(($data) && ($data->id != Yii::app()->user->id) ){
                $new_report = new ReportUser();
                $new_report->user_id = Yii::app()->user->id;
                $new_report->blocked_user = $data->id;
                $new_report->type_report = 'Setting';
                $new_report->content = 'Blocked in Setting Page';
                $new_report->created = date('Y:m:d H:m:s');
                $new_report->updated = date('Y:m:d H:m:s');
                $new_report->save();
                $html .= '<li id="unlock_'.$data->id.'">
                            <img src="/uploads/avatar/'. $data->photo .'">
                            <span>'. $data->username .' <a data-id="'.$data->id.'" class="UnlockUser"> Unlock</a></span>
                        </li>';
                        
                echo $html;
            }
        }
    }
    
    public function actionDetail($id){
        $this->layout = 'feed';
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $this->user = User::model()->findByPk(Yii::app()->user->id);
            $user = User::model()->findByPk(Yii::app()->user->id);
            $model = User::model()->findByPk($id);
            $question = Answer::model()->getAnswer($id);
            $photos = Photo::model()->findAll('is_public=1 AND is_approval = 1 AND user_id='.$id . ' ORDER BY date desc');
            $private = Photo::model()->findAll('is_public=0 AND is_approval = 1 AND user_id='.$id . ' ORDER BY date desc');
            $achievements = Achievements::model()->findAll('user_id ='. $id . ' ORDER BY created desc LIMIT 3');
            $favorite = FavoriteUser::model()->checkfavorite($id);
            $video = Video::model()->findAll('is_public = 0 AND user_id='.$id . ' AND is_approval = 1 ORDER BY id DESC');
            $online = User::model()->findByPk(Yii::app()->user->id);
            if($model)
                $this->render('profile_other', compact('model', 'question','photos','private', 'achievements', 'user', 'favorite', 'online', 'video'));
            else
                $this->render('my_feed');
        }else{
            $this->render('my_feed');
        }
        
    }
    
    public function actionMessage(){
        $this->layout = 'feed';
        $this->render('message');
    }
    
    public function actionNewmessage(){
        $this->layout = 'feed';
        $this->render('new_message');
    }
    
    public function actionMessagedetail(){
        $this->layout = 'feed';
        $this->render('message_detail');
    }
    
    public function actionSaveRating(){
        $score      = intval( $_GET['score'] );
        $user_id = intval( $_GET['id'] );
        $ip         =  $_SERVER['REMOTE_ADDR'];
      
        $result = new Ratings;
        $result->score = $score;
        $result->user_id = $user_id;
        $result->ip = $ip;
        $result->created = date('Y:m:d H:m:s');
        $result->updated = date('Y:m:d H:m:s');
        
        if($result->save() == false) {
            echo 'false';
        } else {
            echo 'true';
        }
    }
    
    public function actionUploadVideo(){
        if (isset($_FILES['videos'])){
            $allowed_extensions = array("3g2", "3gp", "3gpp", "asf", "dat", "divx", "dv", "f4v", "flv", "m2ts", "m4v", "mkv", "mod",
            "mov", "quicktime", "mp4", "mpe", "mpeg", "mpeg4", "mpg", "mts", "nsv", "ogm", "ogv", "qt", "tod", "ts", "vob", "wmv");
            $file_type = $_FILES['videos']['type'];
            $check = 1;
            foreach($allowed_extensions as $value){
                if($file_type == "video/".$value){
                   $check = 0;
                }
            }
            if($check == 0){
                $folder = Yii::app()->basePath.'/../uploads/video/';
                $filename = $this->generateRandomString().$_FILES['videos']['name'];
                if (move_uploaded_file($_FILES['videos']['tmp_name'], $folder.$filename)){
                    $video = new Video();
                    $video->video = $filename;
                    $video->description = $_POST['description'];
                    $video->is_public = 0;
                    $video->is_approval = 1;
                    $video->date = date('Y-m-d h:s');
                    $video->user_id = Yii::app()->user->id;
                    $video->save();
                }
            }else{
                echo $check;
            }
            
        }
    }
    
    public function actionSaveVoting(){
        $score      = intval( $_GET['score'] );
        $user_id = intval( $_GET['id'] );
        $ip         =  $_SERVER['REMOTE_ADDR'];
      
        $result = new Vote();
        $result->score = $score;
        $result->post_id = $user_id;
        $result->ip = $ip;
        $result->created = date('Y:m:d H:m:s');
        $result->updated = date('Y:m:d H:m:s');
        
        if($result->save() == false) {
            echo 'false';
        } else {
            echo 'true';
        }
    }
    
    public function actionSaveFavorite(){
        $check =  FavoriteUser::model()->findByAttributes(array('user_id'=>Yii::app()->user->id, 'favorite_id'=>$_GET['id']));
        if(!$check){
            $favorite = new FavoriteUser();
            $favorite->user_id = Yii::app()->user->id;
            $favorite->favorite_id =  $_GET['id'];
            $favorite->created = date('Y:m:d H:m:s');
            $favorite->updated = date('Y:m:d H:m:s');
            if($favorite->save() == false)
                echo 'false';
            else
                echo 'true';
        }else{
            echo 'exit';
        }
    }
    
    public function actionUpdateVote(){
        $id = $_GET['id'];
        $type = $_GET['type'];
        $achievements = Achievements::model()->findByPk($id);
        if($achievements){
            if($type == 1){
                $vote = new Vote();
                $vote->user_id = Yii::app()->user->id;
                $vote->achievements_id = $id;
                $vote->down_vote = 0;
                $vote->up_vote = 1;
                $vote->created = date('Y:m:d H:h:s');
                $vote->updated = date('Y:m:d H:h:s');
                $vote->ip = $_SERVER['REMOTE_ADDR'];
                $vote->save();
                $final_core = Achievements::model()->getCore($id);
                Achievements::model()->updateByPk($achievements->id, array('vote'=>$final_core));
                echo $final_core;
            }else{
                $vote = new Vote();
                $vote->user_id = Yii::app()->user->id;
                $vote->achievements_id = $id;
                $vote->down_vote = 1;
                $vote->up_vote = 0;
                $vote->created = date('Y:m:d H:h:s');
                $vote->updated = date('Y:m:d H:h:s');
                $vote->ip = $_SERVER['REMOTE_ADDR'];
                $vote->save();
                $final_core = Achievements::model()->getCore($id);
                Achievements::model()->updateByPk($achievements->id, array('vote'=>$final_core));
                echo $final_core;
            }
        }else{
            echo 0;
        }
        
    }

    public function actionSaveSearch(){
        $username                = $_GET['username'];
        $gender                  = intval($_GET['gender']);
        $age_start               = $_GET['age_start'];
        $age_end                 = $_GET['age_end'];
        $within_start            = $_GET['within_start'];
        $within_end              = $_GET['within_end'];
        $saveSearch              = new SaveSearch();
        $saveSearch->user_id     = Yii::app()->user->id;
        $saveSearch->username    = $username;
        $saveSearch->gender      = $gender;
        $saveSearch->age_from    = $age_start;
        $saveSearch->age_to      = $age_end;
        $saveSearch->within_from = $within_start;
        $saveSearch->within_to   = $within_end;
        $saveSearch->save();
    }

    public function actionSaveSearchAdvanced(){
        $username                = $_GET['username'];
        $gender                  = intval($_GET['gender']);
        $age_start               = $_GET['age_start'];
        $age_end                 = $_GET['age_end'];
        $within_start            = $_GET['within_start'];
        $miles                   = $_GET['miles'];
        $height_start            = $_GET['height_start'];
        $height_end              = $_GET['height_end'];
        $education               = $_GET['education'];
        $race                    = $_GET['race'];
        $faith                   = $_GET['faith'];
        $kids                    = $_GET['kids'];
        $exercise_level          = $_GET['exercise_level'];
        $drinking_level          = $_GET['drinking_level'];
        $smoking_level           = $_GET['smoking_level'];
        $ss_online               = $_GET['ss_online'];
        $ss_verified             = $_GET['ss_verified'];

        $saveSearch              = new SaveSearch();
        $saveSearch->user_id     = Yii::app()->user->id;
        $saveSearch->username    = $username;
        $saveSearch->gender      = $gender;
        $saveSearch->age_from    = $age_start;
        $saveSearch->age_to      = $age_end;
        $saveSearch->within_from = $within_start;
        $saveSearch->within_to   = $miles;
        $saveSearch->height_from = $height_start;
        $saveSearch->height_to   = $height_end;
        $saveSearch->education   = $education;
        $saveSearch->ehtnicity   = $race;
        $saveSearch->religion    = $faith;
        $saveSearch->children    = $kids;
        $saveSearch->excercise   = $exercise_level;
        $saveSearch->drink       = $drinking_level;
        $saveSearch->smoke       = $smoking_level;
        $saveSearch->is_online   = $ss_online;
        $saveSearch->verified    = $ss_verified;
        $saveSearch->save();
    }
    
    public function actionCheckVote(){
        $id = $_GET['id'];
        $type = $_GET['type'];
        if($type == 0)
            $old_vote = Vote::model()->findByAttributes(array('achievements_id'=>$id, 'user_id'=>Yii::app()->user->id, 'down_vote'=>1));
        else
            $old_vote = Vote::model()->findByAttributes(array('achievements_id'=>$id, 'user_id' => Yii::app()->user->id, 'up_vote'=>1 ));
        if(!$old_vote){
            echo 'true';
        }else{
            echo 'false';
        }
    }
    
    public function actionSettingGeneral(){
        $user = User::model()->findByPk(Yii::app()->user->id);
        $model =  new User();
        if($_GET['pass'] != '')
            $password = $model->hashPassword($_GET['pass']);
        else
            $password = User::model()->findByPk(Yii::app()->user->id)->password;
        if($_GET['birthday'] != '')
            User::model()->updateByPk(Yii::app()->user->id, array('birthday'=>$_GET['birthday']));
        if($_GET['email'] != '')
            User::model()->updateByPk(Yii::app()->user->id, array('email'=>$_GET['email']));
        if($_GET['zipcode'] != '')
            User::model()->updateByPk(Yii::app()->user->id, array('zipcode'=>$_GET['zipcode']));
        if($_GET['address'] != '')
            User::model()->updateByPk(Yii::app()->user->id, array('address'=>$_GET['address']));
        if($_GET['password'] != '')
            User::model()->updateByPk(Yii::app()->user->id, array('password'=>$_GET['password'])); 
    }
    
    public function actionCheckEmailSetting(){
        $user = User::model()->findByPk(Yii::app()->user->id);
        if($_GET['email'] == $user->email){
            echo 0;
        }else{
            if(filter_var($_GET['email'], FILTER_VALIDATE_EMAIL)){
                echo 0;
            }else{
                echo 1;
            }
        }
    }
    
    public function actionCheckOldPass(){
        $user = User::model()->findByPk(Yii::app()->user->id);
        $model = new User();
        $old = $user->password;
        $check = $model->hashPassword($_GET['pass']);
        if($old != $check)
            echo 1;
        else
            echo 0;
    }
}
