<?php
class Models_Mapper_MoneyEntry
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
            $this->setTable('Models_Db_MoneyEntry');
        }
        return $this->_table;
    }

    public function getByMonthsId($monthId)
    {
        $table = new Models_Db_MoneyEntry();

        $select = $table->select()->where('month_id = "'. $monthId .'"');

        return $select->query()->fetchAll();
    }

    public function getAllMoneyEntries()
    {
        $table = new Models_Db_MoneyEntry();

        $select = $table->select();

        return $select->query()->fetchAll();
    }
    
    public function safeMoneyEntry(Models_MoneyEntry $moneyEntry)
    {
        $data = array(
            'description'   => $moneyEntry->getDescription(),
            'value'		    => $moneyEntry->getValue(),
            'user_id'		=> $moneyEntry->getUser_id(),
            'category_id'   => $moneyEntry->getCategory_id(),
            'month_id'		=> $moneyEntry->getMonth_id(),
            'payed'         => $moneyEntry->getPayed()
        );

        if(null === ($id = $moneyEntry->getId()))
        {
            unset($data['id']);
            return $this->getTable()->insert($data);
        } else {
            $this->getTable()->update($data, array('id = ?' => $id));
        }
    }

    public function deleteMoneyEntryById($moneyEntryId){
        $table = $this->getTable();

        $data = $table->getAdapter()->quoteInto('id = ?', $moneyEntryId);

        $table->delete($data);
    }

    public function getMoneyEntryById($moneyEntryId){
        $row = $this->getTable()->fetchRow('id ="'.$moneyEntryId.'"');

        if($row == false)
        {
            return false;
        }

        $moneyEntry = new Models_MoneyEntry();
        $moneyEntry ->setValue($row->value);

        return $moneyEntry;
    }

    public function updatePayed(){
        $data = array(
            'payed'			=> 1
        );
        $this->getTable()->update($data);
    }
}
