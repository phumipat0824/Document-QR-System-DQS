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

    // public function check_exist_name($dep_name)
    // {
    //     $sql = "SELECT * 
    //         FROM {$this->db_name}.DQS_Department
    //         WHERE dep_name = $dep_name";
    //     $query = $this->db->query($sql);
    //     return $query;
    // }

    public function check_exist_name($dep_name)
    {
        // $sql = "SELECT * 
        // FROM {$this->db_name}.DQS_Department
        // WHERE dep_name = $dep_name";
        // $query = $this->db->query($sql);
        
        $this->db->where('dep_name', $dep_name);
        $query = $this->db->get('DQS_Department');
        if($query->num_rows() >= 1)
        {
            return true;
        }
        else{
            return false;
        }
    }
    public function get_department(){
        $sql = "SELECT *
        FROM {$this->db_name}.DQS_Member";
        $query = $this->db->query($sql);
        return $query;
    }
}