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
		$contacts = $this->Contacts->find('list', array('fields' => array('Contacts.number', 'Contacts.name')));
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
     * Generate test messages
     * 
     * Generate a high message load in the message table to test message responses.
     * 
     * @param array $recip Array of recipients
     * @param string $text Text to send with a different message on each new line
     * @param int $vol Volume of messages to send to each number
     */
    public function generate($recip, $text, $vol) {
        if(is_array($recip)&& $text != '' && $vol>0) {
            
        }
        else {
            return false;
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
        $this->redirect(array('action' => 'index'));
    }  

}
