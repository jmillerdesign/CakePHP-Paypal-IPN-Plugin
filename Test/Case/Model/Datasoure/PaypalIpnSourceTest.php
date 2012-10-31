<?php

App::uses('PaypalIpnSource', 'PaypalIpn.Model/Datasource');
App::uses('HttpSocket', 'Network/Http');

/**
 * @property PaypalIpnSource $PaypalIpn
 */
class PaypalIpnSourceTestCase extends CakeTestCase {

	public function setUp() {
		parent::setUp();
		$PaypalIpn = $this->getMock('PaypalIpnSource', array('log'));
		$PaypalIpn->Http = $this->getMock('HttpSocket', array('post'));
		$this->PaypalIpn = $PaypalIpn;

		if (PHP_SAPI === 'cli') {
			// on cli mode
			$_SERVER['SERVER_ADDR'] = '127.0.0.1';
			$_SERVER['REMOTE_ADDR'] = '127.0.0.1';
		}
	}

	public function tearDown() {
		unset($this->PaypalIpn);
		parent::tearDown();
		ob_flush();
	}

	public function testIsValidShouldBeFalse() {
		$this->assertFalse($this->PaypalIpn->isValid(array()));
	}

/**
 * @dataProvider isValidDataProvider
 */
	public function testIsValid($label, $preset, $expects) {
		$this->PaypalIpn->Http->expects($this->once())
			->method('post')
			->with($expects['postUrl'], $expects['postData'])
			->will($this->returnValue($preset['postReturn']));

		$this->assertSame($expects['result'], $this->PaypalIpn->isValid($preset['data'], $preset['test']));
	}

	public function isValidDataProvider() {
		return array(
			array(
				'production url',
				array(
					'data' => array('test' => 'string'),
					'test' => false,
					'postReturn' => 'VERIFIED',
				),
				array(
					'postUrl' => 'https://www.paypal.com/cgi-bin/webscr?cmd=_notify-validate',
					'postData' => array('test' => 'string'),
					'result' => true,
				),
			),
			array(
				'sandbox url',
				array(
					'data' => array('test' => 'string'),
					'test' => true,
					'postReturn' => 'VERIFIED',
				),
				array(
					'postUrl' => 'https://www.sandbox.paypal.com/cgi-bin/webscr?cmd=_notify-validate',
					'postData' => array('test' => 'string'),
					'result' => true,
				),
			),
			array(
				'illigal response',
				array(
					'data' => array('test' => 'string'),
					'test' => false,
					'postReturn' => 'FAILURE',
				),
				array(
					'postUrl' => 'https://www.paypal.com/cgi-bin/webscr?cmd=_notify-validate',
					'postData' => array('test' => 'string'),
					'result' => false,
				),
			),
			array(
				'response error',
				array(
					'data' => array('test' => 'string'),
					'test' => false,
					'postReturn' => false,
				),
				array(
					'postUrl' => 'https://www.paypal.com/cgi-bin/webscr?cmd=_notify-validate',
					'postData' => array('test' => 'string'),
					'result' => false,
				),
			),
		);
	}

}