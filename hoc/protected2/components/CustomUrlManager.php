<?php
/**
 * Custom rules manager class
 *
 * Override to load the routes from the DB rather then a file
 *
 */
class CustomUrlManager extends CUrlManager {
    /**
     * Build the rules from the DB
     */
    protected function processRules() {

            $_more = array();
            
            $this->rules = array(
                "/admin"       => 'admin/index/index',
                "/admin/login" => 'admin/index/login',
                /* Home page After login*/
                "/home" => 'site/index/home',
                //"/my_feed/<user_id:([a-zA-z0-9-_]+)>" => 'site/members/my_feed',
                "/my_feed" => 'site/members/my_feed',
                "/profile" => 'site/members/profile',
                'gii'=>'gii',
                'gii/<controller:\w+>'=>'gii/<controller>',
                'gii/<controller:\w+>/<action:\w+>'=>'gii/<controller>/<action>',
                "/<_c:([a-zA-z0-9-]+)>" => 'site/<_c>/index',
                "/<_c:([a-zA-z0-9-]+)>/<_a:([a-zA-z0-9-]+)>" => 'site/<_c>/<_a>',
                "/<_c:([a-zA-z0-9-]+)>/<_a:([a-zA-z0-9-]+)>/id/<id:\d+>" => 'site/<_c>/<_a>/',
                "/<_c:([a-zA-z0-9-]+)>/<_a:([a-zA-z0-9-]+)>/tags/<tags:(.*?)>" => 'site/<_c>/<_a>/',
                "/admin/<_c:([a-zA-z0-9-]+)>" => 'admin/<_c>/index',
                "/admin/<_c:([a-zA-z0-9-]+)>/<_a:([a-zA-z0-9-]+)>" => 'admin/<_c>/<_a>',
                "/admin/<_c:([a-zA-z0-9-]+)>/<_a:([a-zA-z0-9-]+)>//*" => 'admin/<_c>/<_a>/',

            );
            
            $urlrules = array_merge( $_more, $this->rules );
            //Yii::app()->cache->set('customurlrules', $urlrules);
        // }
        
        $this->rules = $urlrules;
        
        // Run parent
        parent::processRules();
    }
}
