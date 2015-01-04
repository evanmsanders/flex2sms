<?php
App::uses('AppController', 'Controller');
/**
 * EmailLogs Controller
 *
 * @property EmailLog $EmailLog
 */
class EmailLogsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->EmailLog->recursive = 0;
		$this->set('emailLogs', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->EmailLog->id = $id;
		if (!$this->EmailLog->exists()) {
			throw new NotFoundException(__('Invalid email log'));
		}
		$this->set('emailLog', $this->EmailLog->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->EmailLog->create();
			if ($this->EmailLog->save($this->request->data)) {
				$this->Session->setFlash(__('The email log has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The email log could not be saved. Please, try again.'));
			}
		}
		$contacts = $this->EmailLog->Contact->find('list');
		$services = $this->EmailLog->Service->find('list');
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
		$this->EmailLog->id = $id;
		if (!$this->EmailLog->exists()) {
			throw new NotFoundException(__('Invalid email log'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->EmailLog->save($this->request->data)) {
				$this->Session->setFlash(__('The email log has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The email log could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->EmailLog->read(null, $id);
		}
		$contacts = $this->EmailLog->Contact->find('list');
		$services = $this->EmailLog->Service->find('list');
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
		$this->EmailLog->id = $id;
		if (!$this->EmailLog->exists()) {
			throw new NotFoundException(__('Invalid email log'));
		}
		if ($this->EmailLog->delete()) {
			$this->Session->setFlash(__('Email log deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Email log was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
