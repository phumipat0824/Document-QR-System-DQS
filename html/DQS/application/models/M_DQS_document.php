<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include_once 'Da_DQS_document.php';

class M_DQS_document extends Da_DQS_document {

	public function __construct()
	{
		parent::__construct();
	}

        /*
	* check_login
	* check_login username passwordin database 
	* @input username, password
	* @output mem_id, mem_username, mem_password
	* @author Ashirawat, Krsiada
	* @Create Date 2564-08-05
	*/
	public function check_login()
	{
		$sql = "SELECT mem_id,mem_firstname,mem_lastname,mem_usernmeme,mem_password
                FROM {$this->db_name}.DQS_Member 
        WHERE mem_usernmeme=? AND mem_password =? ";
        $query = $this->db->query($sql, array($this->mem_usernmeme, $this->mem_password));
        return $query;

		//ตรวจสอบการเข้าสู่ระบบโดยใช้ username และ password
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
    }//รับค่าผ่านตัวแปร mem_username และ mem_password.


    /*
	* get_by_id_folder
	* Get document qrcode folder data by userid in database
	* @input userid
	* @output document qrcode folder data
	* @author Ashirawat
	* @Create Date 2565-02-15
	*/

	public function get_by_id_folder($qr_mem_id)
    {
        // $sql = "SELECT * FROM {$this->db_name}.DQS_QR  WHERE qr_mem_id = $qr_mem_id";
        // $query = $this->db->query($sql);
        // return $query;
        $sql = "SELECT * 
        FROM {$this->db_name}.DQS_Document AS document
        LEFT JOIN {$this->db_name}.DQS_Qrcode AS qr
        ON document.doc_name = qr.qr_name
        WHERE qr_mem_id = $qr_mem_id ";
        $query = $this->db->query($sql);
        return $query;
    }

     /*
	* get_file_by_fol_id
	* Get document qrcode folder data by userid in database
	* @input userid
	* @output document qrcode folder data
	* @author Chanyapat
	* @Create Date 2565-03-25
	*/
	public function get_file_by_fol_id($qr_mem_id,$fol_id)
    {
        // $sql = "SELECT * FROM {$this->db_name}.DQS_QR  WHERE qr_mem_id = $qr_mem_id";
        // $query = $this->db->query($sql);
        // return $query;
        $sql = "SELECT * 
        FROM {$this->db_name}.DQS_Document AS document
        LEFT JOIN {$this->db_name}.DQS_Qrcode AS qr
        ON document.doc_name = qr.qr_name
        WHERE qr_mem_id = $qr_mem_id AND doc_fol_id = $fol_id";
        $query = $this->db->query($sql);
        return $query;
    }

    /*
	* get_parent_and_child_by_path
	* Get document qrcode folder data by 
	* @input 
	* @output document qrcode folder data
	* @author Chanyapat
	* @Create Date 2565-04-15
	*/
	public function get_parent_and_child_by_path($path)
    {
        // $sql = "SELECT * FROM {$this->db_name}.DQS_QR  WHERE qr_mem_id = $qr_mem_id";
        // $query = $this->db->query($sql);
        // return $query;
        $sql = "SELECT * 
        FROM {$this->db_name}.DQS_Document AS document
        LEFT JOIN {$this->db_name}.DQS_Qrcode AS qr
        ON document.doc_name = qr.qr_name
        WHERE doc_path = '$path' OR doc_path LIKE '{$path}/%'";
        $query = $this->db->query($sql);
        return $query;
    }

    /*
	* get_by_id
	* Get document qrcode data by userid in database
	* @input userid
	* @output Get document qrcode data
	* @author Ashirawat
	* @Create Date 2564-01-27
	*/    

	public function get_by_id($qr_mem_id)
    {
        // $sql = "SELECT * FROM {$this->db_name}.DQS_QR  WHERE qr_mem_id = $qr_mem_id";
        // $query = $this->db->query($sql);
        // return $query;
        $sql = "SELECT * 
        FROM {$this->db_name}.DQS_Qrcode AS qr
        LEFT JOIN {$this->db_name}.DQS_Document AS document
        ON qr.qr_name = document.doc_name 
        WHERE qr_mem_id = $qr_mem_id AND doc_mem_id = $qr_mem_id";
        $query = $this->db->query($sql);
        return $query;
    }

	public function get_by_qr_id($doc_id)
    {
        $sql = "SELECT * FROM {$this->db_name}.DQS_Qrcode JOIN {$this->db_name}.DQS_Document 
        ON DQS_Qrcode.qr_doc_id = DQS_Document.doc_id
        WHERE DQS_Qrcode.qr_doc_id = $doc_id";
        $query = $this->db->query($sql);
        return $query;
    }

    public function get_by_doc_id($doc_id)
    {
        $sql = "SELECT * FROM {$this->db_name}.DQS_Document 
        WHERE DQS_Document.doc_id = $doc_id";
        $query = $this->db->query($sql);
        return $query;
    }

    public function get_all()
    {
        $sql = "SELECT * from {$this->db_name}.DQS_Document";
        $query = $this->db->query($sql);
        return $query;
    }
    /*
    * check_exist_name($doc_name)
    * check exist name
    * @input doc_name
    * @output -
    * @author Onticha
    * @Create Date 2565-03-21
    */
    public function check_exist_name($doc_name)
    {
        $this->db->where('doc_name', $doc_name);
        $query = $this->db->get('DQS_Document');
        return $query->num_rows();
    }

    public function get_all_doc()
    {
        $sql = "SELECT * FROM {$this->db_name}.DQS_Document ";
        $query = $this->db->query($sql);
        return $query;
    }

    public function get_by_doc_mem_id($mem_id)
    {
        $sql = "SELECT * FROM {$this->db_name}.DQS_Document 
        WHERE DQS_Document.doc_mem_id  = $mem_id";
        $query = $this->db->query($sql);
        return $query;
    }
}