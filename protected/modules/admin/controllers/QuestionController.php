<?php

class QuestionController extends AdminBaseController {
    public function init()
	{
		parent::init();
		
		$this->breadcrumbs[ Yii::t('global', 'Questions') ] = array('question/index');
		$this->pageTitle[] = Yii::t('global', 'Questions');
	}
    
    public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
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
		$model=new Question;
                                  
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Question']))
		{
			$model->attributes=$_POST['Question'];
            $model->user_id = 0;
            $model->default = 1;
			if($model->save()){
                $all_user = User::model()->getIdOfUser();
                foreach($all_user as $items){
                    $answer = new Answer();
                    $answer->answer = '';
                    $answer->question_id = $model->id;
                    $answer->user_id = $items;                                                                                                    
                    $answer->save();
                }                   
            }                			 
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

		if(isset($_POST['Question']))
		{
			$model->attributes=$_POST['Question'];
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
        $anser = Answer::model()->findAllByAttributes(array('question_id'=>$id));
        if($anser){
            foreach($anser as $value){
                Answer::model()->deleteByPk($value->id);                                        
            }
        }
		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$model=new Question('search');
		$model->unsetAttributes();  // clear any default values
        $model->user_id = 0;
		if(isset($_GET['Question']))
			$model->attributes=$_GET['Question'];

		$this->render('index',array(
			'model'=>$model,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$dataProvider=new CActiveDataProvider('Question');
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
		$model=Question::model()->findByPk((int)$id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='question-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
    
    /**
	 * Lists all models.
	 */
	public function actionQuestionUser()
	{
		$model=new Question('questionuser');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Question']))
			$model->attributes=$_GET['Question'];

		$this->render('question_user',array(
			'model'=>$model,
		));
	}
    
    public function actionDeleteUser($id)
	{     
		if(isset($_GET['id'])){
		      Question::model()->deleteByPk($_GET['id']);
              
              $answer = Answer::model()->findByAttributes(array('question_id'=>$_GET['id']));
              if($answer)
                Answer::model()->deleteByPk($answer->id);
              $this->redirect('/admin/question/questionUser');
		}else{
		  $this->redirect('/admin/question/questionUser');
		}
        
	}
    
    
    public function actionUpdateUser($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Question']))
		{
			$model->attributes=$_POST['Question'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update_user',array(
			'model'=>$model,
		));
	}
    
    
}
