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
    public function get_by_id($mem_emp_id)
    {
        $sql = "SELECT * FROM {$this->db_name}.DQS_Member LEFT JOIN {$this->db_name}.DQS_Department ON mem_dep_id = dep_id WHERE mem_emp_id = $mem_emp_id";
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
    
    public function get_member(){
       $sql = "SELECT * FROM {$this->db_name}.DQS_Member AS member
        LEFT JOIN {$this->db_name}.DQS_Department AS department
        ON member.mem_dep_id = department.dep_id";
        $query = $this->db->query($sql);
        return $query;
    }

    public function get_member_all(){
        $sql = "SELECT * FROM {$this->db_name}.DQS_Member AS member
        LEFT JOIN {$this->db_name}.DQS_Department AS department
        ON member.mem_dep_id = department.dep_id
        LEFT JOIN {$this->db_name}.DQS_Province AS province
        ON member.mem_pro_id = province.pro_id";
        $query = $this->db->query($sql);
        return $query;
    }
}