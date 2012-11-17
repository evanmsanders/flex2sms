<?php
App::uses('AppController', 'Controller');

class ContactsController extends AppController {

    var $paginate = array(        
        'limit' => 20,        
        'order' => array('name' => 'asc')
    );

    public function beforeFilter() {
    
    }

	public function index() {
		$this->Contact->recursive = 0;
		$this->set('contacts', $this->paginate());
	}

	public function view($id = null) {
		$this->Contact->id = $id;
		if (!$this->Contact->exists()) {
			throw new NotFoundException(__('Invalid contact'));
		}
        $this->set('contact', $this->Contact->find('first', array(
            'conditions' => array('Contact.id' => $id),
            'contain' => array(
                'Message' => array(
                    'order' => 'Message.processed_date DESC',
                    'limit' => 20,
                    'fields' => array(
                        'Message.id',
                        'Message.text',
                        'Message.processed',
                        'Message.processed_date',
                        'Message.error'
                    )
                ),
                'Brigade',
                'Modem',
                'Service'
            )
        )));
	}

	public function add() {
		if ($this->request->is('post')) {
			$this->Contact->create();
			if ($this->Contact->save($this->request->data)) {
				$this->Session->setFlash(__('The contact has been saved'), null, null, 'success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The contact could not be saved. Please, try again.'), null, null, 'error');
			}
		}
		$brigades = $this->Contact->Brigade->find('list', array('order' => 'name ASC'));
        $modems = $this->Contact->Modem->find('list');
        $services = $this->Contact->Service->find('list');
		$this->set(compact('brigades', 'modems', 'services'));
	}

	public function edit($id = null) {
		$this->Contact->id = $id;
		if (!$this->Contact->exists()) {
			throw new NotFoundException(__('Invalid contact'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Contact->save($this->request->data)) {
				$this->Session->setFlash(__('The contact has been saved'), null, null, 'success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The contact could not be saved. Please, try again.'), null, null, 'error');
			}
		} else {
			$this->request->data = $this->Contact->read(null, $id);
		}
		$brigades = $this->Contact->Brigade->find('list', array('order' => 'name ASC'));
        $modems = $this->Contact->Modem->find('list');
        $services = $this->Contact->Service->find('list');
		$this->set(compact('brigades', 'modems', 'services'));
	}

	public function delete($id = null) {
        $this->Contact->id = $id;
		if (!$this->Contact->exists()) {
			throw new NotFoundException(__('Invalid contact'));
		}
		if ($this->Contact->delete()) {
			$this->Session->setFlash(__('Contact deleted'), null, null, 'success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Contact was not deleted'), null, null, 'error');
		$this->redirect(array('action' => 'index'));
	}
}
