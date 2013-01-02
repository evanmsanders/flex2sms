<?php
App::uses('AppModel', 'Model', 'AuthComponent');
/**
 * User Model
 *
 */
class User extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'username';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'username' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please enter a username.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'alphanumeric' => array(
				'rule' => array('alphanumeric'),
				'message' => 'The username must contain only numbers and letters.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'minlength' => array(
				'rule' => array('minlength', 4),
				'message' => 'The username must be at least four characters long.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
            'unique' => array(
                'rule' => 'isUnique',
                'message' => 'That username is already in use. Please choose another.'
            )
		),
		'password' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please enter a password.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'minlength' => array(
				'rule' => array('minlength', 8),
				'message' => 'The password must be at least eight characters long.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
        ),
        'email' => array(
            'notempty' => array(
                'rule' => 'notEmpty',
                'message' => 'Please enter an email address.'
            ),
            'email' => array(
                'rule' => 'email',
                'message' => 'That does not appear to be a valid email address.'
            ),
            'unique' => array(
                'rule' => 'isUnique',
                'message' => 'That email address is already in use.'
            )
        )
    );

    public function beforeSave($options = array()) {
        if(isset($this->data['User']['password'])) {
            $this->data['User']['password'] = AuthComponent::password($this->data['User']['password']);
        }
    }
}
