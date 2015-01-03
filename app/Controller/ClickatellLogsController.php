<?php
App::uses('AppController', 'Controller');
/**
 * ClickatellLogs Controller
 *
 * @property ClickatellLog $ClickatellLog
 */
class ClickatellLogsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->ClickatellLog->recursive = 0;
		$this->set('clickatellLogs', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->ClickatellLog->id = $id;
		if (!$this->ClickatellLog->exists()) {
			throw new NotFoundException(__('Invalid clickatell log'));
		}
		$this->set('clickatellLog', $this->ClickatellLog->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ClickatellLog->create();
			if ($this->ClickatellLog->save($this->request->data)) {
				$this->Session->setFlash(__('The clickatell log has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The clickatell log could not be saved. Please, try again.'));
			}
		}
		$contacts = $this->ClickatellLog->Contact->find('list');
		$services = $this->ClickatellLog->Service->find('list');
		$this->set(compact('contacts', 'services'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->ClickatellLog->id = $id;
		if (!$this->ClickatellLog->exists()) {
			throw new NotFoundException(__('Invalid clickatell log'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->ClickatellLog->save($this->request->data)) {
				$this->Session->setFlash(__('The clickatell log has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The clickatell log could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->ClickatellLog->read(null, $id);
		}
		$contacts = $this->ClickatellLog->Contact->find('list');
		$services = $this->ClickatellLog->Service->find('list');
		$this->set(compact('contacts', 'services'));
	}

/**
 * delete method
 *
 * @throws MethodNotAllowedException
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->ClickatellLog->id = $id;
		if (!$this->ClickatellLog->exists()) {
			throw new NotFoundException(__('Invalid clickatell log'));
		}
		if ($this->ClickatellLog->delete()) {
			$this->Session->setFlash(__('Clickatell log deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Clickatell log was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
