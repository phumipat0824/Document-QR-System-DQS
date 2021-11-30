<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require dirname(__FILE__).'/../DQS_controller.php';

class Member_edit extends DQS_controller {

    /*
		* show page edit member
		* show edit member 
		* @input edit data of member
		* @output data has changed
		* @author Natruja
		* @Create Date 
		*/
	public function show_member_edit($mem_id)
	{
	
		$this->output_sidebar_admin("Member/v_member_edit");
	}
    


}
?>