<?php
defined('BASEPATH') or exit('No direct script access allowed');

include_once 'DQS_model.php';

class Da_DQS_department extends DQS_model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function insert()
	{
		$sql = "INSERT INTO {$this->db_name}.DQS_Department(dep_name, dep_active) 
                VALUES (?,?)";
        $this->db->query($sql, array($this->dep_name,$this->dep_active));
	}//insert

    
	
    public function name_update()
    {
        $sql = "UPDATE {$this->db_name}.DQS_Department
                set dep_name = ?  
                where dep_id = ?";

        $this->db->query($sql , array( $this->dep_name , $this->dep_id ) );
    }

    public function status_update($dep_id,$dep_active)
    {
        if ($dep_active == 0) {
            $sql = "UPDATE {$this->db_name}.DQS_Department
                set dep_active = 1
                where dep_id = $dep_id";

            $this->db->query($sql , array( $this->dep_active , $this->dep_id ) );
        }else if ($dep_active == 1) {
            $sql = "UPDATE {$this->db_name}.DQS_Department
                set dep_active = 0
                where dep_id = $dep_id";

            $this->db->query($sql , array( $this->dep_active , $this->dep_id ) );
        }
        
    }


}