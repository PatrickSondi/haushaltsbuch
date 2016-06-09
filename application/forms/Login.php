<?php
class Forms_Login extends Zend_Form
{
	public function init()
	{
		$this->setMethod('post');

		$this->addElement('text', 'name', array(
			'label' => 'Benutzername',
			'required' => true,
			'filters'    => array('StringTrim'),
			'placeholder' => 'Benutzername eingeben'
		));

		$this->addElement('password', 'password', array(
			'label' => 'Passwort',
			'required' => true,
			'placeholder' => 'Passwort eingeben'
		));
		
		$this->handleDecorators();
	}
	
	public function handleDecorators()
	{
		foreach($this->getElements() as $element) {
			
			$element->clearDecorators();
			$element->addDecorator('ViewHelper');
			$element->setAttribs(array('class' => 'form-control'));
		}
	}
}