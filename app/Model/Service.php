<?php

class Service extends AppModel {

    public $name = 'Service';
    public $belongsTo = array('Capcode', 'Contact');

    public $validate = array(
        'capcode_id' => array(
            'required' => array(
                'rule' => 'notEmpty',
                'message' => 'Please select a CAP Code.'
            ),
            'numeric' => array (
                'rule' => 'numeric',
                'message' => 'The CAP Code must be identified by a numeric id.'
            )
        ),
        'contact_id' => array(
            'required' => array(
                'rule' => 'notEmpty',
                'message' => 'Please select a contact.'
            ),
            'numeric' => array(
                'rule' => 'numeric',
                'message' => 'The contact must be identified by a numeric id.'
            )
        )
    );

}

// eof
