<?php

class Contact extends AppModel {

    public $name = 'Contact';
    public $belongsTo = array('Brigade', 'Modem');
    public $hasAndBelongsToMany = 'Service';

    public $validate = array(
        'name' => array(
            'required' => array(
                'rule' => 'notEmpty',
                'message' => 'Please enter a name for the contact.'
            )
        ),
        'brigade_id' => array(
            'required' => array(
                'rule' => 'notEmpty',
                'message' => 'Please select a Brigade.'
            ),
            'numeric' => array(
                'rule' => 'numeric',
                'message' => 'A Brigade must be selected.'
            )
        ),
        'number' => array(
            'required' => array(
                'rule' => 'notEmpty',
                'message' => 'Please provide a phone number for the contact.'
            ),
            'unique' => array(
                'rule' => 'isUnique',
                'message' => 'That phone number is already in use.'
            ),
            'phone' => array(
                'rule' => "/^(\+61)[0-9]{9}$/i", // starts with "+61" then nine numbers.
                'Please enter the full mobile number without any spaces, and replacing the leading 0 with +61.'
            )
        ),
        'modem_id' => array(
            'required' => array(
                'rule' => 'notEmpty',
                'message' => 'Please select a modem device for the contact.'
            ),
            'numeric' => array(
                'rule' => 'numeric',
                'message' => 'The modem must be identified by a numeric id.'
            )
        ),
        'email' => array(
            'email' => array(
                'rule' => 'email',
                'message' => 'The email address you entered does not look like a valid email address.'
            )
        ),
        'default_not_before' => array(
            'required' => array(
                'rule' => 'notEmpty',
                'message' => 'Please enter a default time before which we should not send messages.'
            ),
            'time' => array(
                'rule' => 'time',
                'message' => 'That does not appear to be a valid time of day.'
            )
        ),
        'default_not_after' => array(
            'required' => array(
                'rule' => 'notEmpty',
                'message' => 'Please enter a default time after which we should not send messages.'
            ),
            'time' => array(
                'rule' => 'time',
                'message' => 'That does not appear to be a valid time of day.'
            )
        ),
        'approved_by' => array(
            'required' => array(
                'rule' => 'notEmpty',
                'message' => 'Please specify who approved this contact.'
            )
        )
    );

}

// eof
