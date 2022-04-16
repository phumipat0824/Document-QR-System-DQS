<?php
/*
	* Da_DQS_folder.php
    * insert ,update ,delete ,move folder
    * @author Pongthorn,Onticha,Chanyapat
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
* insert()
* Insert folder into database 
* @input folder data
* @output -
* @author Pongthorn
* @Create Date 2564-11-19
*/
    public function insert(){//insert folder into database    
        $sql = "INSERT INTO {$this->db_name}.DQS_Folder(fol_name,fol_location,fol_mem_id,fol_location_id) 
                VALUES (?,?,?,?)";
                
        $this->db->query($sql,array($this->fol_name,$this->fol_location,$this->fol_mem_id,$this->fol_location_id));        
    }//end insert folder into database

/*
* update()
* Update folder into database 
* @input folder_name
* @output update folder name
* @author Onticha
* @Create Date 2564-11-30
*/
    public function update(){//update folder into database    
        $sql ="UPDATE {$this->db_name}.DQS_Folder
        SET fol_name = ? ,  fol_location = ?
        WHERE fol_id = ? ";
        // $this->db->query($sql,array($this->fol_name,$this->fol_id));
        $this->db->query($sql,array($this->fol_name,$this->fol_location,$this->fol_id));     
                 
    }//end update folder into database

    public function update_in_folder(){//update folder into database    
        $sql ="UPDATE {$this->db_name}.DQS_Folder
        SET fol_location = ?
        WHERE fol_id = ? ";
        // $this->db->query($sql,array($this->fol_name,$this->fol_id));
        $this->db->query($sql,array($this->fol_location,$this->fol_id));     
                 
    }//end update folder into database

    public function update_document(){//update folder into database    
        $sql ="UPDATE {$this->db_name}.DQS_Document
        SET doc_path = ?
        WHERE doc_id = ? ";
        // $this->db->query($sql,array($this->fol_name,$this->fol_id));
        $this->db->query($sql,array($this->doc_path,$this->doc_id));     
                 
    }

    public function update_qrcode(){//update folder into database    
        $sql ="UPDATE {$this->db_name}.DQS_Qrcode
        SET qr_path = ?
        WHERE qr_id = ? ";
        $this->db->query($sql,array($this->qr_path,$this->qr_id));      
    }
/*
* delete()
* Delete folder from database 
* @input folder_id
* @output -
* @author Onticha
* @Create Date 2564-11-30
*/
    public function DeleteFolder($fol_id)//delete folder from database     
	{
        $sql ="DELETE FROM {$this->db_name}.DQS_Folder
        WHERE fol_id = $fol_id";
        $query = $this->db->query($sql);
        return $query;
	}//end delete folder from database    
    
    public function DeleteDocument($fol_id)//delete folder from database     
	{
        $sql ="DELETE FROM {$this->db_name}.DQS_Document
        WHERE doc_fol_id = $fol_id";
        $query = $this->db->query($sql);
        return $query;
	}

    public function DeleteQR($qr_id)//delete folder from database     
	{
        $sql ="DELETE FROM {$this->db_name}.DQS_Qrcode
        WHERE qr_id = $qr_id";
        $query = $this->db->query($sql);
        return $query;
	}
/*
* update_location()
* Update folder_location in database 
* @input folder_id, folder_location, folder_location_id
* @output update folder_location & folder_location_id
* @author Chanyapat
* @Create Date 2564-11-30
*/
    public function update_location(){//update location folder into database    
        $sql ="UPDATE {$this->db_name}.DQS_Folder
        SET fol_location = ?, fol_location_id = ?
        WHERE fol_id = ?";
        $this->db->query($sql,array($this->fol_location,$this->fol_location_id,$this->fol_id));         
    }//end update location folder into database
}
?>