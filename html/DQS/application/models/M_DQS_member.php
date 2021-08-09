<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require 'Da_DQS_member.php';

class M_DQS_member extends Da_DQS_member {


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
        $sql = "SELECT * from {$this->db_name}.DQS_Member left join {$this->db_name}.DQS_Department on mem_dep_id = dep_id WHERE mem_emp_id = $mem_emp_id";
        $query = $this->db->query($sql);
        return $query;
    }

}