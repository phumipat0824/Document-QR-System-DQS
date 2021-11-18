<!-- ผู้จัดทำ: นางสาวรัชนีกร ป้อชุมภู 
     Date:   5/8/2021-->
<?php
defined('BASEPATH') or exit('No direct script access allowed');

include_once 'DQS_Model.php';

class Da_DQS_member extends DQS_model
{ //เพิ่ม ลบ แก้ไขข้อมูลสมาชิกจากดาต้าเบส

    public $mem_pref_id;
    public $mem_firstname;
    public $mem_lastname;
    public $mem_email;
    public $mem_username;
    public $mem_password;
    public $mem_role;
    public $mem_dep_id;
    public $mem_pro_id;


    public function __construct()
    {
        parent::__construct();
    }

    public function insert()
    { //เวลามีหลายDBต้องบอกชื่อDB.ตาราง ต้องใช้ " ห้ามใช้ '
        $sql = "INSERT INTO {$this->db_name}.DQS_Member(mem_pref_id, mem_firstname, mem_lastname,mem_email,mem_username, mem_password,mem_role,mem_dep_id, mem_pro_id) 
                VALUES (?,?,?,?,?,?,?,?,?)";
        $this->db->query($sql, array($this->mem_pref_id, $this->mem_firstname, $this->mem_lastname, $this->mem_email, $this->mem_username, $this->mem_password, $this->mem_role, $this->mem_dep_id, $this->mem_pro_id));
    }//เพิ่มข้อมูลสมาชิกในดาต้าเบส มีการกำหนดจำนวนcolumn = จำนวนvalues

    public function update_password()
    {
        $sql = "UPDATE {$this->db_name}.DQS_Member
                SET mem_password = ?
                WHERE mem_email = ? "; // ? = ค่าที่เราจะใส่ไปอยู่แล้ว , อย่าใช้ " ' " เพราะอาจจะเออเร่อได้
        $this->db->query($sql, array($this->mem_password, $this->mem_email)); //ถ้า SQL ที่เราใส่มี ? ต้องใส่ array ด้วย

    }
    public function delete_member(){
        $sql = "DELETE {$this->db_mane}.DQS_Member
                SET mem_id = ?
                WHERE mem_id = ? "; // ? = ค่าที่เราจะใส่ไปอยู่แล้ว , อย่าใช้ " ' " เพราะอาจจะเออเร่อได้
        $this-> db->query($sql, array($this->mem_dep_id, $this->mem_pref_id)); //ถ้า SQL ที่เราใส่มี ? ต้องใส่ array ด้วย
    }//ลบข้อมูลสมาชิก
}