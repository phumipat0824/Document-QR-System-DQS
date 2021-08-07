<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require dirname(__FILE__).'/../DQS_controller.php';

class Member_login extends DQS_controller {

	public function show_member_login()
	{
		$this->output_naevar("Member/v_member_login");
	}

	public function show_member_home()
	{
		$this->output("Member/v_member_home");
	}


}
?>