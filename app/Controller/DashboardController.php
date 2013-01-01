<?php

class DashboardController extends AppController {

    public function beforeFilter() {
    
    }

    public function index() {
        $this->uses = array('Scanner', 'Message');
        
        // Load messages seperately.
        $this->set('messages', $this->Message->find('all', array(
            'limit' => 10,
            'order' => 'Message.id DESC'
        )));
        // Manually load scanner messages.
        $this->set('scanners', $this->Scanner->find('all', array(
            'limit' => 10,
            'order' => 'Scanner.id DESC'
        )));
    }

}

// eof
