<?php

class HomeController extends BaseController
{
    public function init()
    {
        $this->view->active = 'home';

        parent::init();
    }

    public function startAction(){
        $auth = Zend_Auth::getInstance();

        if($auth->hasIdentity())
        {
            $request = $this->getRequest();

            $id = $request->getParam('id', null);

            $userMapper = new Models_Mapper_User();

            $user = $userMapper->findById($id);

            $this->view->user = $user;
        } else {
            $this->_helper->Redirector->goToRouteAndExit(array('controller' => 'Users', 'action' => 'login'), null, true);
        }
    }

    public function monthsAction(){
        $auth = Zend_Auth::getInstance();

        if($auth->hasIdentity())
        {
            $this->_helper->layout->disableLayout();

            if (isset($_GET['moneyentryid'])){
                $moneyEntryId = $_GET['moneyentryid'];

                $moneyEntryMapper = new Models_Mapper_MoneyEntry();
                
                $moneyEntryMapper->deleteMoneyEntryById($moneyEntryId);
            }

            $monthId = $_GET['month'];

            $moneyEntryMapper = new Models_Mapper_MoneyEntry();

            $moneyEntries = $moneyEntryMapper->getByMonthsId($monthId);

            $this->view->moneyEntries = $moneyEntries;

        } else {
            $this->_helper->Redirector->goToRouteAndExit(array('controller' => 'Users', 'action' => 'login'), null, true);
        }
    }

    public function addAction(){
        $auth = Zend_Auth::getInstance();

        if($auth->hasIdentity())
        {
            $this->_helper->layout->disableLayout();

            $monthId = $_GET['month'];

            $value = $_GET['value'];

            $desc = $_GET['desc'];

            $userId = $_GET['userid'];

            $moneyEntryMapper = new Models_Mapper_MoneyEntry();

            $moneyEntry = new Models_MoneyEntry();

            $moneyEntry->setMonth_id($monthId);
            $moneyEntry->setValue($value);
            $moneyEntry->setDescription($desc);
            $moneyEntry->setUser_id($userId);
            $moneyEntry->setCategory_id(1);

            $moneyEntryMapper->safeMoneyEntry($moneyEntry);

        } else { 
            $this->_helper->Redirector->goToRouteAndExit(array('controller' => 'Users', 'action' => 'login'), null, true);
        }
    }

    public function deleteAction(){
        $auth = Zend_Auth::getInstance();

        if($auth->hasIdentity())
        {
            $this->_helper->layout->disableLayout();

            $moneyEntryId = $_GET['moneyentryid'];

            $moneyEntryMapper = new Models_Mapper_MoneyEntry();

            $moneyEntryMapper->deleteMoneyEntryById($moneyEntryId);

        } else {
            $this->_helper->Redirector->goToRouteAndExit(array('controller' => 'Users', 'action' => 'login'), null, true);
        }
    }
}