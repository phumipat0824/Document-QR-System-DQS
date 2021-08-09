<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require 'Da_DQS_department.php';

class M_DQS_department extends Da_DQS_department {


 public function __construct()
 {
        parent::__construct();
    }

    public function get_all()
 {
        $sql = "SELECT * from {$this->db_name}.DQS_Department";
        $query = $this->db->query($sql);
        return $query;
    }
}