<?php

class DashboardController extends AppController {

    public function beforeFilter() {
    
    }

    public function index() {
        $this->uses = array('Scanner', 'Message', 'Status');
        
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
        // Get latest status
        $this->set('statuses', $this->Status->find('all', array(
            'limit' => 1,
            'order' => 'Status.id DESC'
        )));
    }

}

// eof
