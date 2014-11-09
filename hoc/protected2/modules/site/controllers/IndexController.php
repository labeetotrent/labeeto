<?php
/**
 * Index controller Home page
 */
class IndexController extends SiteBaseController {
	
	public $login;
	
	const PAGE_SIZE = 5;
	/**
	 * Controller constructor
	 */
	public function init()
	{
		parent::init();
	}

	public function actionIndex() {
        $model =  new Members();
        if(isset($_POST['SignUp'])) {
            /*$model->username= $_POST['SignUp']['username'];
            $model->email= $_POST['SignUp']['email'];
            $model->password= sha1(md5($_POST['SignUp']['password']));*/
           /* $data = array(
                'username'=>$_POST['SignUp']['username'],
                'email'=>$_POST['SignUp']['email'],
                'password'=>$_POST['SignUp']['password']
            );*/
            $this->redirect('/my_feed?type=registration');
        }
		$this->render('index',compact('model'));
	}

    public function actionHome(){
        $this->login = 1; // set template user login to check
        $this->render('home');
    }

    public function actionSpeedDay(){
    	$this->login = 1;
        $this->render('static/speed_day');
    }
}
