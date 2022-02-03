<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require dirname(__FILE__).'/../DQS_controller.php';

class Member_changepass extends DQS_controller {

    /*
		* show page change password
		* show change password member on member management 
		* @input old passwoed and new password
		* @output password has changed
		* @author Natruja
		* @Create Date 
		*/
	public function show_changepass()
	{
		$this->output_sidebar_member("Member/v_member_changepass");
	}
    
	public function change_password()
	{
		
		$this->load->model('Da_DQS_member', 'mem');
	
        $this->mem->mem_password = md5($this->input->post('new_password'));
        $this->mem->mem_id = $this->input->post('mem_id');
		$this->mem->change_password();
	
		$this->output_sidebar_member("Member/v_member_changepass");
		
		

	}

}
?>