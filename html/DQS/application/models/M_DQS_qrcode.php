<?php
defined('BASEPATH') or exit('No direct script access allowed');

include_once 'Da_DQS_qrcode.php';

class M_DQS_qrcode extends Da_DQS_qrcode
{


    public function __construct()
    {
        parent::__construct();
    }
    
    public function get_by_id($qr_mem_id)
    {
        // $sql = "SELECT * FROM {$this->db_name}.DQS_QR  WHERE qr_mem_id = $qr_mem_id";
        // $query = $this->db->query($sql);
        // return $query;
        $sql = "SELECT * 
        FROM {$this->db_name}.DQS_QR AS qr
        LEFT JOIN {$this->db_name}.DQS_Document AS document
        ON qr.qr_name = document.doc_name
        WHERE qr_mem_id = $qr_mem_id ";
        $query = $this->db->query($sql);
        return $query;
    }

    // public function get_all()
    // {
    //     $sql = "SELECT * 
    //             From {$this->db_name}.DQS_Document
    //             Left Join {$this->db_name}.DQS_QR
    //                 On doc_name = qr_name";

    //     $query = $this->db->query($sql);
    //     return $query;

    // }

}