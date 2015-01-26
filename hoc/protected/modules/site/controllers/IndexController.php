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


    public function actionFb()
    {
        $facebook = new FacebookRedirectLoginHelper();
        echo '<a href="' . $facebook->getLoginUrl() . '">Login with Facebook</a>';
    }

    public function actionFbcheck()
    {
        $helper = new \Facebook\FacebookRedirectLoginHelper();
        try {
            $session = $helper->getSessionFromRedirect();
        } catch(\Facebook\FacebookRequestException $ex) {
            // When Facebook returns an error
            CVarDumper::dump($ex, 100, true);
        } catch(Exception $ex) {
            // When validation fails or other local issues
            CVarDumper::dump($ex, 100, true);
        }
        if ($session) {
            // Logged in.
        }
    }

	public function actionIndex() {
        if( Yii::app()->user->id )
            $this->redirect('/my_feed');
        $model =  new User();
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

    public function actionGetState(){
        $country_id = $_GET['country'];
        $allState = States::model()->findAll('country_id=:id',array(':id'=>$country_id));
        $states ="";
        if(empty($allState)){
            $states.="<option>- No State/Region Listed -</option>";
        } else {
            foreach($allState as $state){
                $states.="<option value='$state->id'> $state->name</option>";
            }
        }
        echo $states;

    }
    public function actionGetCity(){
        $state_id = $_GET['state'];
        $allCity = CityMaster::model()->findAll('state_id=:id',array(':id'=>$state_id));
        $cities ="";
        if(empty($allCity)){
            $cities.="<option>- No State/Region Listed -</option>";
        } else {
            foreach($allCity as $city){
                $cities.="<option value='$city->city_id'> $city->city_name</option>";
            }
        }
        echo $cities;

    }
    function actionCheckTimeout(){
        echo Yii::app()->session['lastest_visit'];
    }
}
