<?php
defined('BASEPATH') or exit('No direct script access allowed');
require dirname(__FILE__) . '/DQS_controller.php';
class test extends DQS_controller
{

	public function index()
	{
	}

	public function show_1()
	{
		$this->load->view('v_test');
	}
}
