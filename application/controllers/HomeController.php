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

            $monthId = $_GET['month'];

            $moneyEntryMapper = new Models_Mapper_MoneyEntry();
            $currentDebtsMapper = new Models_Mapper_CurrentDebts();

            $moneyEntries = $moneyEntryMapper->getByMonthsId($monthId);

            $currentDebts = $currentDebtsMapper->getAll();

            $valuePatrick = 0;
            $valueTini = 0;

            foreach($currentDebts as $entry){
                if($entry['user_id'] == 1) {
                    $valuePatrick = $valuePatrick + $entry['value'];
                }
                else
                {
                    $valueTini = $valueTini + $entry['value'];
                }
            }

            
            $this->view->moneyEntries = $moneyEntries;
            $this->view->valueTini = $valueTini;
            $this->view->valuePatrick = $valuePatrick;
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
            $currentDebtsMapper = new Models_Mapper_CurrentDebts();

            if($userId == 1)
            {
                $currentValue = $currentDebtsMapper->getByUserId(1);

                $valueToSafe = $currentValue->getValue() + $value;

                $currentDebtsMapper->update(1, $valueToSafe);
            } else {
                $currentValue = $currentDebtsMapper->getByUserId(2);

                $valueToSafe = $currentValue->getValue() + $value;

                $currentDebtsMapper->update(2, $valueToSafe);
            }

            $moneyEntry->setMonth_id($monthId);
            $moneyEntry->setValue($value);
            $moneyEntry->setDescription($desc);
            $moneyEntry->setUser_id($userId);
            $moneyEntry->setCategory_id(1);
            $moneyEntry->setPayed(0);

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

            $userId = $_GET['userid'];

            $moneyEntryMapper = new Models_Mapper_MoneyEntry();
            $currentDebtsMapper = new Models_Mapper_CurrentDebts();
            
            $moneyEntry = $moneyEntryMapper->getMoneyEntryById($moneyEntryId);
            
            if($userId == 1)
            {
                $currentValue = $currentDebtsMapper->getByUserId(1);

                $valueToSafe = $currentValue->getValue() - $moneyEntry->getValue();

                $currentDebtsMapper->update(1, $valueToSafe);
            } else {
                $currentValue = $currentDebtsMapper->getByUserId(2);

                $valueToSafe = $currentValue->getValue() -  $moneyEntry->getValue();

                $currentDebtsMapper->update(2, $valueToSafe);
            }

            $moneyEntryMapper->deleteMoneyEntryById($moneyEntryId);

        } else {
            $this->_helper->Redirector->goToRouteAndExit(array('controller' => 'Users', 'action' => 'login'), null, true);
        }
    }

    public function paydebtAction(){
        $auth = Zend_Auth::getInstance();

        if($auth->hasIdentity())
        {
            $this->_helper->layout->disableLayout();

            $value = $_GET['value'];

            $userId = $_GET['userid'];

            $currentDebtsMapper = new Models_Mapper_CurrentDebts();
            $moneyEntryMapper = new Models_Mapper_MoneyEntry();
            
            if($userId == 1)
            {
                $currentValue = $currentDebtsMapper->getByUserId(1);

                $valueToSafe = $currentValue->getValue() - $value*2;

                $currentDebtsMapper->update(1, $valueToSafe);
            } else {
                $currentValue = $currentDebtsMapper->getByUserId(2);

                $valueToSafe = $currentValue->getValue() - $value*2;

                $currentDebtsMapper->update(2, $valueToSafe);
            }

            $moneyEntryMapper->updatePayed();
        } else {
            $this->_helper->Redirector->goToRouteAndExit(array('controller' => 'Users', 'action' => 'login'), null, true);
        }
    }
}