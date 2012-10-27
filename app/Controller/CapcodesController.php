<?php
App::uses('AppController', 'Controller');
/**
 * Capcodes Controller
 *
 * @property Capcode $Capcode
 */
class CapcodesController extends AppController {

    var $paginate = array(        
        'limit' => 50,        
        'order' => array('alias' => 'asc')
        );

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Capcode->recursive = 0;
		$this->set('capcodes', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Capcode->id = $id;
		if (!$this->Capcode->exists()) {
			throw new NotFoundException(__('Invalid capcode'));
		}
		$this->set('capcode', $this->Capcode->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Capcode->create();
			if ($this->Capcode->save($this->request->data)) {
				$this->Session->setFlash(__('The capcode has been saved'), null, null, 'success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The capcode could not be saved. Please, try again.'), null, null, 'error');
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Capcode->id = $id;
		if (!$this->Capcode->exists()) {
			throw new NotFoundException(__('Invalid capcode'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Capcode->save($this->request->data)) {
				$this->Session->setFlash(__('The capcode has been saved'), null, null, 'success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The capcode could not be saved. Please, try again.'), null, null, 'error');
			}
		} else {
			$this->request->data = $this->Capcode->read(null, $id);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Capcode->id = $id;
		if (!$this->Capcode->exists()) {
			throw new NotFoundException(__('Invalid capcode'));
		}
		if ($this->Capcode->delete()) {
			$this->Session->setFlash(__('Capcode deleted'), null, null, 'success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Capcode was not deleted'), null, null, 'error');
		$this->redirect(array('action' => 'index'));
	}
}
