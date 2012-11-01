<?php

App::uses('View', 'View');
App::uses('PaypalHelper', 'PaypalIpn.View/Helper');

/**
 * @property PaypalHelper $Helper
 */
class PaypalHelperTestCase extends CakeTestCase {

	public $fixtures = array();

	public function setUp() {
		parent::setUp();
		$null = null;
		$this->View = new View($null);
		$this->Helper = new PaypalHelper($this->View);
		Configure::delete('PaypalIpn');
	}

	public function tearDown() {
		unset($this->Helper);
		unset($this->View);
		parent::tearDown();
	}

	public function testGetSettings() {
		$settings = $this->Helper->getSettings();
		$expects = array(
			'business' => 'sandbox_email@paypal.com',
			'test' => true,
			'notify_url' => 'http://yoursite.com/paypal_ipn/process',
			'currency_code' => 'USD',
			'lc' => 'US',
			'item_name' => 'Paypal_IPN',
			'amount' => '15.00',
			'server' => 'https://www.sandbox.paypal.com',
		);
		$this->assertSame($expects, $settings);
	}

	public function testGetSettingsOverrideConfigure() {
		Configure::write('PaypalIpn.business', 'live_email@paypal.com');
		Configure::write('PaypalIpn.currency_code', 'JPY');
		Configure::write('PaypalIpn.lc', 'JP');
		$settings = $this->Helper->getSettings();
		$expects = array(
			'business' => 'live_email@paypal.com',
			'test' => true,
			'notify_url' => 'http://yoursite.com/paypal_ipn/process',
			'currency_code' => 'JPY',
			'lc' => 'JP',
			'item_name' => 'Paypal_IPN',
			'amount' => '15.00',
			'server' => 'https://www.sandbox.paypal.com',
		);
		$this->assertSame($expects, $settings);
	}

	public function testGetSettingsProduction() {
		Configure::write('PaypalIpn.test', false);
		$settings = $this->Helper->getSettings();
		$expects = array(
			'business' => 'sandbox_email@paypal.com',
			'test' => false,
			'notify_url' => 'http://yoursite.com/paypal_ipn/process',
			'currency_code' => 'USD',
			'lc' => 'US',
			'item_name' => 'Paypal_IPN',
			'amount' => '15.00',
			'server' => 'https://www.paypal.com',
		);
		$this->assertSame($expects, $settings);
	}

}
