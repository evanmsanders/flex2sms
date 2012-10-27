<?php
App::uses('AppController', 'Controller');

class BrigadesController extends AppController {

    public function beforeFilter() {
    
    }

	public function index() {
		$this->Brigade->recursive = -1;
		$this->set('brigades', $this->paginate());
	}

	public function view($id = null) {
		$this->Brigade->id = $id;
		if (!$this->Brigade->exists()) {
			throw new NotFoundException(__('Invalid brigade'));
		}
		$this->set('brigade', $this->Brigade->read(null, $id));
	}

	public function add() {
		if ($this->request->is('post')) {
			$this->Brigade->create();
			if ($this->Brigade->save($this->request->data)) {
				$this->Session->setFlash(__('The brigade has been saved'), null, null, 'success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The brigade could not be saved. Please, try again.'), null, null, 'error');
			}
		}
	}

	public function edit($id = null) {
		$this->Brigade->id = $id;
		if (!$this->Brigade->exists()) {
			throw new NotFoundException(__('Invalid brigade'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Brigade->save($this->request->data)) {
				$this->Session->setFlash(__('The brigade has been saved'), null, null, 'success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The brigade could not be saved. Please, try again.'), null, null, 'error');
			}
		} else {
			$this->request->data = $this->Brigade->read(null, $id);
		}
	}

	public function delete($id = null) {
        $this->Brigade->id = $id;
		if (!$this->Brigade->exists()) {
			throw new NotFoundException(__('Invalid brigade'));
		}
		if ($this->Brigade->delete()) {
			$this->Session->setFlash(__('Brigade deleted'), null, null, 'success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Brigade was not deleted'), null, null, 'error');
		$this->redirect(array('action' => 'index'));
	}
}
