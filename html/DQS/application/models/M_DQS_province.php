<?php
defined('BASEPATH') or exit('No direct script access allowed');

include_once 'Da_DQS_province.php';

class M_DQS_province extends Da_DQS_province
{


    public function __construct()
    {
        parent::__construct();
    }

    public function get_all()
    {
        $sql = "SELECT * from {$this->db_name}.DQS_Province ";
        $query = $this->db->query($sql);
        return $query;
    }

    public function get_by_id($pro_id)
    {
        $sql = "SELECT * from {$this->db_name}.DQS_Province WHERE pro_id = $pro_id";
        $query = $this->db->query($sql);
        return $query;
    }

   
}