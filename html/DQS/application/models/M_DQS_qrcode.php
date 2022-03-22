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

}