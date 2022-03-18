<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require dirname(__FILE__).'/../DCS_controller.php';


class Member_input extends DCS_controller
{

	public function index()
	{
       
	}

	public function insert_member(){
		// echo '<pre>';
		// print_r($this->input->post() );

		$this->load->model('Da_DCS_member', 'dcs');

		$this->dcs->mem_first_name = $this->input->post('mem_first_name');
		$this->dcs->mem_last_name = $this->input->post('mem_last_name');
		$this->dcs->mem_birthday = $this->input->post('mem_birthday');
		// $this->dcs->mem_student_status = $this->input->post('mem_student_status');
		$this->dcs->mem_pf_id = $this->input->post('mem_pf_id');

		if($this->input->post('mem_student_status') == 'T'){
				$this->dcs->mem_student_status = 'T';
		}else{
				$this->dcs->mem_student_status = 'F';
		}

		$this->dcs->insert();

		redirect('Member/Member_input/show_member_input');

	}

	public function show_member_input()
	{
		
		$this->load->view('member/v_member_input');
	}
}