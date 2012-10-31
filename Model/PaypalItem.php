<?php

/**
 * @property InstantPaymentNotification $InstantPaymentNotification Model belongsTo
 */
class PaypalItem extends PaypalIpnAppModel {

	public $name = 'PaypalItem';

	public $belongsTo = array(
		'InstantPaymentNotification' => array(
			'className' => 'PaypalIpn.InstantPaymentNotification'
		)
	);

}
