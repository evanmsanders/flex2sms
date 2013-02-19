<?php
App::uses('AppController', 'Controller');

class CapcodesController extends AppController {

    var $paginate = array(        
        'limit' => 100,        
        'order' => array('alias' => 'asc')
    );

    public function beforeFilter() {
    
    }

	public function index() {
		$this->Capcode->recursive = 0;
		$this->set('capcodes', $this->paginate());
	}

    public function view($id = null) {
        $this->uses = array('Capcode', 'Service', 'Scanner', 'Message');
		$this->Capcode->id = $id;
		if (!$this->Capcode->exists()) {
			throw new NotFoundException(__('Invalid capcode'));
        }
        $capcode = $this->Capcode->find('first', array(
            'conditions' => array('Capcode.id' => $this->Capcode->id),
            'contain' => array(
                'Service' => array('Contact')
            )
        ));
        $this->set('capcode', $capcode); // Also loads Services.
        // Load messages seperately.
        $this->set('messages', $this->Message->query("SELECT outbox.* from outbox, services, capcodes where outbox.service_id = services.id AND services.capcode_id = capcodes.id AND capcodes.code = '".$capcode['Capcode']['code']."' ORDER BY outbox.id DESC LIMIT 10;"));
        // Manually load scanner messages.
        $this->set('scanners', $this->Scanner->find('all', array(
            'conditions' => array('Scanner.capcode' => $capcode['Capcode']['code']),
            'limit' => 10,
            'order' => 'Scanner.timestamp DESC'
        )));
	}

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
        
        public function ajax_findAlias(){
            $this->autoRender = false;
            $or_conditions[] = array('code LIKE' => '%'.$this->request->data['search_key'].'%');
            $keywords_array = explode(' ',$this->request->data['search_key']);
            foreach ($keywords_array as $value) {
                if($value != ''){
                    $or_conditions[] = array('alias LIKE' => '%'.$value.'%');
                }
            }
              if ($this->request->is('ajax')) {
                  $results = $this->Capcode->find('all', array(
                      'conditions'=>array('or' => $or_conditions
                          ),
                      'fields' => array('id','alias','code'),
                      'order' => 'alias ASC',
                      'recursive'=>-1,
                  ));
                  foreach($results as $result):
                      $data[] = array("id"=>$result['Capcode']['id'],"alias"=>$result['Capcode']['alias'].' ('.$result['Capcode']['code'].')');
                  endforeach;
                  if(!isset($data)) {
                      $data[] = array(
                          "id"=>'x',
                          "alias"=>$this->request->data['search_key'].' not found in database. Click here to add it');
                  }
                  return json_encode($data);
              }
              else {
                  echo 'Not an Ajax request, allegedly';
              }
              return;
          }
}
