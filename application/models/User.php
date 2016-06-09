<?php

class Models_User
{
	protected $_id = NULL;
	
	protected $_name = NULL;
	
	protected $_password = NULL;
	
	public function __construct(array $options = null)
	{
		if(is_array($options))
		{
			$this->setOptions($options);
		}
	}
	
	public function __set($name, $value)
	{
		$method = 'set' . $name;
		
		if(('mapper' == $name) || !method_exists($this, $method))
		{
			throw new Exception('Ungueltige User Eigenschaft.');
		}
		
		$this->$method($value);
	}
	
	public function __get($name)
	{
		$method = 'get' . $name;
		
		if(('mapper' == $name) || !method_exists($this, $method))
		{
			throw new Exception('Ungueltige User Eigenschaft.');
		}
		
		return $this->$method();
	}
	
	public function setOptions(array $options)
	{
		$methods = get_class_methods($this);
		foreach ($options as $key => $value) {
			$method = 'set' . ucfirst($key);
			if (in_array($method, $methods)) {
				$this->$method($value);
			}
		}
		return $this;
	}
	
	public function setId($id)
	{
		$this->_id = (int) $id;
		return $this;
	}
	
	public function getId()
	{
		return $this->_id;
	}
	
	public function setName($name)
	{
		$this->_name = (string) $name;
		return $this;
	}
	
	public function getName()
	{
		return $this->_name;
	}
	
	public function setPassword($password)
	{
		$this->_password = (string) $password;
		return $this;
	}
	
	public function getPassword()
	{
		return $this->_password;
	}
}