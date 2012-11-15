<?php

class Message extends AppModel {

    public $name = 'Message';
    public $belongsTo = array('Contact', 'Service');
    public $useTable = 'outbox';

}

// eof
