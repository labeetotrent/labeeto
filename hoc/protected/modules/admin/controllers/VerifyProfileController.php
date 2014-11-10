<?php

class VerifyProfileController extends AdminBaseController {
    public function init()
	{
		parent::init();
		
		$this->breadcrumbs[ Yii::t('global', 'Verify Profiles') ] = array('verifyProfile/index');
		$this->pageTitle[] = Yii::t('global', 'Verify Profiles');
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
		$model=new VerifyProfile;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['VerifyProfile']))
		{
			$model->attributes=$_POST['VerifyProfile'];
            $model->date = date('Y:m:d H:m:s');
			$uploadedFile = CUploadedFile::getInstance($model,'photo');
            if(!empty($uploadedFile)) {
                $rnd = rand(0,9999);
                $fileName = "{$rnd}-{$uploadedFile}";
                $model->photo = $fileName;
            }
            else{
                $model->photo   = '' ;
            }
            $model->code = strtoupper($_POST['VerifyProfile']['code']);
			if($model->save()){
		     if(!empty($uploadedFile)) {
                $uploadedFile->saveAs(Yii::app()->basePath.'/../uploads/photoVerify/'.$model->photo);
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

		if(isset($_POST['VerifyProfile']))
		{
			$model->is_approval = $_POST['Photo']['is_approval'];
            $uploadedFile = CUploadedFile::getInstance($model,'photo');
            
            if(!empty($uploadedFile)) {
                $rnd = rand(0,9999);
                $fileName = "{$rnd}-{$uploadedFile}";  // random number + file name
                $model->photo = $fileName;
            }else{
                $modelold       = $this->loadModel($id);
                $model->photo   = $modelold->photo ;
            }
            $model->code = strtoupper($_POST['VerifyProfile']['code']);
			if($model->save()){
			     if(!empty($uploadedFile)) {
                    $uploadedFile->saveAs(Yii::app()->basePath.'/../uploads/photoVerify/'.$model->photo);
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
		$model=new VerifyProfile('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['VerifyProfile']))
			$model->attributes=$_GET['VerifyProfile'];
        
        // Did we submit the form and selected items?
		if( isset($_POST['bulkoperations']) && $_POST['bulkoperations'] != '' )
		{
			// Did we choose any values?
			if( isset($_POST['record']) && count($_POST['record']) )
			{
                 switch( $_POST['bulkoperations'] )
    				{									
    				    
    					case 'bulkdelete':
                            // Load records
					       $records = VerifyProfile::model()->deleteByPk(array_keys($_POST['record']));
        					Yii::app()->user->setFlash('success', Yii::t('global', '{count} items deleted.', array('{count}'=>$records)));
    					   break;
    				    
                        case 'bulkapproval':
                            $records = VerifyProfile::model()->updateByPk(array_keys($_POST['record']), array('is_approval'=>1));
        					Yii::app()->user->setFlash('success', Yii::t('global', '{count} items approval.', array('{count}'=>$records)));
    					   break;
                        
                        case 'bulkunapproval':
                            // Load records
                            $records = VerifyProfile::model()->updateByPk(array_keys($_POST['record']), array('is_approval'=>0));
        					Yii::app()->user->setFlash('success', Yii::t('global', '{count} items unapproval.', array('{count}'=>$records)));
    					   break;
                           
    					default:
    					// Nothing
    					break;
    				}
    			}
    		}
            
		$this->render('index',array(
			'model'=>$model,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$dataProvider=new CActiveDataProvider('VerifyProfile');
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
		$model=VerifyProfile::model()->findByPk((int)$id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='verify-profile-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
    
    
    public function actionRemove(){
        if(isset($_GET['id'])){
            VerifyProfile::model()->deleteByPk($_GET['id']);
        }
         $this->redirect('/admin/verifyProfile');
    }
    
    public function actionApproval()
    {
        $allphoto = Photo::model()->findAll();
        if($allphoto){
            foreach($allphoto as $value){
                VerifyProfile::model()->updateByPk($value->id, array('is_approval'=>1));
            }
        }
        $this->redirect('/admin/verifyProfile');
    }
}
