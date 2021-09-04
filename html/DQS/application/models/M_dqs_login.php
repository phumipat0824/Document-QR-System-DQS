<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include_once 'Da_DQS_login.php';

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

	public function get_by_username_password($mem_username, $mem_password)
    {
        $sql = "SELECT * 
            FROM {$this->db_name}.DQS_Member
            WHERE mem_username = '$mem_username'AND mem_password = '$mem_password' OR mem_email = '$mem_username' AND mem_password = '$mem_password'";
        $query = $this->db->query($sql);
        return $query;
    }

}