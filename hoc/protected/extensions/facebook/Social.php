<?php
require_once 'lib/facebook/facebook.php';

class Social{
    public function init(){
         define('BASE_URL', filter_var('http://hoc.labeeto.com/', FILTER_SANITIZE_URL));
         define('APP_ID','1466917230217660');
         define('APP_SECRET','507220a0129d453e24887bc70a44b158');
     }
     public function facebook(){
         $facebook = new Facebook(array(
            'appId'		=>  APP_ID,
            'secret'	=> APP_SECRET,
            ));
                //get the user facebook id
                $user = $facebook->getUser();
                if($user){
                    try{
                        //get the facebook user profile data
                        $user_profile = $facebook->api('/me');
                        $params = array('next' => BASE_URL.'user/logoutFacebook');
                        //logout url
                        $logout =$facebook->getLogoutUrl($params);
                        $_SESSION['User']=$user_profile;
                        $_SESSION['facebook_logout']=$logout;
                    }catch(FacebookApiException $e){
                        error_log($e);
                        $user = NULL;
                    }
                }
                if(empty($user)){
                  //login url
                  $loginurl = $facebook->getLoginUrl(array(
                                'scope'			=> 'email,read_stream, publish_stream, user_birthday, user_location, user_work_history, user_hometown, user_photos',
                                'redirect_uri'	=> BASE_URL.'user/login',
                                'display'=>'popup'
                                ));
                  header('Location: '.$loginurl);
                }

      }

}




?>