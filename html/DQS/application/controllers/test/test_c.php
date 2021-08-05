<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require dirname(__FILE__) . '/../DQS_controller.php'; // Controller in folder 
class test_c extends DQS_controller {

	public function index()
	{
		$this->load->view('test_2');
	}
	public function show1()
	{
		$this->load->view('test');
	}
	public function show2()
	{
		$this->output('test');
	}
}
