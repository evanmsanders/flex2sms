<?php
App::uses('AppController', 'Controller');

class ServicesController extends AppController {

    public $actsAs = array('Containable');

    var $paginate = array(        
        'limit' => 30,        
        'order' => array('name' => 'asc')
    );

    public function beforeFilter() {
    
    }

	public function index() {
            $this->Service->recursive = 1;
            $this->set('services', $this->paginate());
	}

	public function view($id = null) {
	    $Message = ClassRegistry::init('Message');
	    $this->set('messages', $Message->find('all', array(
            'conditions' => array('Message.service_id' => $id),
            'contain' => array(
                'Message' => array(
                    'order' => 'Message.id DESC',
                    'limit' => 10,
                    'fields' => array(
                        'Message.id',
                        'DISTINCT Message.text',
                        'Message.processed',
                        'Message.processed_date',
                        'Message.error'
                    )
                )
))));
            $this->Service->id = $id;
            if (!$this->Service->exists()) {
                throw new NotFoundException(__('Invalid service'));
            }
            $this->set('service', $this->Service->find('first', array(
            'conditions' => array('Service.id' => $id),
            'contain' => array(
                'Keyword',
                'Capcode',
                'Contact' => array(
                    'fields' => array(
                        'Contact.id',
                        'Contact.name',
                        'Contact.brigade_id',
                    ),
                    'Brigade' => array(
                        'fields' => array(
                            'Brigade.id',
                            'Brigade.name'
                        )
                    )
                )
            )
        )));
	}

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
                $contacts = $this->Service->Contact->find('list', array('order' => 'name ASC'));
                $keywords = $this->Service->Keyword->find('list', array('order' => 'word ASC'));
		$this->set(compact('contacts', 'keywords'));
	}

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
            $contacts = $this->Service->Contact->find('list', array('order' => 'Contact.name ASC'));
            $keywords = $this->Service->Keyword->find('list', array('order' => 'Keyword.word ASC'));
            $this->set(compact('contacts', 'keywords'));
	}

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
        
    public function suggest($id = 1) {
        $this->autoRender = false;
          if ($this->request->is('ajax')) {
            $result = $this->Service->query('SELECT DISTINCT services.id FROM services, contacts_services, contacts WHERE
            contacts.brigade_id = '.$id.'
            AND contacts_services.contact_id = contacts.id
            AND services.id = contacts_services.service_id;');
            if(is_array($result)) {
                foreach($result as $row) {
                    $output[] = $row['services']['id'];
                }
              return json_encode($output);
             }
          }
          else {
              echo 'Not an Ajax request, allegedly';
          }
          return;
    }
    
    /**
     * Enable a service.
     * TODO: ajax
     *
     * @param int $id service id.
     */
    public function enable($id) {
        $this->Service->id = $id;
        if(!$this->Service->exists()) {
            throw new NotFoundException(__('Service not found.'));
        }
        $this->Service->read();
        $this->Service->set('active', 1);
        if($this->Service->save()) {
            $this->Session->setFlash(__('Service enabled.'), null, null, 'success');
        }
        else {
            $this->Session->setFlash(__('There was a problem enabling the service.'), null, null, 'error');
        }
        $this->redirect($this->referer());
    }

    /**
     * Disable a service.
     * TODO: ajax.
     *
     * @param int $id service id.
     */
    public function disable($id) {
        $this->Service->id = $id;
        if(!$this->Service->exists()) {
            throw new NotFoundException(__('Service not found.'));
        }
        $this->Service->read();
        $this->Service->set('active', 0);
        if($this->Service->save()) {
            $this->Session->setFlash(__('Service disabled.'), null, null, 'success');
        }
        else {
            $this->Session->setFlash(__('There was a problem disabling the service.'), null, null, 'error');
        }
        $this->redirect($this->referer());
    }
}
