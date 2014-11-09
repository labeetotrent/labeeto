<?php
/**
 * Custom user class
 */
class CustomWebUser extends CWebUser
{
	/**
	* @var object
	*/
	private $_model = null;
  
	/**
	* This is here since there is a bug with cookies
	* that have been saved to a domain name such as
	* .domain.com so all subdomains can access it as well
	* @see http://code.google.com/p/yii/issues/detail?id=856
	*/
	/* public function logout($destroySession = true)
	{
		if ($this->allowAutoLogin && isset($this->identityCookie['domain']))
		{
			$cookies = Yii::app()->getRequest()->getCookies();

			if (null !== ($cookie = $cookies[$this->getStateKeyPrefix()]))
			{
				$originalCookie = new CHttpCookie($cookie->name, $cookie->value);
				$cookie->domain = $this->identityCookie['domain'];
				$cookies->remove($this->getStateKeyPrefix());
				$cookies->add($originalCookie->name, $originalCookie);
			}

			// Remove Roles
			$assigned_roles = Yii::app()->authManager->getRoles(Yii::app()->user->id);
			if(!empty($assigned_roles))
			{
				$auth=Yii::app()->authManager;
				foreach($assigned_roles as $n=>$role)
				{
					if($auth->revoke($n,Yii::app()->user->id))
					yiiii::app()->authManager->save();
				}
			}                
		}         
		parent::logout($destroySession);
	}*/

	public function getRole() {
		if($user = $this->getModel()){
			return $user->role;
		}
	}

	public function getAvaLink(){
		if($user = $this->getModel()){
			return $user->AvaSrc;
		}
	}

	public function getName(){
		if($user = $this->getModel()){
			return $user->first_name.' '.$user->last_name;
		}
	}

	private function getModel(){
		if (!$this->isGuest && $this->_model === null){
			$this->_model = User::model()->findByPk($this->id);
		}
		return $this->_model;
	}

	public function model(){
		if(!Yii::app()->user->isGuest){
			$model = User::model()->findByPk(Yii::app()->user->id);
			return $model;
		}   
		return false;
	}
	public function checkAdminRole(){
		return true;
	}
	public function checkSuperAdmin(){
		if(isset($this->model()->roles))
			if($this->model()->roles == User::ROLE_SYSTEM || $this->model()->roles == User::ROLE_SUPER_ADMIN )
				return true;
		else
			return false;
	}
}