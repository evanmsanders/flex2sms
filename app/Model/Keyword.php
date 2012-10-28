<?php
App::uses('AppModel', 'Model');
/**
 * Keyword Model
 *
 * @property Service $Service
 */
class Keyword extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'word';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Service' => array(
			'className' => 'Service',
			'joinTable' => 'keywords_services',
			'foreignKey' => 'keyword_id',
			'associationForeignKey' => 'service_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		)
	);

}
