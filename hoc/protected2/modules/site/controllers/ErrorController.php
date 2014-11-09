<?php
class ErrorController extends SiteBaseController {
	
	public function init()
	{
		parent::init();
	}

	public function actionError() {
		$this->layout = '404';
		$this->render('error');
	}
}
