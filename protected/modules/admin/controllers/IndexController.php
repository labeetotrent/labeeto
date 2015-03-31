<?php
/**
 * Index controller Home page
 */
class IndexController extends AdminBaseController {
	/**
	 * init
	 */
	public function init()
	{
		parent::init();
		
		$this->breadcrumbs[ Yii::t('adminglobal', 'Dashboard') ] = array('index/index');
		$this->pageTitle[] = Yii::t('adminglobal', 'Dashboard'); 
	}
	/**
	 * Index action
	 */
    public function actionIndex() {

        $this->pageTitle[] = Yii::t('admin', 'Labeeto Dating');
        $model = new User('Search');
        $model->unsetAttributes();
        if(isset($_GET['User'])){
            $model->id              = $_GET['User']['id'];
            $model->username        = $_GET['User']['username'];
            $model->status          = $_GET['User']['status'];
            $model->last_logged     = $_GET['User']['last_logged'];
            $model->created         = $_GET['User']['created'];
            $model->attributes      = $_GET['User'];
        }
        $this->render('index', compact('model'));
    }
}