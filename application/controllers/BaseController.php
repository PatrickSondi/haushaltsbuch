<?php

class BaseController extends Zend_Controller_Action {

    public $flashMessenger = null;

    public function init() {
        $this->initHead();
        $this->initUser();
        $this->initMessenger();
    }

    public function initMessenger() {
        $this->flashMessenger = $this->_helper->getHelper('FlashMessenger');
    }

    private function initHead() {
        $this->view->headScript()->appendFile('/external/jquery/js/jquery-2.2.1.min.js');
        $this->view->headScript()->appendFile('/external/bootstrap/js/bootstrap.min.js');

        $this->view->headLink()->appendStylesheet('/external/bootstrap/css/bootstrap.min.css');
        $this->view->headLink()->appendStylesheet('/external/font-awesome/css/font-awesome.min.css');

        $this->view->headScript()->appendFile('/internal/js/script.js');
        $this->view->headScript()->appendFile('/internal/js/ajaxHandling.js');
        $this->view->headScript()->appendFile('/internal/js/validation.js');
        $this->view->headLink()->appendStylesheet('/internal/css/styles.css');
    }

    private function initUser()
    {
        $auth = Zend_Auth::getInstance();

        if($auth->hasIdentity())
        {
            $ident = $auth->getIdentity();

            $this->view->baseUser = $ident;
        }
    }

    public function disableLayout($disableView = true) {
        if($disableView) {
            $this->_helper->viewRenderer->setNoRender(true);
        }
    }

    public function isXhr() {
        return !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
    }
}

?>