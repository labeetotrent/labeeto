<?php echo "<?php\n"; ?>

class <?php echo $this->controllerClass; ?> extends <?php echo $this->baseControllerClass . "\n"; ?>
{

	public function filters(){
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	public function accessRules(){
		return array(
			array(
				'allow',
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array(
				'allow',
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array(
				'allow',
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array(
				'deny',
				'users'=>array('*'),
			),
		);
	}

	public function actionView($id){
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	public function actionCreate(){

		$model = new <?php echo $this->modelClass; ?>;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['<?php echo $this->modelClass; ?>'])){
			$model->attributes=$_POST['<?php echo $this->modelClass; ?>'];
			if($model->save())
				$this->redirect(array('view','id'=>$model-><?php echo $this->tableSchema->primaryKey; ?>));
		}

		$this->render('pageform',compact('model'));
	}

	public function actionUpdate($id){
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['<?php echo $this->modelClass; ?>'])){
			$model->attributes=$_POST['<?php echo $this->modelClass; ?>'];
			if($model->save())
				$this->redirect(array('view','id'=>$model-><?php echo $this->tableSchema->primaryKey; ?>));
		}

		$this->render('pageform',compact('model'));
	}

	public function actionDelete($id){
	
		if(Yii::app()->request->isPostRequest) {
			$this->loadModel($id)->delete();
			
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		} else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	public function actionIndex(){
		$dataProvider=new CActiveDataProvider('<?php echo $this->modelClass; ?>');
		$this->render('index',compact('dataProvider'));
	}

	public function actionAdmin(){

		$model = new <?php echo $this->modelClass; ?>('search');
		$model->unsetAttributes();
		
		if(isset($_GET['<?php echo $this->modelClass; ?>']))
			$model->attributes = $_GET['<?php echo $this->modelClass; ?>'];

		$this->render('admin',compact('model'));
	}

	public function loadModel($id){

		$model = <?php echo $this->modelClass; ?>::model()->findByPk($id);
		
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');

		return $model;
	}

	protected function performAjaxValidation($model){
		if(isset($_POST['ajax']) && $_POST['ajax']==='<?php echo $this->class2id($this->modelClass); ?>-form'){
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
