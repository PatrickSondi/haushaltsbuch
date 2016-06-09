<?php
class Models_Mapper_User
{
	protected $_table;
	
	public function setTable($table)
	{
		if(is_string($table))
		{
			$table = new $table();
		}
		if(!$table instanceof Zend_Db_Table_Abstract)
		{
			throw new Exception("Ungueltiges Table Data Gateway angegeben.");
		}
		$this->_table = $table;
		return $this;
	}
	
	public function getTable()
	{
		if(null === $this->_table)
		{
			$this->setTable('Models_Db_User');
		}
		return $this->_table;
	}
	
/*	public function save(Models_User $user)
	{
		$data = array(
				'id'			=> $user->getId(),
				'email'			=> $user->getEmail(),
				'firstname'		=> $user->getFirstname(),
				'lastname'		=> $user->getLastname(),
				'is_admin'		=> $user->getIs_admin(),
				'password'		=> $user->getPassword(),
				'password_sent'	=> $user->getPassword_sent(),
				'created'		=> $user->getCreated()
		);
		
		if(null === ($id = $user->getId()))
		{
			unset($data['id']);
			return $this->getTable()->insert($data);
		} else {
			$this->getTable()->update($data, array('id = ?' => $id));
		}
	}
	
	public function find($id, Models_User $user)
	{
		$result = $this->getTable()->find($id);
		
		if(0 == count($result))
		{
			return;
		}
		
		$row = $result->current();
		$user	->setId($row->id)
				->setEmail($row->email)
				->setFirstname($row->firstname)
				->setLastname($row->lastname)
				->setIs_admin($row->is_admin)
				->setPassword($row->password)
				->setPassword_sent($row->password_sent)
				->setCreated($row->created);
	} */
	
	public function findById($id)
	{
		$row = $this->getTable()->fetchRow('id ="'.$id.'"');
	
		if($row == false)
		{
			return false;
		}
	
		$user = new Models_User();
		$user	->setId($row->id)
				->setName($row->name)
				->setPassword($row->password);
	
		return $user;
	}
	
	public function findByName($name)
	{
		$row = $this->getTable()->fetchRow('name ="'.$name.'"');
		
		if($row == false)
		{
			return false;
		}
		
		$user = new Models_User();
		
		$user	->setId($row->id)
				->setName($row->name)
				->setPassword($row->password);
		
		return $user;
	}
	
	/*public function fetchAll()
	{
		$resultSet = $this->getTable()->fetchAll();
		$entries = array();
		
		foreach ($resultSet as $row)
		{
			$entry = new Models_User();
			$entry	->setId($row->id)
					->setEmail($row->email)
					->setFirstname($row->firstname)
					->setLastname($row->lastname)
					->setIs_admin($row->is_admin)
					->setPassword($row->password)
					->setPassword_sent($row->password_sent)
					->setCreated($row->created);
			$entries[] = $entry;
		}
		
		return $entries;
	}
	
	public function getAllUsers()
	{
		$table = new Models_Db_User();
	
		$select = $table->select()
		->order('lastname ASC');
	
		return $select->query()->fetchAll();
	}
	
	public function delete($id)
	{
		$table = $this->getTable();
	
		$data = $table->getAdapter()->quoteInto('id = ?', $id);
	
		$table->delete($data);
	}
	
	public function getAllUnassignedUsers($customerId)
	{
		$tableCu = new Models_Db_CustomerUser();
		$table = new Models_Db_User();
	
		$selectCu = $tableCu->select()	->distinct()
										->from('customers_users', array('user_id'))
										->where('customer_id = "' . $customerId . '"');
	
		$select = $table->select()	->where('id NOT IN(' . $selectCu . ') ')
									->order('lastname DESC')
									->setIntegrityCheck(false);
	
		return $select->query()->fetchAll();
	
	}*/
}