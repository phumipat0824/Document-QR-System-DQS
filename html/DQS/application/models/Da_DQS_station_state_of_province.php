<?php
defined('BASEPATH') or exit('No direct script access allowed');

include_once 'DQS_model.php';

class Da_DQS_station_state_of_province extends DQS_model
{ //เพิ่ม ลบ แก้ไขข้อมูลสมาชิกจากดาต้าเบส

    public $station_id;
    public $station_status;
    public $station_pro_id;
    public $station_dep_id; 

    public function update_status($mem_pro_id,$mem_dep_id)
    {
        $sql = "UPDATE {$this->db_name}.DQS_Station_State_of_Province
        SET station_status = 0
        WHERE station_pro_id = $mem_pro_id && station_dep_id = $mem_dep_id";
        $this->db->query($sql, array($this-> station_status));
    }

    public function insert($mem_pro_id,$dep_id)
	{
		$sql = "INSERT INTO DQS_Station_State_of_Province(station_pro_id,station_status,station_dep_id ) 
                VALUES ($mem_pro_id,1,$dep_id)
                ";
        $this->db->query($sql, array($this->station_pro_id,$this->station_status,$this->station_dep_id));
	}//insert
    
}

