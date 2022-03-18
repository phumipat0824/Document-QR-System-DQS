<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require 'DCS_model.php';

class Da_DCS_member extends DCS_Model {

    public $mem_id;
    public $mem_first_name;
    public $mem_last_name;
    public $mem_birthday;
    public $mem_student_status;
    public $mem_last_update;
    public $mem_pf_id;

    public function __construct()
	{
		parent::__construct();
	}

    public function insert()
    {
        $sql = "INSERT INTO {$this->db_name}.ossd_member(mem_first_name, mem_last_name, mem_birthday, mem_student_status, mem_pf_id) 
                VALUES (?,?,?,?,?)";
                
        $this->db->query($sql, array($this->mem_first_name, $this->mem_last_name, $this->mem_birthday, $this->mem_student_status, $this->mem_pf_id));
    }

    public function delete()
    {
        $sql = "DELETE FROM {$this->db_name}.ossd_member
                WHERE mem_id = ?";
                
        $this->db->query($sql, array($this->mem_id));
    }

    public function update()
    {    
        $sql = "UPDATE {$this->db_name}.ossd_member
                SET mem_first_name = ?, mem_last_name = ?, mem_birthday = ?, mem_student_status = ?, mem_pf_id = ?
                WHERE mem_id = ?";
                
        $this->db->query($sql, array($this->mem_first_name, $this->mem_last_name, $this->mem_birthday, $this->mem_student_status, $this->mem_pf_id, $this->mem_id));
    }
}