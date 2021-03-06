<?php
App::uses('AppController', 'Controller');

class MessagesController extends AppController {    
    var $paginate = array(
    'limit' => 25,        
    'order' => array(            
        'insertdate' => 'desc'
        ));

    public function beforeFilter() {
    
    }
	public function index() {
		$this->Message->recursive = 0;
		$this->set('messages', $this->paginate());
	}

	public function view($id = null) {
		$this->Message->id = $id;
		if (!$this->Message->exists()) {
			throw new NotFoundException(__('Invalid message'));
		}
		$this->set('message', $this->Message->read(null, $id));
	}

	public function add() {
		if ($this->request->is('post')) {
			$this->Message->create();
			if ($this->Message->save($this->request->data)) {
				$this->Session->setFlash(__('The message has been saved'), null, null, 'success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The message could not be saved. Please, try again.'), null, null, 'error');
			}
		}
		$contacts = $this->Message->Contact->find('list', array('fields' => array('number', 'name')));
		$this->set(compact('contacts'));
	}

	public function edit($id = null) {
		$this->Message->id = $id;
		if (!$this->Message->exists()) {
			throw new NotFoundException(__('Invalid message'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Message->save($this->request->data)) {
				$this->Session->setFlash(__('The message has been saved'), null, null, 'success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The message could not be saved. Please, try again.'), null, null, 'error');
			}
		} else {
			$this->request->data = $this->Message->read(null, $id);
		}
	}
        

    /**
     * Marks a message to be resent.
     * TODO: Could be ajax in future.
     *
     * @param int $id Message id.
     */
    public function resend($id) {
        $this->Message->id = $id;
        if(!$this->Message->exists()) {
            throw new NotFoundException(__('That message does not exist.'));
        }
        $this->Message->read();
        $this->Message->set('processed', 0);
        if($this->Message->save()) {
            $this->Session->setFlash(__('Message will be resent.'), null, null, 'success');
        }
        else {
            $this->Session->setFlash(__('There was a problem resending the message.'), null, null, 'error');
        }
        $this->redirect($this->referer());
    }  

    /**
     * Marks a message as sent, so it does not send.
     * TODO: Could be ajax in future.
     *
     * @param int $id Message id.
     */
    public function cancel($id) {
        $this->Message->id = $id;
        if(!$this->Message->exists()) {
            throw new NotFoundException(__('That message does not exist.'));
        }
        $this->Message->read();
        $this->Message->set('processed', 1);
        if($this->Message->save()) {
            $this->Session->setFlash(__('Message sending has been cancelled.'), null, null, 'success');
        }
        else {
            $this->Session->setFlash(__('There was a problem cancelling the message.'), null, null, 'error');
        }
        $this->redirect($this->referer());
    }  

}
