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
        $query = $this->db->get('DQS_QR');
        return $query->num_rows();
    }

    public function get_id(){

        $sql = "SELECT * 
        FROM {$this->db_name}.DQS_Document
        ORDER BY doc_id DESC LIMIT 1";
        $query = $this->db->query($sql);
        return $query;

    }
}