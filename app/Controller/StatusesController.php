<?php
App::uses('AppController', 'Controller');
/**
 * Statuses Controller
 *
 */
class StatusesController extends AppController {
    var $paginate = array(
    'limit' => 100,
    'order' => array(            
        'id' => 'desc'
        ));

    public function beforeFilter() {
    
    }
    
    public function index() {
        $this->set('statuses', $this->paginate());
    }
    
    public function view($id = null) {
            $this->Status->id = $id;
            if (!$this->Status->exists()) {
                    throw new NotFoundException(__('Invalid message'));
            }
            $this->set('status', $this->Status->read(null, $id));
    }

}
