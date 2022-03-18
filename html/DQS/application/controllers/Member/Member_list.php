<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require dirname(__FILE__) . '/../DCS_controller.php';

class Member_list extends DCS_controller {

	public function index()
	{
		
	}

    public function show_member_list()
	{
		$this->load->model('M_DCS_member', 'mmem');
		$data['arr_member'] = $this->mmem->get_all()->result();

		// echo '<pre>';
		// print_r($this->mmem->get_all());
		// echo '<pre>';

		$this->load->view('member/v_member_list',$data);
	}

	public function delete_member($mem_id)
	{
		$this->load->model('M_DCS_member', 'mmem');
		$this->mmem->mem_id = $mem_id;
		$this->mmem->delete();

		redirect('Member/Member_list/show_member_list');
	}

	// public function edit_member()
	// {
	// 	
	// }
}