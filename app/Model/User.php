<?php
class User extends AppModel {
	public $validate = array(
		'username' => array(
			'required' => array(
					'rule' => array('notEmpty'),
					'message' => 'Devi inserire uno username'
			)
		),
		'password' => array(
			'required' => array(
					'rule' => array('notEmpty'),
					'message' => 'Serve una password'
			)
		),
		'role' => array(
			'valid' => array(
					'rule' => array('inList', array('admin', 'cameriere', 'cuoco', 'cassiere')),
					'message' => 'Seleziona tra i ruoli disponibili',
					'allowEmpty' => false
			)
		)
	);
	
	public function beforeSave($options = array()) {
	    if (isset($this->data[$this->alias]['password'])) {
	        $this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
	    }
	    return true;
	}
	
	//COMMENTO DI PROVA PER IL COMMIMT

}