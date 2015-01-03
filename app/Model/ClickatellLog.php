<?php
App::uses('AppModel', 'Model');
/**
 * ClickatellLog Model
 *
 * @property Contact $Contact
 * @property Service $Service
 */
class ClickatellLog extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'clickatell_log';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'message';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Contact' => array(
			'className' => 'Contact',
			'foreignKey' => 'contact_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Service' => array(
			'className' => 'Service',
			'foreignKey' => 'service_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
