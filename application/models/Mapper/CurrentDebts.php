<?php
class Models_Mapper_CurrentDebts
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
            $this->setTable('Models_Db_CurrentDebts');
        }
        return $this->_table;
    }

    public function getAll(){
        $table = new Models_Db_CurrentDebts();

        $select = $table->select();

        return $select->query()->fetchAll();
    }

    public function getByUserId($userid)
    {
        $row = $this->getTable()->fetchRow('user_id ="'.$userid.'"');

        if($row == false)
        {
            return false;
        }

        $debts = new Models_CurrentDebts();
        $debts	->setId($row->id)
                ->setUser_id($row->user_id)
                ->setValue($row->value);

        return $debts;
    }

    public function update($userid, $value){
        $data = array(
            'value'			=> $value
        );

        $this->getTable()->update($data, array('user_id = ?' => $userid));
    }
}
