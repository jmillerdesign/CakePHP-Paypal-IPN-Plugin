<?php

/**
 * @property InstantPaymentNotification $InstantPaymentNotification Model
 */
class InstantPaymentNotificationsController extends PaypalIpnAppController {

	public $name = 'InstantPaymentNotifications';

	public $helpers = array('Html', 'Form');

/**
 * beforeFilter makes sure the process is allowed by auth
 *  since paypal will need direct access to it.
 */
	public function beforeFilter() {
		parent::beforeFilter();
		if ($this->Components->enabled('Auth')) {
			$this->Auth->allow('process');
		}
		if (isset($this->Security) && $this->action === 'process') {
			$this->Security->validatePost = false;
		}
	}

/**
 * Paypal IPN processing action..
 * This action is the intake for a paypal_ipn callback performed by paypal itself.
 * This action will take the paypal callback, verify it (so trickery) and save the transaction into your database for later review
 *
 * @access public
 * @author Nick Baker
 */
	public function process($id = null) {
		$result = null;
		try {
			$this->InstantPaymentNotification->getEventManager()->attach(array($this, '__processTransaction'), 'PaypalIpn.afterProcess');
			$result = $this->InstantPaymentNotification->process($id);
		} catch (PaypalIpnEmptyRawDataExpection $e) {
			$result = 'empty';
		}
		$this->_stop($result);
	}

/**
 * __processTransaction is a private callback function used to log a verified transaction
 * @access private
 * @param String $txnId is the string paypal ID and the id used in your database.
 */
	private function __processTransaction(CakeEvent $event) {
		$txnId = $event->subject()->id;
		$this->log(__d('paypal_ipn', 'Processing Trasaction: %s', $txnId), 'paypal');
		//Put the afterPaypalNotification($txnId) into your app_controller.php
		if (method_exists($this, 'afterPaypalNotification')) {
			$this->afterPaypalNotification($txnId);
		}
	}

/**
 * Admin Only Functions... all baked
 */

/**
 * Admin Index
 */
	public function admin_index() {
		$this->InstantPaymentNotification->recursive = 0;
		$this->set('instantPaymentNotifications', $this->paginate());
	}

/**
 * Admin View
 * @param String ID of the transaction to view
 */
	public function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__d('paypal_ipn', 'Invalid InstantPaymentNotification.'));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('instantPaymentNotification', $this->InstantPaymentNotification->read(null, $id));
	}

/**
 * Admin Add
 */
	public function admin_add() {
		$this->redirect(array('admin' => true, 'action' => 'edit'));
	}

/**
 * Admin Edit
 * @param String ID of the transaction to edit
 */
	public function admin_edit($id = null) {
		if (!empty($this->data)) {
			if ($this->InstantPaymentNotification->save($this->data)) {
				$this->Session->setFlash(__d('paypal_ipn', 'The InstantPaymentNotification has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('paypal_ipn', 'The InstantPaymentNotification could not be saved. Please, try again.'));
			}
		}
		if ($id && empty($this->data)) {
			$this->data = $this->InstantPaymentNotification->read(null, $id);
		}
	}

/**
 * Admin Delete
 * @param String ID of the transaction to delete
 */
	public function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__d('paypal_ipn', 'Invalid id for InstantPaymentNotification'));
			$this->redirect(array('action' => 'index'));
		}
		if ($this->InstantPaymentNotification->delete($id)) {
			$this->Session->setFlash(__d('paypal_ipn', 'InstantPaymentNotification deleted'));
			$this->redirect(array('action' => 'index'));
		}
	}

}
