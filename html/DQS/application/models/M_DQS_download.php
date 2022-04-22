<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include_once 'Da_DQS_download.php';

class M_DQS_download extends Da_DQS_download {

	public function __construct()
	{
		parent::__construct();
	}

    public function get_all(){
        $sql = "SELECT * from {$this->db_name}.DQS_Download";
        $query = $this->db->query($sql);
        return $query;
    }

    public function get_by_qr_id($qr_id){
        $sql = "SELECT * from {$this->db_name}.DQS_Download LEFT JOIN {$this->db_name}.DQS_Qrcode ON dow_qr_id = qr_id
                WHERE dow_qr_id = $qr_id ";
        $query = $this->db->query($sql);
        return $query;
    }

    public function get_by_pro_id($mem_pro_id )
    {
        $sql = "SELECT * from {$this->db_name}.DQS_Download
        WHERE DQS_Download.dow_pro_id = $mem_pro_id ";
        $query = $this->db->query($sql);
        return $query;
    }

    public function get_by_mem_id($mem_id )
    {
        $sql = "SELECT * from {$this->db_name}.DQS_Download
        WHERE DQS_Download.dow_mem_id = $mem_id ";
        $query = $this->db->query($sql);
        return $query;
    }

}