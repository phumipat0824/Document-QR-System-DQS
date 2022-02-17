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

    public function get_all_by_pro_id($mem_pro_id)
    {
        $sql = "SELECT * from {$this->db_name}.DQS_Station_State_of_Province
                INNER JOIN DQS_Department
                WHERE station_pro_id = $mem_pro_id AND station_dep_id = DQS_Department.dep_id";
        $query = $this->db->query($sql);
        return $query;
    }

    public function get_by_id($dep_id)
    {
        // $sql = "SELECT * from {$this->db_name}.DQS_Department WHERE dep_id = $dep_id";
        $sql = "SELECT * from {$this->db_name}.DQS_Department 
        WHERE dep_id = $dep_id";
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
    public function get_last_id()
    {
        $sql = "SELECT dep_id 
        FROM {$this->db_name}.DQS_Department
        ORDER BY dep_id DESC LIMIT 1";
        $query = $this->db->query($sql);
        return $query;
    }

    public function check_exist_name($dep_name)
    {
        // $sql = "SELECT * 
        // FROM {$this->db_name}.DQS_Department
        // WHERE dep_name = $dep_name";
        // $query = $this->db->query($sql);
        
        $this->db->where('dep_name', $dep_name);
        $query = $this->db->get('DQS_Department');
        return $query->num_rows();
    }
    public function get_department(){
        $sql = "SELECT *
        FROM {$this->db_name}.DQS_Member";
        $query = $this->db->query($sql);
        return $query;
    }

    public function get_member_data($pro_id,$mem_id){
        $sql= "SELECT * FROM {$this->db_name}.DQS_Member AS member 
        LEFT JOIN {$this->db_name}.DQS_Department AS department 
        ON member.mem_dep_id = department.dep_id 
        LEFT JOIN {$this->db_name}.DQS_Province AS province
        ON member.mem_pro_id = pro_id
        WHERE member.mem_pro_id = $pro_id AND member.mem_id != $mem_id";
        $query = $this->db->query($sql);
        return $query;
    }
    public function get_member(){
        $sql = "SELECT *
        FROM {$this->db_name}.DQS_Member";
        $query = $this->db->query($sql);
        return $query;
    }
}