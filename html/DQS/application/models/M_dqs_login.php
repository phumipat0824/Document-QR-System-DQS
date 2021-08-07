<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require 'Da_DQS_login.php';

class M_dqs_login extends Da_dqs_login {

	public function __construct()
	{
		parent::__construct();
	}

	public function check_login($mem_username,$mem_password)
	{
		$sql="SELECT*FROM DQS_Member 
			WHERE mem_username='$mem_username' 
			AND mem_password = '$mem_password'
            ";

		$query = $this->db->query($sql);
        return $query;
	}

}