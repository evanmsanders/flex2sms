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
