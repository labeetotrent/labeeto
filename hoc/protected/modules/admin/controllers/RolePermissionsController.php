<?php

class RolePermissionsController extends AdminBaseController {
    public function init()
	{
		parent::init();
		
		$this->breadcrumbs[ Yii::t('global', 'Role Permissions') ] = array('rolePermissions/index');
		$this->pageTitle[] = Yii::t('global', 'Role Permissions');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
        $model=new RolePermissions;
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if(isset($_POST['RolePermissions']))
        {
            RolePermissions::model()->truncateTable();
            foreach( $_POST['RolePermissions'] as $key=>$val ){
               $value   = explode(":", $val);
               $rolePer = new RolePermissions();
               $rolePer->per_id = $value[0];
               $rolePer->role_id = $value[1];
               $rolePer->value   = $value[2];
               $rolePer->save();
           }
        }
        $role       = RoleUser::model()->findAll();
        $permission = Permissions::model()->getPermissionsUser();
        $this->render('index',array(
            'model'=>$model,'role'=>$role, 'permission'=> $permission
        ));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$dataProvider=new CActiveDataProvider('RolePermissions');
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
		$model=RolePermissions::model()->findByPk((int)$id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='role-permissions-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
