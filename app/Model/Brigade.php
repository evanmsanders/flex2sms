<?php 

class Brigade extends Model {

    public $name = 'Brigade';
    public $hasMany = 'Contact';

    public $validate = array(
        'name' => array(
            'required' => array(
                'rule' => 'notEmpty',
                'message' => 'Please enter a name for the Brigade.'
            )
        )
    );

}

// eof
