<?php
App::uses('AppController', 'Controller');
/**
 * Logs Controller
 *
 * @property Log $Log
 */
class ScannersController extends AppController { 
    var $paginate = array(
    'limit' => 40,
    'order' => array(            
        'id' => 'desc'
        ));

/**
 * index method
 *
 * @return void
 */
    public function index() {
        $this->Scanner->recursive = 0;
        $this->set('scanners', $this->paginate());
    }
}
