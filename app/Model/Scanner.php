<?php
App::uses('AppModel', 'Model');
/**
 * Log Model
 *
 */
class Scanner extends AppModel {
    
    public $name = 'Scanner';

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'log';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'message';

}
