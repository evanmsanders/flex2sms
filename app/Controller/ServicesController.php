<?php
App::uses('AppController', 'Controller');
/**
 * Services Controller
 *
 * @property Service $Service
 */
class ServicesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Service->recursive = 0;
		$this->set('services', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Service->id = $id;
		if (!$this->Service->exists()) {
			throw new NotFoundException(__('Invalid service'));
		}
		$this->set('service', $this->Service->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
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
		$capcodes = $this->Service->Capcode->find('list');
		$contacts = $this->Service->Contact->find('list');
		$this->set(compact('capcodes', 'contacts'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
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
		$capcodes = $this->Service->Capcode->find('list');
		$contacts = $this->Service->Contact->find('list');
		$this->set(compact('capcodes', 'contacts'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
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
}
