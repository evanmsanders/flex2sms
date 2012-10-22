<?php 

class Modem extends AppModel {

    public $name = 'Modem';
    public $hasMany = 'Contact';

    public $validate = array(
        'name' => array(
            'required' => array(
                'rule' => 'notEmpty',
                'message' => 'Please enter a name for the modem.'
            )
        ),
        'device' => array(
            'required' => array(
                'rule' => 'notEmpty',
                'message' => 'Please enter a device number.'
            ),
            'numeric' => array(
                'rule' => 'numeric',
                'message' => 'The device must be a number.'
            ),
            'unique' => array(
                'rule' => 'isUnique',
                'message' => 'That device number is already in use.'
            )
        )
    );

}

// eof
