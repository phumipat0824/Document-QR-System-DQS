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
        $sql = "SELECT * FROM {$this->db_name}.DQS_QR  WHERE qr_mem_id = $qr_mem_id";
        $query = $this->db->query($sql);
        return $query;
    }
}