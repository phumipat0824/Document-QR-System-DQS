<?php
defined('BASEPATH') or exit('No direct script access allowed');

include_once 'Da_DQS_station_state_of_province.php';

class M_DQS_station_state_of_province extends Da_DQS_station_state_of_province
{ //เพิ่ม ลบ แก้ไขข้อมูลสมาชิกจากดาต้าเบส
     public function get_all()
    {
        $sql = "SELECT * from {$this->db_name}.DQS_Station_State_of_Province";
        $query = $this->db->query($sql);
        return $query;
    }
    public function get_station_by_id($station_dep_id)
    {
        $sql = "SELECT * FROM {$this->db_name}.DQS_Station_State_of_Province 
        LEFT JOIN {$this->db_name}.DQS_Department 
        ON station_dep_id = dep_id 
        WHERE station_pro_id = $station_dep_id AND station_status = 1";
        $query = $this->db->query($sql);
        return $query;
    }
}
