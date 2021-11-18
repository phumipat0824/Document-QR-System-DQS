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
    /*
	* get_by_username_password
	* Get user by username password in database
	* @input username, password
	* @output usr_id, usr_username, usr_password, usr_name, usr_active_status, usr_role
	* @author Ashirawat, Krsiada
	* @Create Date 2564-08-05
	*/
	public function get_by_username_password($mem_username, $mem_password)
    {
        $sql = "SELECT * 
            FROM {$this->db_name}.DQS_Member
            WHERE mem_username = '$mem_username'AND mem_password = '$mem_password' OR mem_email = '$mem_username' AND mem_password = '$mem_password'";
        $query = $this->db->query($sql);
        return $query;
    }//รับค่าผ่านตัวแปร mem_username และ mem_password
}
