<?php

class SlidershowController extends AdminBaseController {
    public function init()
	{
		parent::init();
		
		$this->breadcrumbs[ Yii::t('global', 'Slider Shows') ] = array('slidershow/index');
		$this->pageTitle[] = Yii::t('global', 'Slider Shows');
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
		$model=new Slidershow;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Slidershow']))
		{
			$model->attributes=$_POST['Slidershow'];
            $uploadedFile=CUploadedFile::getInstance($model,'image');
            if(!empty($uploadedFile)) {
                $rnd = rand(0,9999);
                $fileName = "{$rnd}-{$uploadedFile}";  // random number + file name
                $model->image = $fileName;
            }
            else{
                $fileName = '';
            }
            $model->position  = Slidershow::POSITION;
			if($model->save()){
                $bannerAll = count(Slidershow::model()->findAll('position="'.$model->position.'"'));
                Slidershow::model()->updateByPk($model->id,array('rank'=>$bannerAll));
                if(!empty($uploadedFile)) {
                    $uploadedFile->saveAs(Yii::app()->basePath.'/../uploads/animation/'.$fileName);
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

		if(isset($_POST['Slidershow']))
		{
			$model->attributes=$_POST['Slidershow'];
            $uploadedFile=CUploadedFile::getInstance($model,'image');

            if(!empty($uploadedFile)) {
                $rnd = rand(0,9999);
                $fileName = "{$rnd}-{$uploadedFile}";  // random number + file name
                $model->image = $fileName;
            }
            else{
                $modelold       = $this->loadModel($id);
                $model->image   = $modelold->image ;
            }
            $model->position  = Slidershow::POSITION;
			if($model->save()){
                if(!empty($uploadedFile)) {
                    $uploadedFile->saveAs(Yii::app()->basePath.'/../uploads/animation/'.$model->image);
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
            $banner = $this->loadModel($id);
            $bannerAll = count(Slidershow::model()->findAll('position="'.$banner->position.'"'));
            if($banner->rank < $bannerAll){
                $bannerReset =  Slidershow::model()->findAllBySql('SELECT * FROM slidershow WHERE rank > '.$banner->rank.' AND position = '.$banner->position.' ORDER by rank');
                foreach($bannerReset as $newRank){
                    Slidershow::model()->updateByPk($newRank->id,array('rank'=>$newRank->rank -1));
                }
            }

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
		$model=new Slidershow('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Slidershow']))
			$model->attributes=$_GET['Slidershow'];

		$this->render('index',array(
			'model'=>$model,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$dataProvider=new CActiveDataProvider('Slidershow');
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
		$model=Slidershow::model()->findByPk((int)$id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='slidershow-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

    public function actionSetUp(){
        $id = $_GET['id'];
        $upRank = Slidershow::model()->findByPk($id);
        $downRank = Slidershow::model()->findByAttributes(array('rank'=>$upRank->rank -1,'position'=>$upRank->position));
        if($upRank->rank !=1){
            $downRank->rank = $upRank->rank;
            $upRank->rank = $upRank->rank - 1;
            $upRank->save();
            $downRank->save();
        }
    }

    public function actionSetDown(){
        $id = $_GET['id'];
        $downRank = Slidershow::model()->findByPk($id);
        $allRankBanner = count(Slidershow::model()->findAll('position="'.$downRank->position.'"'));
        if($downRank->rank < $allRankBanner) {
            $upRank = Banners::model()->findByAttributes(array('rank'=>$downRank->rank +1,'position'=>$downRank->position));
            $upRank->rank =  $downRank->rank;
            $downRank->rank =  $downRank->rank + 1;
            $downRank->save();
            $upRank->save();
        }
    }

}
