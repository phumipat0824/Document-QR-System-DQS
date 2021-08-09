<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require dirname(__FILE__).'/../DQS_controller.php';

class Member_login extends DQS_controller {

	public function show_member_login()
	{
		$this->output_naevar("Member/v_member_login");
	}

	public function member_home()
	{
		redirect('/Member/Member_login/show_member_home');
	}

	public function show_member_home()
	{
		$this->output_naevar("Member/v_member_home");
	}

	public function login()
	{
		$mem_username = $this->input->POST('mem_username');
		$mem_password = $this->input->POST('mem_password');

		$this->load->model('M_dqs_login','log');

		$userlogin = $this->log->check_login($mem_username,$mem_password)->result();
		if(count($userlogin)==1){
			$_SESSION['mem_username'] = $this->input->post('mem_password');
			echo true;
		}else{
			echo false;
		}
	}
	
}
?>