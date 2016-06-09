<?php
class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
    protected function _initAutoLoader() {
        $oAutoLoader = Zend_Loader_Autoloader::getInstance();

        $oAutoLoader->registerNamespace('Base_');

        $oAutoLoader->registerNamespace(array('namespace' => 'Base_', 'basePath' => APPLICATION_PATH.'/../library/'));

        $oAutoLoader->pushAutoloader(array('Base_Loader_Model', 'autoload'), 'Models');
        $oAutoLoader->pushAutoloader(array('Base_Loader_Form', 'autoload'), 'Forms');
    }

    protected function _initDbResource() {
        $this->bootstrap('db');

        Zend_Registry::set('dbAdapter', $this->getResource('db'));
    }

    protected function _initConfig() {
        require_once(APPLICATION_PATH . '/controllers/BaseController.php');
    }

    protected function _initDatabase() {
        $this->bootstrap('Config');
    }
}