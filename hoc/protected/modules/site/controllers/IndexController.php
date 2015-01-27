<?php
/**
 * Index controller Home page
 */
use Facebook\FacebookRequest;
use Facebook\GraphUser;
use Facebook\FacebookRequestException;

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
        if( Yii::app()->user->id )
            $this->redirect('/my_feed');
        $model =  new User();
        if(isset($_POST['SignUp'])) {
            $this->redirect('/my_feed?type=registration');
        }

        $facebook = new \Facebook\FacebookRedirectLoginHelper();
        $facebookLoginUrl = $facebook->getLoginUrl(Yii::app()->params['Facebook']['scope']);

		$this->render('index',compact('model', 'facebookLoginUrl'));
	}

    public function actionAuthorize()
    {
        $identity = new FacebookIdentity('856074661082591', 'token');
        if($identity->authenticate())
        {
            Yii::app()->user->login($identity, (Yii::app()->params['loggedInDays'] * 60 * 60 * 24 ));
            $this->redirect(array('/my_feed'));
        }

        $this->redirect(array('/'));
    }


    public function actionFacebookSignup()
    {
        $helper = new \Facebook\FacebookRedirectLoginHelper();
        try {
            $session = $helper->getSessionFromRedirect();
        } catch(\Facebook\FacebookRequestException $ex) {
            echo '1';
            // When Facebook returns an error
        } catch(Exception $ex) {
            echo '3';
            var_dump($ex);
            // When validation fails or other local issues
        }
        if ($session) {
            //CVarDumper::dump($session, 100, true);
            try {
                $facebook = new Facebook($session);
                $result = $facebook->register();

                if($result == Facebook::RESULT_REGISTERED) // If user is new
                {
                    $facebook->getAvatar();
                    $this->redirect(array('/my_feed'));
                }
                elseif($result == Facebook::RESULT_SUCCESS) //If user was already registered
                {
                    $this->redirect(array('/my_feed'));
                }
            } catch(FacebookRequestException $e) {

                echo "Exception occured, code: " . $e->getCode();
                echo " with message: " . $e->getMessage();

            }
        }
        else
        {
            //SESSION ERROR
        }
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
