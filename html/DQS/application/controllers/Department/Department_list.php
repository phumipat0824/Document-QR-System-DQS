<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require dirname(__FILE__).'/../DQS_controller.php';

class Department_list extends DQS_controller {

	public function index()
	{
		$this->output_sidebar_admin("department/v_department");
	}

}
?>