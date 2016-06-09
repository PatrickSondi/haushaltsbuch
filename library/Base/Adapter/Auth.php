<?php
class Base_Adapter_Auth implements Zend_Auth_Adapter_Interface
{
	protected $_name = null;
	
	protected $_password = null;
	
	public function __construct($name, $password)
	{
		$this->_name = $name;
		$this->_password = $password;
	}
	
	public function authenticate()
	{
		$usermapper = new Models_Mapper_User();
		
		$user = $usermapper->findByName($this->_name);
		
		if($user !== false) {
			if(md5($this->_password) == $user->getPassword()) {
				return new Zend_Auth_Result(Zend_Auth_Result::SUCCESS, $user);
			}
		}
		
		return new Zend_Auth_Result(Zend_Auth_Result::FAILURE, null);
	}
}