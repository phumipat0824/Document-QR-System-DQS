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
    
    
	/*
		* change password
		* change password member on member management 
		* @input old passwoed and new password
		* @output password has changed
		* @author Natruja
		* @Create Date 2564-11-14
		*/


}
?>