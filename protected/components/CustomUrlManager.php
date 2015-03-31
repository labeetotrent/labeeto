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

		$active_lang = implode('|', array_keys( Yii::app()->params['languages'] ));
		$domain = Yii::app()->params['current_domain'];
		
		// if( ($urlrules = Yii::app()->cache->get('customurlrules')) === false )
		// {
			$_more = array();

			$this->rules = array(

				//-----------------------ADMIN--------------
				"/admin" => 'admin/index/index',
				"/admin/<_c:([a-zA-z0-9-]+)>" => 'admin/<_c>/index',
				"/admin/<_c:([a-zA-z0-9-]+)>/<_a:([a-zA-z0-9-]+)>" => 'admin/<_c>/<_a>',
				"/admin/<_c:([a-zA-z0-9-]+)>/<_a:([a-zA-z0-9-]+)>//*" => 'admin/<_c>/<_a>/',
				//-----------------------ADMIN--------------

                //gii
                "/gii" => array('gii'),
                "/gii/<_c:([a-zA-z0-9-_]+)>" => array('gii/<_c>/'),
                "/gii/<_c:([a-zA-z0-9-_]+)>/<_a:([a-zA-z0-9-_]+)>/*" => array('gii/<_c>/<_a>/'),



                "/register" => 'site/user/create/',
                "/my_feed" => 'site/user/My_feed/',
                "/achievement" => 'site/user/achievement/',
                "/profile" => 'site/user/profile/',
                "/settings" => 'site/user/setting/',
                "/profile_other" => 'site/user/profile_other/',
                "/answer/SaveAnswer/<id:([a-zA-z0-9-_]+)?>" => 'site/answer/SaveAnswer/',
                
				"/admin-login" => 'site/user/admin',
				"/forgotpassword" => 'site/user/lostpassword',
                
                "/user/detail/<id:([a-zA-z0-9-_]+)>" => 'site/user/detail/',
                
				"/" => 'site/index/index',
				"/<_c:([a-zA-z0-9-]+)>" => 'site/<_c>/index',
				"/<_c:([a-zA-z0-9-]+)>/<_a:([a-zA-z0-9-]+)>" => 'site/<_c>/<_a>',
				"/<_c:([a-zA-z0-9-]+)>/<_a:([a-zA-z0-9-]+)>//*" => 'site/<_c>/<_a>/',
                
                
               
			);

			$urlrules = array_merge( $_more, $this->rules );
			//Yii::app()->cache->set('customurlrules', $urlrules);
		// }
		
		$this->rules = $urlrules;
		
        // Run parent
        parent::processRules();

    }

	/**
	 * Clear the url manager cache
	 */
	public function clearCache()
	{
		Yii::app()->cache->delete('customurlrules');
	}

    /**
     *
     * @see CUrlManager 
     *
     * Constructs a URL.
     * @param string the controller and the action (e.g. article/read)
     * @param array list of GET parameters (name=>value). Both the name and value will be URL-encoded.
     * If the name is '#', the corresponding value will be treated as an anchor
     * and will be appended at the end of the URL. This anchor feature has been available since version 1.0.1.
     * @param string the token separating name-value pairs in the URL. Defaults to '&'.
     * @return string the constructed URL
     */
    public function createUrl($route,$params=array(),$ampersand='&')
    {
        // We added this by default to all links to show
        // Content based on language - Add only when not excplicity set
		/*if( !isset($params['lang']) )
		{
			$params['lang'] = Yii::app()->language;
		}
		
		if( ( isset($params['lang']) && $params['lang'] === false ) )
		{
			unset($params['lang']);
		}*/
		if( isset($params['lang']) )
		{
			unset($params['lang']);
		}
        // Use parent to finish url construction
        return parent::createUrl($route, $params, $ampersand);
    }
}
