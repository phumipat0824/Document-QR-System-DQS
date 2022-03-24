<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require dirname(__FILE__) . '/../DCS_controller.php';

class Member_prefix extends DCS_controller {

	public function index()
	{
		
	}

    public function show_member_prefix()
	{
		$this->load->model('M_DCS_prefix', 'mpre');
		$data['member'] = $this->mpre->get_all()->result();
		$this->load->view('member/v_member_prefix',$data);
	}
}