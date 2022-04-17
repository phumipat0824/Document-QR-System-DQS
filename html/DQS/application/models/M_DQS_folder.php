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

    public function get_by_mem_id($fol_mem_id)
    {
        $sql = "SELECT * FROM {$this->db_name}.DQS_Folder  WHERE fol_mem_id = $fol_mem_id";
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

    public function get_by_username_folder($mem_username)
    {
        $sql = "SELECT * FROM {$this->db_name}.DQS_member WHERE mem_username = $mem_username";
        $query = $this->db->query($sql);
        return $query;
    }
    public function get_by_email($mem_email)
    {
        $sql = "SELECT * FROM {$this->db_name}.DQS_Member WHERE mem_username = '$mem_email'";
        $query = $this->db->query($sql);
        return $query;
    }
    public function delete_file(){
        $sql = "DELETE FROM {$this->db_name}.DQS_Member
                WHERE doc_id = ? "; // ? = ค่าที่เราจะใส่ไปอยู่แล้ว , อย่าใช้ " ' " เพราะอาจจะเออเร่อได้
        $this-> db->query($sql, array($this->doc_id)); //ถ้า SQL ที่เราใส่มี ? ต้องใส่ array ด้วย
    }
    
    public function get_mem_folder($mem_id)
    {
        $sql = "SELECT * from {$this->db_name}.DQS_Folder WHERE fol_mem_id = "."$mem_id ORDER BY fol_id ASC";
        $query = $this->db->query($sql);
        return $query;
    } //get_mem_folder

    public function get_by_path($fol_location)
    {
        $sql = "SELECT * from {$this->db_name}.DQS_Folder WHERE fol_location LIKE '".$fol_location."/%'";
        $query = $this->db->query($sql);
        return $query;
    } //get_by_path 

    public function get_by_fol_location_id($fol_id)
    {
        $sql = "SELECT * from {$this->db_name}.DQS_Folder WHERE fol_location_id= $fol_id";
        $query = $this->db->query($sql);
        return $query;
    } 

    public function get_level_1_by_member_id($fol_mem_id)
    {
        $sql = "SELECT *
            FROM {$this->db_name}.DQS_Folder
            WHERE fol_mem_id = $fol_mem_id AND fol_location_id = 0";

        $query = $this->db->query($sql);
        return $query;
    } //get_level_1_by_member_id

    public function get_level_2_or_more_by_member_id($fol_mem_id)
    {
        $sql = "SELECT *
            FROM {$this->db_name}.DQS_Folder
            WHERE fol_mem_id = $fol_mem_id AND fol_location_id != 0";

        $query = $this->db->query($sql);
        return $query;
    } //get_level_2_or_more_by_member_id

    public function get_level_1_by_path($path)
    {
        $sql = "SELECT *
            FROM {$this->db_name}.DQS_Folder
            WHERE (fol_location = '$path' OR fol_location LIKE '{$path}/%') AND fol_location_id = 0";
        $query = $this->db->query($sql);
        return $query;
    } //get_level_1_by_member_path

    public function get_level_2_or_more_by_path($path)
    {
        $sql = "SELECT *
            FROM {$this->db_name}.DQS_Folder
            WHERE (fol_location = '$path' OR fol_location LIKE '{$path}/%') AND fol_location_id != 0";
        $query = $this->db->query($sql);
        return $query;
    } //get_level_2_or_more_by_member_path

    public function get_folder_by_id($fol_id)
    {
        $sql = "SELECT *
            FROM {$this->db_name}.DQS_Folder
            WHERE fol_id = $fol_id";

        $query = $this->db->query($sql);
        return $query;
    } //get_folder_by_id

    public function get_by_doc_fol_id($fol_id)
    {
        $sql = "SELECT * from {$this->db_name}.DQS_Document
        WHERE DQS_Document.doc_fol_id = $fol_id";
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

    public function get_by_id_doc($doc_id)
    {
        $sql = "SELECT * from {$this->db_name}.DQS_Document
        WHERE DQS_Document.doc_id = $doc_id";
        $query = $this->db->query($sql);
        return $query;
    }
}
?>