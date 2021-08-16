<?php //ส่วนใหญ่มี insert/update/delete 
?>
<?php
defined('BASEPATH') or exit('No direct script access allowed');

include_once 'DQS_Model.php';

class Da_DQS_member extends DQS_model
{

    public $mem_emp_id;
    public $mem_firstname;
    public $mem_lastname;
    public $mem_email;
    public $mem_username;
    public $mem_password;
    public $mem_role;
    public $mem_dep_id;
    public $mem_province_id;


    public function __construct()
    {
        parent::__construct();
    }

    public function insert()
    { //เวลามีหลายDBต้องบอกชื่อDB.ตาราง ต้องใช้ " ห้ามใช้ '
        $sql = "INSERT INTO {$this->db_name}.DQS_Member(mem_emp_id, mem_email, mem_firstname, mem_lastname,mem_username, mem_password,mem_role,mem_dep_id, mem_province_id) 
                VALUES (?,?,?,?,?,?,?,?,?)";
        $this->db->query($sql, array($this->mem_emp_id, $this->mem_email, $this->mem_firstname, $this->mem_lastname, $this->mem_username, $this->mem_password, $this->mem_role, $this->mem_dep_id, $this->mem_province_id));
    }
}
