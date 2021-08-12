<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require dirname(__FILE__).'/../DQS_controller.php';

class Member_login extends DQS_controller {

		public function show_member_login()
	{
		$this->output_navbar("Member/v_member_login");
	}
	public function member_home()
	{
		redirect('/Member/Member_login/show_member_home');
	}

	public function show_member_home()
	{
		$this->output_sidebar_member("Member/v_member_home");
	}

	public function login(){

		$this->load->model('M_dqs_login','log');
        $this->log->mem_username= $this->input->post('mem_username');
        $this->log->mem_password= $this->input->post('mem_password');
        $msg = 0;
        $data["mem"] = $this->log->check_login()->result();
        if (empty($data["mem"])) {
            $msg = 0;
        } else {
            $msg = 1;
            $this->add_session($data["mem"][0]->mem_id, $data["mem"][0]->mem_firstname, $data["mem"][0]->mem_lastname);
			
        }
		echo json_encode($msg);
	}
}
?>