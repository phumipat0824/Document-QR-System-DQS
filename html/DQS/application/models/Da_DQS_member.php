<?php //ส่วนใหญ่มี insert/update/delete ?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require 'DQS_Model.php';

class Da_DQS_member extends DQS_model {

    public $mem_emp_id;
    public $mem_firstname;
    public $mem_lastname;
    public $mem_email;
    public $mem_username;
    public $mem_password;
    public $mem_role;
    public $mem_dep_id;
    public $dep_province;


 public function __construct()
 {
        parent::__construct();
    }

    public function insert()
 {//เวลามีหลายDBต้องบอกชื่อDB.ตาราง ต้องใช้ " ห้ามใช้ '
        $sql = "INSERT INTO {$this->db_name}.DQS_Member(mem_emp_id, mem_email, mem_firstname, mem_lastname, mem_password, dep_province) 
                VALUES (?,?,?,?,?)";
        $this->db->query($sql,array($this->mem_emp_id,$this->mem_email,$this->mem_firstname,$this->mem_lastname,$this->mem_password,$this->dep_province));        
    }
}