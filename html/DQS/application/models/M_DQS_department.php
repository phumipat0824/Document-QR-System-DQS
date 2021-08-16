<?php
defined('BASEPATH') or exit('No direct script access allowed');

include_once 'Da_DQS_department.php';

class M_DQS_department extends Da_DQS_department
{


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
    public function get_by_id($dep_id)
    {
        $sql = "SELECT * from {$this->db_name}.DQS_Department WHERE dep_id = $dep_id";
        $query = $this->db->query($sql);
        return $query;
    }
}
