<?php

class Capcode extends AppModel {

    public $name = 'Capcode';
    public $displayField = 'code';
    public $hasMany = 'Service';

    public $validate = array(
        'code' => array(
            'required' => array(
                'rule' => 'notEmpty',
                'message' => 'Please enter a code.'
            )
        )
    );
    
}

// eof
