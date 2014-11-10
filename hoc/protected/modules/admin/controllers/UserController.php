<?php

class UserController extends AdminBaseController {
    public function init()
	{
		parent::init();
		
		$this->breadcrumbs[ Yii::t('global', 'Users') ] = array('user/index');
		$this->pageTitle[] = Yii::t('global', 'Users');
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
		$model=new User;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['User']))
		{
            $model->attributes=$_POST['User'];
            $uploadedFile=CUploadedFile::getInstance($model,'photo');
            if(!empty($uploadedFile)) {
                $rnd = rand(0,9999);
                $fileName = "{$rnd}-{$uploadedFile}";  // random number + file name
                $model->photo = $fileName;
            }
            else{
                $fileName = '';
            }
			if($model->save()){
                if(!empty($uploadedFile)) {
                    $uploadedFile->saveAs(Yii::app()->basePath.'/../uploads/avatar/'.$fileName);
                }
                $this->redirect(array('view','id'=>$model->id));
            }
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

		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
            $uploadedFile=CUploadedFile::getInstance($model,'photo');

            if(!empty($uploadedFile)) {
                $rnd = rand(0,9999);
                $fileName = "{$rnd}-{$uploadedFile}";  // random number + file name
                $model->photo = $fileName;
            }
            else{
                $modelold       = $this->loadModel($id);
                $model->photo   = $modelold->photo ;
            }
			if($model->save()){
                if(!empty($uploadedFile)) {
                    $uploadedFile->saveAs(Yii::app()->basePath.'/../uploads/avatar/'.$model->photo);
                }
				$this->redirect(array('view','id'=>$model->id));
            }
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
		$model=new User('search');
		$model->unsetAttributes();  // clear any default values
        $model->role = 'user';
		if(isset($_GET['User']))
			$model->attributes=$_GET['User'];

		$this->render('index',array(
			'model'=>$model,'type'=>'Users'
		));
	}


    public function actionAdmin(){
        $model=new User('search');
        $model->unsetAttributes();  // clear any default values
        $model->role = 'admin';
        if(isset($_GET['User']))
            $model->attributes=$_GET['User'];

        $this->render('index',array(
            'model'=>$model,'type'=>'Admin'
        ));
       }
	/**
	 * Manages all models.
	 */
	/*public function actionAdmin()
	{
		$dataProvider=new CActiveDataProvider('User');
		$this->render('admin',array(
			'dataProvider'=>$dataProvider,
		));
	}*/

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=User::model()->findByPk((int)$id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='user-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

    public function actionChangepass($id)
    {
        $my = User::model()->findByPk($id);
        $password = new PasswordFormAdmin;
        if( isset($_POST['PasswordFormAdmin']) )
        {
            $password->attributes = $_POST['PasswordFormAdmin'];
            if( $password->validate() )
            {
                // Save changes
                User::model()->updateByPk($my->id, array( 'password' => $my->hashPassword($password->npassword, '') ));

                // Redirect
                Yii::app()->user->setFlash('success', Yii::t('global', 'Changed password.'));
                $username = User::model()->getUser($id);
                $email = User::model()->getEmails($id);
                $newpass = $_POST['PasswordFormAdmin']['npassword2'];
                $subject = Yii::t('global', 'Reset Password');
                $content =  Yii::t('global', 'Dear Mr/Ms '). $username . '<br>'. Yii::t('global', 'We have reset your password successfully.') . '<br>' . Yii::t('global', 'Your new password is: '). $newpass;
                Utils::sendMail(Yii::app()->params['emailout'], $email, $subject, $content);
                $this->redirect($_POST['from_action']);
            }
            else
            {
                //$password->password = '';
                $password->npassword = '';
                $password->npassword2 = '';
            }
        }
        $member   = User::model()->findByPk($id);
        // Add page breadcrumb and title
        $this->pageTitle[] = Yii::t('global', 'Change Password');
        $this->breadcrumbs[Yii::t('global', 'Change Password') ] = '';

        $this->render('changepass', array('password'=>$password,'member'=>$member));
    }

}
