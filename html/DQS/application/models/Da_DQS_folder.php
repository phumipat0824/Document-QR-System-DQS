<?php
/*
	* Da_DQS_folder.php
    * Da_DQS_folder upload folder
    * @author pongthorn
    * @Create Date 2564-11-19
*/
?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require 'DQS_model.php';

class Da_DQS_folder extends DQS_model {
	
    public $fol_id ;
    public $fol_name;
    public $fol_datetime;
    public $fol_location;
    public $fol_mem_id;
    public $fol_location_id;
    
    
    
    public function __construct()
	{
        parent::__construct();
	}

/*
* insert
* Insert folder into database 
* @input folder data
* @output -
* @author pongthorn
* @Create Date 2564-11-19
*/
    public function insert(){//insert folder into database    
        $sql = "INSERT INTO {$this->db_name}.DQS_Folder(fol_name,fol_location,fol_mem_id,fol_location_id) 
                VALUES (?,?,?,?)";
                
        $this->db->query($sql,array($this->fol_name,$this->fol_location,$this->fol_mem_id,$this->fol_location_id));        
    }//end insert folder into database

    public function update(){//update folder into database    
        $sql ="UPDATE {$this->db_name}.DQS_Folder
        SET fol_name = ? ,  fol_location = ?
        WHERE fol_id = ? ";
        // $this->db->query($sql,array($this->fol_name,$this->fol_id));
        $this->db->query($sql,array($this->fol_name,$this->fol_location,$this->fol_id));     
                 
    }//end update folder into database

    public function delete($fol_id)   
	{
        $sql ="DELETE FROM {$this->db_name}.DQS_Folder
        WHERE fol_id = $fol_id";
        $this->db->query($sql , array($this->fol_id));  
	}

    public function move(){//update location folder into database    
        $sql ="UPDATE {$this->db_name}.DQS_Folder
        SET fol_location = ?, fol_location_id = ?
        WHERE fol_id = ?";
        $this->db->query($sql,array($this->fol_location,$this->fol_location_id,$this->fol_id));         
    }//end update location folder into database
}
?>