<?php
App::uses('AppController', 'Controller');

class ContactsController extends AppController {

	public function index() {
		$this->Contact->recursive = 0;
		$this->set('contacts', $this->paginate());
	}

	public function view($id = null) {
		$this->Contact->id = $id;
		if (!$this->Contact->exists()) {
			throw new NotFoundException(__('Invalid contact'));
		}
		$this->set('contact', $this->Contact->read(null, $id));
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
		$brigades = $this->Contact->Brigade->find('list');
		$modems = $this->Contact->Modem->find('list');
		$this->set(compact('brigades', 'modems'));
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
		$brigades = $this->Contact->Brigade->find('list');
		$modems = $this->Contact->Modem->find('list');
		$this->set(compact('brigades', 'modems'));
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
