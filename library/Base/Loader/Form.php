<?php

class Base_Loader_Form {
	
	public static function autoload($sClass = '') {
        if(strpos($sClass, 'Forms_') !== 0) {
            return;
        }
        
		include_once APPLICATION_PATH . '/forms' . str_replace('_', '/', substr($sClass, 5)) . '.php';
        
        return class_exists($sClass, false);
    }
}

?>