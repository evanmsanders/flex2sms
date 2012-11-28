<?php
App::uses('AppController', 'Controller');

class ServicesController extends AppController {

    var $paginate = array(        
        'limit' => 30,        
        'order' => array('name' => 'asc')
    );

    public function beforeFilter() {
    
    }

	public function index() {
            $this->Service->recursive = 1;
            $this->set('services', $this->paginate());
	}

	public function view($id = null) {
            $this->Service->id = $id;
            if (!$this->Service->exists()) {
                throw new NotFoundException(__('Invalid service'));
            }
            $this->set('service', $this->Service->find('first', array(
            'conditions' => array('Service.id' => $id),
            'contain' => array(
                'Message' => array(
                    'order' => 'Message.id DESC',
                    'limit' => 20,
                    'fields' => array(
                        'Message.id',
                        'Message.text',
                        'Message.processed',
                        'Message.processed_date',
                        'Message.error'
                    )
                ),
                'Keyword',
                'Capcode',
                'Contact' => array(
                    'fields' => array(
                        'Contact.id',
                        'Contact.name',
                        'Contact.brigade_id',
                    )
                )
            )
        )));
	}

	public function add() {
        if ($this->request->is('post')) {
            $this->Service->create();
            if ($this->Service->save($this->request->data)) {
                $this->Session->setFlash(__('The service has been saved'), null, null, 'success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The service could not be saved. Please, try again.'), null, null, 'error');
            }
        }
                $contacts = $this->Service->Contact->find('list', array('order' => 'name ASC'));
                $keywords = $this->Service->Keyword->find('list', array('order' => 'word ASC'));
		$this->set(compact('contacts', 'keywords'));
	}

	public function edit($id = null) {
            $this->Service->id = $id;
            if (!$this->Service->exists()) {
                    throw new NotFoundException(__('Invalid service'));
            }
            if ($this->request->is('post') || $this->request->is('put')) {
                if ($this->Service->save($this->request->data)) {
                    $this->Session->setFlash(__('The service has been saved'), null, null, 'success');
                    $this->redirect(array('action' => 'index'));
                } else {
                    $this->Session->setFlash(__('The service could not be saved. Please, try again.'), null, null, 'error');
                }
            } else {
                    $this->request->data = $this->Service->read(null, $id);
            }
            $contacts = $this->Service->Contact->find('list', array('order' => 'Contact.name ASC'));
            $keywords = $this->Service->Keyword->find('list', array('order' => 'Keyword.word ASC'));
            $this->set(compact('contacts', 'keywords'));
	}

	public function delete($id = null) {
            $this->Service->id = $id;
            if (!$this->Service->exists()) {
                throw new NotFoundException(__('Invalid service'));
            }
            if ($this->Service->delete()) {
                $this->Session->setFlash(__('Service deleted'), null, null, 'success');
                $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('Service was not deleted'), null, null, 'error');
            $this->redirect(array('action' => 'index'));
	}
        
        public function suggest($param = 1) {
            // $this->Serive->Brigade->id = $param['brigade_id'];
            $this->set('services', $this->Service->Brigade->Contact->find('list'));
        }
}
