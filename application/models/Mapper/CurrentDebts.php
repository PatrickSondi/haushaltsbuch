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

    }

    public function saveByUser_id($userid, $value){
        $data = array(
            'value'			=> $value
        );

        $this->getTable()->update($data, array('user_id = ?' => $userid));
    }
}
