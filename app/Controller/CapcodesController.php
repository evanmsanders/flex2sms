<?php
App::uses('AppController', 'Controller');

class CapcodesController extends AppController {

    var $paginate = array(        
        'limit' => 50,        
        'order' => array('alias' => 'asc')
    );

    public function beforeFilter() {
    
    }

	public function index() {
		$this->Capcode->recursive = 0;
		$this->set('capcodes', $this->paginate());
	}

	public function view($id = null) {
		$this->Capcode->id = $id;
		if (!$this->Capcode->exists()) {
			throw new NotFoundException(__('Invalid capcode'));
		}
		$this->set('capcode', $this->Capcode->read(null, $id));
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
              if ($this->request->is('ajax')) {
                  $results = $this->Capcode->find('all', array(
                      'conditions'=>array('or' => array(
                          'alias LIKE' => '%'.$this->request->data['search_key'].'%',
                          'code LIKE' => '%'.$this->request->data['search_key'].'%')),
                      'fields' => array('id','alias','code'),
                      'order' => 'alias ASC',
                      'recursive'=>-1,
                  ));
                  foreach($results as $result):
                      $data[] = array("id"=>$result['Capcode']['id'],"alias"=>$result['Capcode']['alias'].'('.$result['Capcode']['code'].')');
                  endforeach;
                  if(!is_array($data)) {
                      $data = array('id'=>'0','alias'=>'None');
                  }
                  return json_encode($data);
              }
              else {
                  echo 'Not an Ajax request, allegedly';
              }
              return;
          }
}