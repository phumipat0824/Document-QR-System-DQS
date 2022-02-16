<!-- ผู้จัดทำ: นางสาวรัชนีกร ป้อชุมภู 
     Date:   5/8/2021-->
<?php
defined('BASEPATH') or exit('No direct script access allowed');

include_once 'Da_DQS_member.php';

class M_DQS_member extends Da_DQS_member
{

 
    public function __construct()
    {
        parent::__construct();
    }

    public function get_all()
    {
        $sql = "SELECT * from {$this->db_name}.DQS_Member left join {$this->db_name}.DQS_Department on mem_dep_id = dep_id";
        $query = $this->db->query($sql);
        return $query;
    }
    public function get_by_id($mem_dep_id)
    {
        $sql = "SELECT * FROM {$this->db_name}.DQS_Member LEFT JOIN {$this->db_name}.DQS_Department ON mem_dep_id = dep_id WHERE mem_dep_id = $mem_dep_id";
        $query = $this->db->query($sql);
        return $query;
    }

    public function get_by_email($mem_email)
    {
        $sql = "SELECT * FROM {$this->db_name}.DQS_Member WHERE mem_email = '$mem_email'";
        $query = $this->db->query($sql);
        return $query;
    }

    public function get_by_name($mem_email,$mem_firstname,$mem_lastname)
    {
        $sql = "SELECT * FROM {$this->db_name}.DQS_Member WHERE mem_email = '$mem_email' HAVING mem_firstname = '$mem_firstname' AND mem_lastname = '$mem_lastname'";
        $query = $this->db->query($sql);
        return $query;
    }
    
    public function get_member()
    {
       $sql = "SELECT * FROM {$this->db_name}.DQS_Member AS member
        LEFT JOIN {$this->db_name}.DQS_Department AS department
        ON member.mem_dep_id = department.dep_id";
        $query = $this->db->query($sql);
        return $query;
    }

    public function get_member_all()
    {
        $sql = "SELECT * FROM {$this->db_name}.DQS_Member AS member
        LEFT JOIN {$this->db_name}.DQS_Department AS department
        ON member.mem_dep_id = department.dep_id
        LEFT JOIN {$this->db_name}.DQS_Province AS province
        ON member.mem_pro_id = province.pro_id";
        $query = $this->db->query($sql);
        return $query;
    }
    public function get_by_username()
    {
        $sql = "SELECT * FROM {$this->db_name}.DQS_Member WHERE mem_username ='?'";
        $query = $this->db->query($sql);
        return $query;

        // $sql="SELECT * FROM {$this->db_name}.DQS_Member AS member 
        // WHERE mem_username ='".$mem_username."'";  //บรรทัดนี้เป็นการ  เลือก ว่าจะต้องการติดต่อกับ product อะไร และโดยใช้ product_name เป็นตัวแปรเงื่อนไขในการเลือกข้อมูลที่ product_name ทึ่ต้องการทราบ
        // $query = mysql_query($sql); //การ เก็บค่า โดยใช้ mysql_query ครับ  เพื่อทำการ query คำสั่งที่ เก็บ อยู่ใน $sql
        // if(mysql_num_rows($query) != 0){ // ใช้ if ตั้งเงื่อนไขตรวจสอบมีชื่อสินค้าซ้ำหรือไม่ โดยนับจำนวนแถวของข้อมูลชื่อสินค้า mysql_num_rows(ตัวแปรที่แทนค่าการจัดการฐานข้อมูล) นับจำนวนแถวของ Result ที่ได้จากการ Query
        // //!= 0 คือ จำนวนแถวของ Result ที่ได้ และไม่มีค่าเท่ากับ 0 หรือว่างเปล่าครับ
        // echo "<script>alert ('ข้อมูลซ้ำค่ะอีควัย');history.back();</script>"; // ใส่ alert เลยครับ //ชื่อสินค้าซ้ำ กรุณาตรวจสอบใหม่
        // exit(); //จบกระบวนการทำงาน
        // }else{ //ถ้าไม่มีชื่อสินค้าซ้ำ ก็ออกไปทำกระบวนการ insert
        //     this->load->(member/v_member_register);
    }
    public function get_by_pro_id()
    {
        $sql = "SELECT * FROM {$this->db_name}.DQS_Member WHERE mem_pro_id ='?'";
        $query = $this->db->query($sql);
        return $query;

    }
    public function get_by_dep_id()
    {
        $sql = "SELECT * FROM {$this->db_name}.DQS_Member WHERE mem_dep_id ='?'";
        $query = $this->db->query($sql);
        return $query;

    }
    public function get_by_dep_id_and_pro_id($mem_dep_id, $mem_pro_id)
    {
        $sql = "SELECT * 
            FROM {$this->db_name}.DQS_Member.DQS_Member AS member
            WHERE mem_dep_id = $mem_dep_id AND mem_pro_id = $mem_pro_id
            LEFT JOIN {$this->db_name}.DQS_Department AS department
            ON member.mem_dep_id = department.dep_id
            LEFT JOIN {$this->db_name}.DQS_Province AS province
            ON member.mem_pro_id = province.pro_id
            WHERE mem_dep_id = $mem_dep_id AND mem_pro_id = $mem_pro_id";
            $query = $this->db->query($sql);
            return $query;
    }//รับค่าผ่านตัวแปร mem_dep_id และ mem_pro_id.


    public function get_member_data(){
        $sql= "SELECT * FROM {$this->db_name}.DQS_Member AS member 
        LEFT JOIN {$this->db_name}.DQS_Department AS department 
        ON member.mem_dep_id = department.dep_id 
        LEFT JOIN {$this->db_name}.DQS_Province AS province
        ON member.mem_pro_id = pro_id";
        $query = $this->db->query($sql);
        return $query;
    }
    public function get_by_mem_id($mem_id)
    {
        $sql = "SELECT * FROM {$this->db_name}.DQS_Member AS member
        LEFT JOIN {$this->db_name}.DQS_Department AS department
        ON member.mem_dep_id = department.dep_id
        LEFT JOIN {$this->db_name}.DQS_Province AS province
        ON member.mem_pro_id = province.pro_id
        WHERE mem_id = $mem_id";
        $query = $this->db->query($sql);
        return $query;
    }

    public function get_member_station($pro_id)
    {
        $sql = "SELECT * FROM {$this->db_name}.DQS_Member AS member
        LEFT JOIN {$this->db_name}.DQS_Department AS department
        ON member.mem_dep_id = department.dep_id
        LEFT JOIN {$this->db_name}.DQS_Province AS province
        ON member.mem_pro_id = province.pro_id
        WHERE member.mem_pro_id = $pro_id";
        $query = $this->db->query($sql);
        return $query;
    }
    public function check_name($mem_firstname,$mem_lastname)
    {
        // $sql = "SELECT * 
        // FROM {$this->db_name}.DQS_Department
        // WHERE dep_name = $dep_name";
        // $query = $this->db->query($sql);
        $array = array('mem_firstname' => $mem_firstname, 'mem_lastname' => $mem_lastname);
        $this->db->where($array);
        $query = $this->db->get('DQS_Member');
        return $query->num_rows($array);
    }

}