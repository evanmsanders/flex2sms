<?php
App::uses('AppController', 'Controller');

class UsersController extends AppController {

    public function beforeFilter() {
        /*
         * When no user logged in, and no users in the db, we want to be able
         * to create a user. 
         *
         * TODO: this feature should move into a dedicated setup routine.
         */
        if(!$this->Auth->loggedIn()) {
            if($this->User->find('count') == 0) {
                $this->Auth->allow('add');
            }
        }
    }

	public function index() {
		$this->User->recursive = 0;
		$this->set('users', $this->paginate());
	}

	public function view($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->set('user', $this->User->read(null, $id));
	}

	public function add() {
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved'), null, null, 'success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'), null, null, 'error');
			}
		}
	}

    public function edit($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved.'), null, null, 'success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'), null, null, 'error');
			}
		} else {
			$this->request->data = $this->User->read(null, $id);
		}
	}

	public function delete($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->User->delete()) {
			$this->Session->setFlash(__('User deleted.'), null, null, 'success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('There was a problem deleting the user. Please note that you cannot delete the last user.'), null, null, 'error');
		$this->redirect(array('action' => 'index'));
    }

    public function login() {
        if($this->request->is('post')) {
            if($this->Auth->login()) {
                $this->redirect($this->Auth->redirect());
            }
            else {
                $this->Auth->flash('Those login details were incorrect.');
            }
        }
    }

    public function logout() {
        $this->redirect($this->Auth->logout());
    }
}
