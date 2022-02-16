<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require dirname(__FILE__).'/../DQS_controller.php';

class Member_change_password extends DQS_controller {

    /*
		* show_change_password
		* show change password member on member management 
		* @input -
		* @output -
		* @author Natruja
		* @Create Date 2564-12-02
		* @Update Date 2565-02-04 change name function show_changepass to show_change_password
	*/
	public function show_change_password()
	{
		$this->output_sidebar_member("Member/v_member_change_password");
	}
    
	/*
		* change_password
		* change password from data input 
		* @input old passwoed,new password and confirm password
		* @output password has changed
		* @author Natruja
		* @Create Date 2564-12-02
	*/
	public function change_password()
	{
		
		$this->load->model('M_DQS_member', 'mem');
	
        $this->mem->mem_password = md5($this->input->post('new_password'));
        $this->mem->mem_id = $this->input->post('mem_id');
		$this->mem->update_new_password();
	
		$this->output_sidebar_member("Member/v_member_change_password");
		
		

	}

}
?>