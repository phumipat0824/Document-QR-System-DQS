<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require dirname(__FILE__).'/../DQS_controller.php';

class QRcode_generator extends DQS_controller {

	public function show_qrcode()
	{

		$this->output_naevar("v_qrcode");
	}

}
?>