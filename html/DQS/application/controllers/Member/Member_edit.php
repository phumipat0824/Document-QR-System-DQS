<?php
ob_start();
defined('BASEPATH') OR exit('No direct script access allowed');

require dirname(__FILE__).'/../DQS_controller.php';

class Member_edit extends DQS_controller {

    /*
		* show_member_edit
		* show page edit member 
		* @input -
		* @output -
		* @author Natruja
		* @Create Date 2564-12-17
	*/
	public function show_member_edit($mem_id)
	{
		$this->load->model('M_DQS_province', 'MDP');
        $this->load->model('M_DQS_department', 'MDD');
		$this->load->model('M_DQS_member', 'mem');

        $data['obj_mem'] = $this->mem->get_by_mem_id($mem_id)->row();
		$data['arr_department'] = $this->MDD->get_all()->result();
        $data['arr_province'] = $this->MDP->get_all()->result();
      
		$this->output_sidebar_admin("Member/v_member_edit", $data);
	}

	/*
		* edit_member
		* edit and update data of member
		* @input mem_dep_id,mem_pro_id,mem_firstname,mem_lastname,mem_email,mem_id
		* @output data has update
		* @author Natruja
		* @Create Date 2564-12-17
	*/
	public function edit_member()
	{
		
		$this->load->model('M_DQS_member', 'mem');
		$this->mem->mem_dep_id = $this->input->post('mem_dep_id');
        $this->mem->mem_pro_id = $this->input->post('mem_pro_id');
        $this->mem->mem_firstname = $this->input->post('mem_firstname');
		$this->mem->mem_lastname = $this->input->post('mem_lastname');
        $this->mem->mem_email = $this->input->post('mem_email');
        $this->mem->mem_id = $this->input->post('mem_id');
		$this->mem->update_member();
	
		redirect('/Admin/Admin_home/show_member_list');
		
	}
    


}
?>