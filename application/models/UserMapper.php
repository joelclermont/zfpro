<?php

class Application_Model_UserMapper
{
	protected $_dbtable;
	
	public function setDbTable($dbTable)
	{
		if (is_string($dbTable)) {
			$dbTable = new $dbTable();
		}
		if (!$dbTable instanceof Zend_Db_Table_Abstract) {
			throw new Exception('Invalid table data gateway provided');
		}
		$this->_dbtable = $dbTable;
		return $this;
	}

	public function getDbTable()
	{
		if (null === $this->_dbtable) {
			$this->setDbTable('Application_Model_DbTable_Users');
		}
		return $this->_dbtable;
	}
	

	public function fetchAll()
	{
		$resultSet = $this->getDbTable()->fetchAll();
		$users = array();
		foreach($resultSet as $row) {
			$user = new Application_Model_User();
			$user->id = $row->id;
			$user->firstName = $row->first_name;
			$user->lastName = $row->last_name;
			$users[] = $user;
		}
		return $users;
	}

}

