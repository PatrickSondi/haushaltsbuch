<?php

class Base_Loader_Model {
	
	public static function autoload($sClass = '') {
        if(strpos($sClass, 'Models_') !== 0) {
            return;
        }
        
		include_once APPLICATION_PATH . '/models' . str_replace('_', '/', substr($sClass, 6)) . '.php';
        
        return class_exists($sClass, false);
    }
}

?>