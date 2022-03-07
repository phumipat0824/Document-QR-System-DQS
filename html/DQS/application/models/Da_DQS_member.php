<!-- ผู้จัดทำ: นางสาวรัชนีกร ป้อชุมภู 
     Date:   5/8/2021-->
<?php
defined('BASEPATH') or exit('No direct script access allowed');

include_once 'DQS_model.php';

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
    public $mem_id;


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

    public function delete_member(){
        $sql = "DELETE FROM {$this->db_name}.DQS_Member
                WHERE mem_id = ? "; // ? = ค่าที่เราจะใส่ไปอยู่แล้ว , อย่าใช้ " ' " เพราะอาจจะเออเร่อได้
        $this-> db->query($sql, array($this->mem_id)); //ถ้า SQL ที่เราใส่มี ? ต้องใส่ array ด้วย
    }//ลบข้อมูลสมาชิก

    /*
		* update_member
		* update member on DQS_Member 
		* @input -
		* @output -
		* @author Natruja
		* @Create Date 2564-12-17
	*/
    public function update_member()
    {
        $sql = "UPDATE {$this->db_name}.DQS_Member
        SET mem_dep_id = ?, mem_pro_id = ?, mem_firstname = ?, mem_lastname = ?, mem_email =?
        WHERE mem_id = ?";
        $this->db->query($sql, array($this->mem_dep_id, $this->mem_pro_id, $this->mem_firstname,$this->mem_lastname,$this->mem_email,$this->mem_id));
    }

    /*
		* update_new_password
		* change password on DQS_Member 
		* @input -
		* @output -
		* @author Natruja
		* @Create Date 2564-12-02
	*/
    public function update_new_password()
    {
        $sql = "UPDATE {$this->db_name}.DQS_Member
                SET mem_password = ?
                WHERE mem_id = ? "; 
        $this->db->query($sql, array($this->mem_password, $this->mem_id)); 
    }

}