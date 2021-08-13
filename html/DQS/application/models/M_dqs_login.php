<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require 'Da_DQS_login.php';

class M_dqs_login extends Da_dqs_login {

	public function __construct()
	{
		parent::__construct();
	}

	public function check_login()
	{
		$sql = "SELECT mem_id,mem_firstname,mem_lastname,mem_usernmeme,mem_password
                FROM {$this->db_name}.DQS_Member 
        WHERE mem_usernmeme=? AND mem_password =? ";
        $query = $this->db->query($sql, array($this->mem_usernmeme, $this->mem_password));
        return $query;

		
	}

}

