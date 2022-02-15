<?php
defined('BASEPATH') or exit('No direct script access allowed');

include_once 'DQS_model.php';

class Da_DQS_station_state_of_province extends DQS_model
{ //เพิ่ม ลบ แก้ไขข้อมูลสมาชิกจากดาต้าเบส

    public $station_id;
    public $station_status;
    public $station_pro_id;
    public $station_dep_id; 
}
