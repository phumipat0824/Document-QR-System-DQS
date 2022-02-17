<?php
/*
* Qrcode_generator
* show_qrcode
* @author Phumipat 
* @Create Date 2564-08-05
*/
defined('BASEPATH') OR exit('No direct script access allowed');

require dirname(__FILE__).'/../DQS_controller.php';

class Qrcode_generator extends DQS_controller {

	public function show_qrcode(){
		$this->output("Qrcode/v_qrcode");
	}
	
}
?>