<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require 'DQS_model.php';

/*
* Da_DQS_qrcode
* @author Ashirawat
* @Create Date 2564-11-14
*/

class Da_DQS_qrcode extends DQS_model {
	
    public $doc_id ;
    public $doc_name;
    public $doc_type;
    public $doc_path;
    public $doc_view;
    public $doc_download;
    public $doc_datetime;
    public $doc_mem_id;
    public $qr_id ;
    public $qr_name;
    public $qr_path;
    public $qr_view;
    public $qr_download;
    public $qr_datetime;
    public $qr_mem_id;
    public $qr_doc_id;
    
    public function __construct()
	{
        parent::__construct();
	}

/*
* insert_document
* Insert document into database 
* @input doc_name,doc_type,doc_path,doc_mem_id
* @output -
* @author Ashirawat
* @Create Date 2564-11-14
*/
    public function insert_document(){//insert document into database    
        $sql = "INSERT INTO {$this->db_name}.DQS_Document(doc_name,doc_type,doc_path,doc_mem_id) 
                VALUES (?,?,?,?)";
                
        $this->db->query($sql,array($this->doc_name,$this->doc_type,$this->doc_path,$this->doc_mem_id));        
    }//end insert document into database

/*
* insert_document_in_folder
* Insert document in folder into database 
* @input doc_name,doc_type,doc_path,doc_mem_id
* @output -
* @author Ashirawat, Jerasak
* @Create Date 2565-02-18
*/

    public function insert_document_in_folder(){//insert document into database    
        $sql = "INSERT INTO {$this->db_name}.DQS_Document(doc_name,doc_type,doc_path,doc_mem_id,doc_fol_id) 
                VALUES (?,?,?,?,?)";
                
        $this->db->query($sql,array($this->doc_name,$this->doc_type,$this->doc_path,$this->doc_mem_id,$this->doc_fol_id));        
    }//end insert document into database

/*
* insert_qrcode
* Insert qrcode into database 
* @input doc_name,doc_type,doc_path,doc_mem_id
* @output -
* @author Ashirawat
* @Create Date 2564-12-17
*/
public function insert_qrcode(){//insert document into database    
    $sql = "INSERT INTO {$this->db_name}.DQS_Qrcode(qr_name,qr_path,qr_mem_id,qr_doc_id) 
            VALUES (?,?,?,?)";
            
    $this->db->query($sql,array($this->qr_name,$this->qr_path,$this->qr_mem_id,$this->qr_doc_id));        
}//end insert document into database


public function update_qr_file(){
    $sql = "UPDATE {$this->db_name}.DQS_Qrcode
            SET qr_name = ? ,qr_path = ? 
            WHERE qr_id = ? "; // ? = ค่าที่เราจะใส่ไปอยู่แล้ว , อย่าใช้ " ' " เพราะอาจจะเออเร่อได้
    $this-> db->query($sql, array($this->qr_name,$this->qr_path,$this->qr_id)); //ถ้า SQL ที่เราใส่มี ? ต้องใส่ array ด้วย
}

public function get_by_id_user($mem_id){
    $sql = "SELECT * 
    FROM {$this->db_name}.DQS_Document
    WHERE DQS_Document.doc_mem_id  = $mem_id";
    $query = $this->db->query($sql);
    return $query;
}


}