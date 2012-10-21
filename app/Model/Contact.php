<?php

class Contact extends AppModel {

    public $name = 'Contact';
    public $hasMany = 'Service';
    public $belongsTo = array('Brigade', 'Modem');

}

// eof
