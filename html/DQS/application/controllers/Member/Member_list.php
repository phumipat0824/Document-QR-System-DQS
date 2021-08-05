<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require dirname(__FILE__).'/../DQS_controller.php';

class Member_list extends DQS_controller {

	public function show_home()
	{
		$this->output("Member/v_member_home");
	}

}
?>