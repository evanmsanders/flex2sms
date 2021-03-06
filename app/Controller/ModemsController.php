<?php
App::uses('AppController', 'Controller');

class ModemsController extends AppController {

    public function beforeFilter() {
    
    }

	public function index() {
		$this->Modem->recursive = 0;
		$this->set('modems', $this->paginate());
	}

	public function view($id = null) {
		$this->Modem->id = $id;
		if (!$this->Modem->exists()) {
			throw new NotFoundException(__('Invalid modem'));
		}
		$this->set('modem', $this->Modem->read(null, $id));
	}

	public function add() {
		if ($this->request->is('post')) {
			$this->Modem->create();
			if ($this->Modem->save($this->request->data)) {
				$this->Session->setFlash(__('The modem has been saved'), null, null, 'success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The modem could not be saved. Please, try again.'), null, null, 'error');
			}
		}
	}

	public function edit($id = null) {
		$this->Modem->id = $id;
		if (!$this->Modem->exists()) {
			throw new NotFoundException(__('Invalid modem'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Modem->save($this->request->data)) {
				$this->Session->setFlash(__('The modem has been saved'), null, null, 'success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The modem could not be saved. Please, try again.'), null, null, 'error');
			}
		} else {
			$this->request->data = $this->Modem->read(null, $id);
		}
	}

	public function delete($id = null) {
		$this->Modem->id = $id;
		if (!$this->Modem->exists()) {
			throw new NotFoundException(__('Invalid modem'));
		}
		if ($this->Modem->delete()) {
			$this->Session->setFlash(__('Modem deleted'), null, null, 'success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Modem was not deleted'), null, null, 'error');
		$this->redirect(array('action' => 'index'));
	}
}
