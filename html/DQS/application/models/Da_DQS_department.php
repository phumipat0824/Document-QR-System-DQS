<?php
/*
* Model of Department
* query insert update delete data in database 
* @author Kiattisak
* @Create Date 2564-08-05
*/
defined('BASEPATH') or exit('No direct script access allowed');

include_once 'DQS_model.php';

class Da_DQS_department extends DQS_model
{

    public function __construct()
    {
        parent::__construct();
    }
    //  * insert
	// 	* insert data to database
	// 	* @input -
	// 	* @output -
	// 	* @author Kiattisak
    public function insert($dep_name)
	{
		$sql = "INSERT INTO {$this->db_name}.DQS_Department(dep_name) 
                VALUES ('$dep_name')";
        $this->db->query($sql, array($this->dep_name));
	}//insert

	//  * name_update
	// 	* update name of department
	// 	* @input -
	// 	* @output -
	// 	* @author Kiattisak
    public function name_update()
    {
        $sql = "UPDATE {$this->db_name}.DQS_Department
                set dep_name = ?  
                where dep_id = ?";

        $this->db->query($sql , array( $this->dep_name , $this->dep_id ) );
    }

    //  * status_update
	// 	* update status of department
	// 	* @input -
	// 	* @output -
	// 	* @author Kiattisak
    public function status_update($dep_id,$station_status,$mem_pro_id)
    {
        if ($station_status == 0) {
            $sql = "UPDATE {$this->db_name}.DQS_Station_State_of_Province
                set station_status = 1
                where station_dep_id = $dep_id AND station_pro_id = $mem_pro_id";

            $this->db->query($sql , array( $this->station_status , $this->station_dep_id ) );
        }else if ($station_status == 1) {
            $sql = "UPDATE {$this->db_name}.DQS_Station_State_of_Province
                set station_status = 0
                where station_dep_id = $dep_id AND station_pro_id = $mem_pro_id";

            $this->db->query($sql , array( $this->station_status , $this->station_dep_id ) );
        }
        
    }

    
}