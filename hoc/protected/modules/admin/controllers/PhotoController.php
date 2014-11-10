<?php

class PhotoController extends AdminBaseController {
    public function init()
	{
		parent::init();
		
		$this->breadcrumbs[ Yii::t('global', 'Photos') ] = array('photo/index');
		$this->pageTitle[] = Yii::t('global', 'Photos');
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
		$model=new Photo;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Photo']))
		{
			$model->attributes=$_POST['Photo'];
            
            $uploadedFile = CUploadedFile::getInstance($model,'photo');
            if(!empty($uploadedFile)) {
                $rnd = rand(0,9999);
                $fileName = "{$rnd}-{$uploadedFile}";
                $model->photo = $fileName;
            }
            else{
                $model->photo   = '' ;
            }
            $model->date = date('Y:m:d H:m:s');
			if($model->save()){
			     if(!empty($uploadedFile)) {
                    $uploadedFile->saveAs(Yii::app()->basePath.'/../uploads/photo/'.$model->photo);
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

		if(isset($_POST['Photo']))
		{
			$model->attributes=$_POST['Photo'];
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
			if($model->save()){
			     if(!empty($uploadedFile)) {
                    $uploadedFile->saveAs(Yii::app()->basePath.'/../uploads/photo/'.$model->photo);
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
		$model=new Photo('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Photo']))
			$model->attributes=$_GET['Photo'];
        
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
					       $records = Photo::model()->deleteByPk(array_keys($_POST['record']));
        					Yii::app()->user->setFlash('success', Yii::t('global', '{count} items deleted.', array('{count}'=>$records)));
    					   break;
    				    
                        case 'bulkapproval':
                            $records = Photo::model()->updateByPk(array_keys($_POST['record']), array('is_approval'=>1));
        					Yii::app()->user->setFlash('success', Yii::t('global', '{count} items approval.', array('{count}'=>$records)));
    					   break;
                        
                        case 'bulkunapproval':
                            // Load records
                            $records = Photo::model()->updateByPk(array_keys($_POST['record']), array('is_approval'=>0));
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
		$dataProvider=new CActiveDataProvider('Photo');
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
		$model=Photo::model()->findByPk((int)$id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='photo-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
    
    public function actionApproval()
    {
        $allphoto = Photo::model()->findAll();
        if($allphoto){
            foreach($allphoto as $value){
                Photo::model()->updateByPk($value->id, array('is_approval'=>1));
            }
        }
        $this->redirect('/admin/photo/chosse');
    }
    
    public function actionChosse(){
        $model = new Photo;
        
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
					       $records = Photo::model()->deleteByPk(array_keys($_POST['record']));
        					Yii::app()->user->setFlash('success', Yii::t('global', '{count} items deleted.', array('{count}'=>$records)));
    					   break;
    				    
                        case 'bulkapproval':
                            $records = Photo::model()->updateByPk(array_keys($_POST['record']), array('is_approval'=>1));
        					Yii::app()->user->setFlash('success', Yii::t('global', '{count} items approval.', array('{count}'=>$records)));
    					   break;
                        
                        case 'bulkunapproval':
                            // Load records
                            $records = Photo::model()->updateByPk(array_keys($_POST['record']), array('is_approval'=>0));
        					Yii::app()->user->setFlash('success', Yii::t('global', '{count} items unapproval.', array('{count}'=>$records)));
    					   break;
                           
    					default:
    					// Nothing
    					break;
    				}
    			}
    		}
            
        // Load items and display
		$criteria = new CDbCriteria;
        $criteria->condition = 'is_public = 0';
        $count = Photo::model()->count();
		$pages = new CPagination($count);
		$pages->pageSize = 10;
		
		$pages->applyLimit($criteria);
		
		$sort = new CSort('Photo');
		$sort->defaultOrder = 'id DESC';
		$sort->applyOrder($criteria);

		$sort->attributes = array(
		        'id'=>'id',
                'photo'=>'photo',
                'is_public'=>'is_public',
                'is_approval'=>'is_approval',
                'user_id'=>'user_id',
				'date' =>'date',
		);
		
		$items = Photo::model()->findAll($criteria);
	
        $this->render('chosse', array( 'model' => $model, 'items' => $items, 'pages' => $pages, 'sort' => $sort, 'count' => $count ));
    }
    
    public function actionRemove(){
        if(isset($_GET['id'])){
            Photo::model()->deleteByPk($_GET['id']);
        }
         $this->redirect('/admin/photo');
    }
}
