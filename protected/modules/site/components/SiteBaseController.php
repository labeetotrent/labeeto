<?php
/**
 * Site base controller class
 */
class SiteBaseController extends BaseController {

	public $jsUrl = '';
	public $baseUrl = '';
	public $layout= 'main';
	public $seprateCss;
    public $activeFooter = '';

	/**
	 * Class constructor
	 *
	 */
	public function init() {
		// Add Js
		$this->jsUrl = Yii::app()->theme->baseUrl . '/js';
		$this->baseUrl = Yii::app()->themeManager->baseUrl;
		$this->pageTitle = Yii::app()->name;

		$this->seprateCss = $this->baseUrl.'/css/styles.css';

		Yii::app()->clientScript->registerMetaTag( 'all', 'robots' );
		Yii::app()->clientScript->registerMetaTag( Yii::app()->language, 'language', 'content-language' );
		/* Run init */
        Yii::app()->counter->refresh();
		parent::init();
	}

	/**
	 * @return array - List of filters
	 */
	public function filters()
	{
		return array(
			array(
				'application.filters.YXssFilter',
				'clean' => 'none',
				'tags' => 'soft',
				'actions' => 'all'
			)
		);
	}

    public function filterMember($filterChain)
    {
        if(!Yii::app()->user->isGuest)
            $filterChain->run();
        else
            $this->redirect('/');
    }
}