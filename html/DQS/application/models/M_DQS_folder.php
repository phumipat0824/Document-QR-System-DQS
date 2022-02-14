<?php

/*
	* M_DQS_folder.php
    * M_DQS_folder upload folder
    * @author Pongthorn,Onticha,Chanyapat
    * @Create Date 2564-11-19
*/ 

defined('BASEPATH') or exit('No direct script access allowed');

include_once 'Da_DQS_folder.php';

class M_DQS_folder extends Da_DQS_folder
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_all()
    {
        $sql = "SELECT * from {$this->db_name}.DQS_Folder";
        $query = $this->db->query($sql);
        return $query;
    }

    public function get_by_id($fol_mem_id)
    {
        $sql = "SELECT * FROM {$this->db_name}.DQS_Folder  WHERE fol_mem_id = $fol_mem_id AND fol_location_id = 0 ";
        $query = $this->db->query($sql);
        return $query;
    }

    
    public function get_by_member_id($fol_mem_id,$fol_location_id)
    {
        $sql = "SELECT * FROM {$this->db_name}.DQS_Folder  WHERE fol_mem_id = $fol_mem_id AND fol_location_id = $fol_location_id";
        $query = $this->db->query($sql);
        return $query;
    }

    public function get_by_id_fol($fol_id)
    {
        $sql = "SELECT * FROM {$this->db_name}.DQS_Folder  WHERE fol_id = $fol_id";
        $query = $this->db->query($sql,array());
        return $query;
    }

    /*
    * check_exist_name($fol_name)
    * check exist name
    * @input fol_name
    * @output -
    * @author Onticha
    * @Create Date 2564-11-30
    */
    public function check_exist_name($fol_name)
    {
        $this->db->where('fol_name', $fol_name);
        $query = $this->db->get('DQS_Folder');
        return $query->num_rows();
    }
    
}
?>