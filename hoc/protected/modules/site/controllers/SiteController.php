<?php

class SiteController extends SiteBaseController
{
	public function actionIndex(){
		$this->render('index');
	}

	public function filters(){
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * This method is used by the 'accessControl' filter.
	 */
	public function accessRules(){

		return array(
			array('allow',
				'actions'=>array('register','login','myaccount','logout'),
				'users'=>array('*'),
			),
			array('allow',
				'actions'=>array(''),
				'users'=>array('@'),
			),
			array('allow',
				'actions'=>array(),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	public function actionRegister(){

		$model = new RegisterForm;

		if(isset($_POST['RegisterForm'])){

			$model->attributes = $_POST['RegisterForm'];
			if($model->validate()){
				$user = new User;
				$user->attributes = $_POST['RegisterForm'];
				
				if($user->save())
					$this->redirect('/user/myaccount');
			}

		}
		return $this->render('register', compact('model'));
	}

	public function actionLogin(){

		if(Yii::app()->user->isGuest){
			$this->pageTitle .= ' :: Login';
			
			$model = new LoginForm;
			if( isset($_POST['LoginForm']) )
			{
				$model->attributes = $_POST['LoginForm'];
				if( $model->validate() )
				{
					// Login
					$identity = new InternalIdentity($model->username, $model->password);
					if($identity->authenticate())
					{
						/*Yii::app()->user->setFlash('success', Yii::t('global', 'Thanks. You are now logged in.'));*/
						Yii::app()->user->login($identity);
					}  
					$this->redirect(Yii::app()->homeUrl);
				}
				
			}
			$this->render('login',compact('model'));
			return;
		}else{
			$this->redirect(Yii::app()->homeUrl);
		}
	}

	public function actionMyaccount(){
		
		if(!Yii::app()->user->isGuest){
			$this->layout = 'myaccount';
			$this->pageTitle .= ' :: My Account';

			$user = User::model()->findByPk(Yii::app()->user->id);
			$this->render('myaccount',compact('user'));
		}else
			$this->redirect(Yii::app()->homeUrl);
	}
	
	public function actionlogout(){

		if( Yii::app()->user->isGuest ){
			$this->redirect(Yii::app()->homeUrl);
		}
	
		Yii::app()->user->logout();        
		$this->redirect(Yii::app()->homeUrl);
	}

	public function actionUserMenu(){
		$model = User::model()->findByPk(Yii::app()->user->id);
		$this->renderPartial('/elements/accPopup',compact('model'));
	}
}