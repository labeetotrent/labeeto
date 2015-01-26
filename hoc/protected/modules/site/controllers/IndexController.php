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

    public function actionFacebookSignup()
    {
        $helper = new \Facebook\FacebookRedirectLoginHelper();
        try {
            $session = $helper->getSessionFromRedirect();
        } catch(\Facebook\FacebookRequestException $ex) {
            echo '1';
            // When Facebook returns an error
        } catch(Exception $ex) {
            echo '2';
            // When validation fails or other local issues
        }
        if ($session) {
            //CVarDumper::dump($session, 100, true);
            try {
                $facebook = new Facebook($session);

                if($facebook->register()) // If user is new
                {
                    $this->redirect(array('/site/my_feed'));
                }
                else //If user was already registered
                {
                    $this->redirect(array('/site/my_feed'));
                }

                $user_profile = (new FacebookRequest(
                    $session, 'GET', '/me'
                ))->execute()->getGraphObject(GraphUser::className());

                echo "Name: " . $user_profile->getName();
                CVarDumper::dump($user_profile, 100, true);

                $request = new FacebookRequest(
                    $session,
                    'GET',
                    '/me/picture',
                    array (
                        'redirect' => false,
                        'height' => '200',
                        'type' => 'normal',
                        'width' => '200',
                    )
                );
                $response = $request->execute();
                $graphObject = $response->getGraphObject();
                CVarDumper::dump($graphObject, 100, true);



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
