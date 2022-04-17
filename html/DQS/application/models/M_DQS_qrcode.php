<?php
defined('BASEPATH') or exit('No direct script access allowed');

include_once 'Da_DQS_qrcode.php';

/*
* M_DQS_qrcode
* @author Ashirawat
* @Create Date 2564-11-14
*/

class M_DQS_qrcode extends Da_DQS_qrcode
{


    public function __construct()
    {
        parent::__construct();
    }

    public function check_exist_name($doc_name)
    {
        $this->db->where('doc_name', $doc_name);
        $query = $this->db->get('DQS_Document');
        return $query->num_rows();
    }
    public function check_exist_nameqr($qr_name)
    {
        $this->db->where('qr_name', $qr_name);
        $query = $this->db->get('DQS_Qrcode');
        return $query->num_rows();
    }

    /*
	* get id
	* get data document last position
	* @input -
	* @output document data
	* @author Ashirawat
	* @Create Date 2565-02-15
	*/

    public function get_id(){

        $sql = "SELECT * 
        FROM {$this->db_name}.DQS_Document
        ORDER BY doc_id DESC LIMIT 1";
        $query = $this->db->query($sql);
        return $query;

    }

    /*
	* checkname
	* check for duplicate document name 
	* @input doc_name
	* @output document data
	* @author Ashirawat
	* @Create Date 2565-02-15
	*/

    public function checkname($doc_name,$doc_mem_id){
        $sql = "SELECT * 
        FROM {$this->db_name}.DQS_Document AS document
        LEFT JOIN {$this->db_name}.DQS_Qrcode AS qr
        ON document.doc_name = qr.qr_name
        WHERE doc_name = '$doc_name' AND qr_name = '$doc_name' AND doc_mem_id = '$doc_mem_id' AND qr_mem_id = '$doc_mem_id'";

        $query = $this->db->query($sql);
        return $query;
    }

    /*
	* get_by_id
	* Get document qrcode data by userid in database
	* @input userid
	* @output document qrcode data
	* @author Ashirawat
	* @Create Date 2565-02-15
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
        WHERE qr_mem_id = '$qr_mem_id' ";
        $query = $this->db->query($sql);
        return $query;
    }

    public function get_by_qr_id($qr_id)
    {
        $sql = "SELECT * from {$this->db_name}.DQS_Qrcode
        WHERE DQS_Qrcode.qr_id = $qr_id";
        $query = $this->db->query($sql);
        return $query;
    }

    public function get_by_doc_id($doc_id)
    {
        $sql = "SELECT * from {$this->db_name}.DQS_Qrcode
        WHERE DQS_Qrcode.qr_doc_id = $doc_id";
        $query = $this->db->query($sql);
        return $query;
    }

    public function get_by_doc($doc_id)
    {
        $sql = "SELECT * from {$this->db_name}.DQS_Document
        WHERE DQS_Document.doc_id = $doc_id";
        $query = $this->db->query($sql);
        return $query;
    }

    public function get_by_user_id($mem_id){
        $sql = "SELECT * 
        FROM {$this->db_name}.DQS_Document
        WHERE DQS_Document.doc_mem_id  = $mem_id";
        $query = $this->db->query($sql);
        return $query;
    }

    public function get_qr_download(){
        $sql = "SELECT * FROM {$this->db_name}.DQS_Qrcode";
        $query = $this->db->query($sql);
        return $query;
    }

    public function add_count_download(){
        $sql = "UPDATE {$this->db_name}.DQS_Qrcode
            SET qr_download = ? 
            WHERE qr_name = ? "; // ? = ค่าที่เราจะใส่ไปอยู่แล้ว , อย่าใช้ " ' " เพราะอาจจะเออเร่อได้
    $this-> db->query($sql, array($this->qr_download,$this->qr_name)); //ถ้า SQL ที่เราใส่มี ? ต้องใส่ array ด้วย
    }
       /*
    * check_exist_name($doc_name)
    * check exist name
    * @input doc_name
    * @output -
    * @author Onticha
    * @Create Date 2565-03-21
    */
    // public function check_exist_name($qr_name)
    // {
    //     $this->db->where('qr_name', $qr_name);
    //     $query = $this->db->get('DQS_Qrcode');
    //     return $query->num_rows();
    // }

    public function get_by_id_user($mem_id){
        $sql = "SELECT * 
        FROM {$this->db_name}.DQS_Document
        WHERE DQS_Document.doc_mem_id  = $mem_id";
        $query = $this->db->query($sql);
        return $query;
    }

    public function get_by_pro_id($mem_pro_id )
    {
        $sql = "SELECT * from {$this->db_name}.DQS_Member
        WHERE DQS_Member.mem_pro_id = $mem_pro_id ";
        $query = $this->db->query($sql);
        return $query;
    }

    public function get_qr_download_by_date($doc_id)
    {
        $sql = "SELECT * FROM {$this->db_name}.DQS_Qrcode
         WHERE DQS_Member.dow_qr_id = $doc_id ";
        $query = $this->db->query($sql);
        return $query;

    }

    public function count_date_download(){
        $sql = " SELECT dow_datetime, SUM(dow_download) AS dow_download FROM {$this->db_name}.DQS_Download
        GROUP BY dow_datetime";
        $query = $this->db->query($sql);
        return $query;
    }
}