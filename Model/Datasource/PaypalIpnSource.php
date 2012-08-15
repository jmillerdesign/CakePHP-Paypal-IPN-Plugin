<?php
App::uses('DataSource', 'Model/Datasource');
App::uses('HttpSocket', 'Network/Http');

class PaypalIpnSource extends DataSource {

  /**
    * Http is the HttpSocket Object.
    * @access public
    * @var object
    */
  var $Http = null;

  /**
    * constructer.  Load the HttpSocket into the Http var.
    */
  function __construct(){
    $this->Http =& new HttpSocket();
  }

  /**
  	* Strip slashes
  	* @param string value
  	* @return string
  	*/
  static function clearSlash($value){
  	return get_magic_quotes_runtime() ? stripslashes($value) : $value;
  }

  /**
    * verifies POST data given by the paypal instant payment notification
    * @param array $data Most likely directly $_POST given by the controller.
    * @return boolean true | false depending on if data received is actually valid from paypal and not from some script monkey
    */
  function isValid($data){
    if (preg_match('/paypal\.com$/', gethostbyaddr(env('REMOTE_ADDR')))) {
      if(isset($data['test_ipn'])) {
        $server = 'https://www.sandbox.paypal.com/cgi-bin/webscr?cmd=_notify-validate';
      } else {
        $server = 'https://www.paypal.com/cgi-bin/webscr?cmd=_notify-validate';
      }

      $response = $this->Http->post($server, $data);

      if($response == "VERIFIED"){
        return true;
      }

      if(!$response){
        $this->log('HTTP Error in PaypalIpnSource::isValid while posting back to PayPal', 'paypal');
      }
    } else {
      $this->log('IPN Notification comes from unknown IP: '.env('REMOTE_ADDR'), 'paypal');
    }

    return false;
  }
}

?>
