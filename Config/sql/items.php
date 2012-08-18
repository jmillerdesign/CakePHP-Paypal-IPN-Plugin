<?php
/**
  * Migration file.  If you do not have paypal_ipn installed on your system. please use the ipn schema file.
  */
class itemsSchema extends CakeSchema {
  var $name = 'items';

  function before($event = array()) {
		return true;
	}

	function after($event = array()) {
	}

	public $paypal_items = array(
		'id' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 36, 'key' => 'primary', 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'instant_payment_notification_id' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 36, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'item_name' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 127, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'item_number' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 127, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'quantity' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 127, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'mc_gross' => array('type' => 'float', 'null' => true, 'default' => NULL, 'length' => '10,2'),
		'mc_shipping' => array('type' => 'float', 'null' => true, 'default' => NULL, 'length' => '10,2'),
		'mc_handling' => array('type' => 'float', 'null' => true, 'default' => NULL, 'length' => '10,2'),
		'tax' => array('type' => 'float', 'null' => true, 'default' => NULL, 'length' => '10,2'),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_unicode_ci', 'engine' => 'MyISAM')
	);
}
?>