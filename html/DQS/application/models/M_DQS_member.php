<?php
defined('BASEPATH') or exit('No direct script access allowed');

include_once 'Da_DQS_member.php';

class M_DQS_member extends Da_DQS_member
{


    public function __construct()
    {
        parent::__construct();
    }

    public function get_all()
    {
        $sql = "SELECT * from {$this->db_name}.DQS_Member left join {$this->db_name}.DQS_Department on mem_dep_id = dep_id";
        $query = $this->db->query($sql);
        return $query;
    }
    public function get_by_id($mem_emp_id)
    {
        $sql = "SELECT * FROM {$this->db_name}.DQS_Member LEFT JOIN {$this->db_name}.DQS_Department ON mem_dep_id = dep_id WHERE mem_emp_id = $mem_emp_id";
        $query = $this->db->query($sql);
        return $query;
    }

    public function get_by_email($mem_email)
    {
        $sql = "SELECT * FROM {$this->db_name}.DQS_Member LEFT JOIN {$this->db_name}.DQS_Department ON mem_dep_id = dep_id WHERE mem_email = $mem_email";
        $query = $this->db->query($sql);
        return $query;
    }

    public function get_by_name($mem_firstname,$mem_lastname)
    {
        $sql = "SELECT * FROM {$this->db_name}.DQS_Member LEFT JOIN {$this->db_name}.DQS_Department ON mem_dep_id = dep_id WHERE mem_firstname = '$mem_firstname' HAVING mem_lastname = '$mem_lastname' ";
        $query = $this->db->query($sql);
        return $query;
    }
}
