<?php
class Models_Mapper_Month
{
    protected $_table;

    public function setTable($table)
    {
        if (is_string($table)) {
            $table = new $table();
        }
        if (!$table instanceof Zend_Db_Table_Abstract) {
            throw new Exception("Ungueltiges Table Data Gateway angegeben.");
        }
        $this->_table = $table;
        return $this;
    }

    public function getTable()
    {
        if (null === $this->_table) {
            $this->setTable('Models_Db_Month');
        }
        return $this->_table;
    }

    public function getAll()
    {
        $table = new Models_Db_Month();

        $select = $table->select();

        return $select->query()->fetchAll();
    }

    public function getById($id)
    {
        $row = $this->getTable()->fetchRow('id ="'.$id.'"');

        if($row == false)
        {
            return false;
        }

        $month = new Models_Month();
        $month	->setId($row->id)
                ->setName($row->name);

        return $month;
    }
}