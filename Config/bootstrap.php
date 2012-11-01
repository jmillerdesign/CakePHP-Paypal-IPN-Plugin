<?php
/**
 * Use these settings to set defaults for the PaypalHelper class.
 *
 * put this code into your bootstrap.php,  you can override settings.
 */
if (is_null(Configure::read('PaypalIpn'))) {
	Configure::write('PaypalIpn', array(
		'business' => 'sandbox_email@paypal.com', // Your Paypal email account
		'sandbox' => true, // Main paypal server.
		'notify_url' => 'http://yoursite.com/paypal_ipn/process', // Notify_url... set this to the process path of your paypal_ipn::instant_payment_notification::process action
		'currency_code' => 'USD', // Currency
		'lc' => 'US', // Locality
		'item_name' => 'Paypal_IPN', // Default item name.
		'amount' => '15.00' // Default item amount.
	));
}
