<?php

class MembersController extends SiteBaseController {
    public function init()
	{
		parent::init();
		
		/*$this->breadcrumbs[ Yii::t('global', 'Members') ] = array('members/index');
		$this->pageTitle[] = Yii::t('global', 'Members');*/
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
	public function actionCreate()
	{
		$model=new Members;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Members']))
		{
			$model->attributes=$_POST['Members'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Members']))
		{
			$model->attributes=$_POST['Members'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$model=new Members('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Members']))
			$model->attributes=$_GET['Members'];

		$this->render('index',array(
			'model'=>$model,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$dataProvider=new CActiveDataProvider('Members');
		$this->render('admin',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Members::model()->findByPk((int)$id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='members-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

    public function actionMy_feed(){
        $this->layout = 'feed';
        if(!Yii::app()->user->isGuest){
            $this->render('my_feed');
        } else {
            $this->redirect('/');
        }

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
        $model = new Members();
        $model->username = $_GET['username'];
        $model->email = $_GET['email'];
        $model->password = md5(sha1($_GET['password']));
        $model->birthday = $_GET['birthday'];
        $model->height = $_GET['height'];
        $model->gender = $_GET['gender'];
        $model->ehtnicity = $_GET['ehtnicity'];
        $model->address = $_GET['address'];
        $model->career = $_GET['career'];
        $model->education = $_GET['education'];
        $model->religion = $_GET['religion'];
        $model->excercise = $_GET['excercise'];
        $model->passion = $_GET['passion'];
        $model->goal = $_GET['goal'];
        $model->smoke = $_GET['smoke'];
        $model->drink = $_GET['drink'];
        $model->relations = $_GET['relations'];
        $model->zipcode = $_GET['zipcode'];
        $model->latitude = $_GET['latitude'];
        $model->longtitude = $_GET['longtitude'];
        if($model->save()){
            $identity = new InternalIdentity($model->email, $_GET['password']);
            if($identity->authenticate())
            {
                Yii::app()->user->setFlash('success', Yii::t('login', 'Thanks. You register successful.'));
                Yii::app()->user->login($identity, (Yii::app()->params['loggedInDays'] * 60 * 60 * 24 ));
            }
        }
    }

    public function actionCheckUser(){
        $this->layout = '';
        $record = Members::model()->findByAttributes(array(),array(
            'condition'=>'username=:name OR email=:name ',
            'params'=>array('name'=>$_GET['name']),

        ));
        if($record===null){
            echo 1;
        }else {
            echo 0;
        }

    }
    
     public function actionProfile(){
        $this->layout = 'feed';
        if(!Yii::app()->user->isGuest){
            $this->render('profile');
        } else {
            $this->redirect('/');
        }

    }

}
