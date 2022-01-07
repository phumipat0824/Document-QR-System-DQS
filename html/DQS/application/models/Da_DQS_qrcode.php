<?php
/*
	* Da_DQS_qrcode.php
    * Da_DQS_qrcode upload file
    * @author Ashirawat
    * @Create Date 2564-11-14
*/
?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require 'DQS_model.php';

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
    
    public function __construct()
	{
        parent::__construct();
	}

/*
* insert
* Insert document into database 
* @input document data
* @output -
* @author Ashirawat
* @Create Date 2564-11-14
*/
    public function insert_doc(){//insert document into database    
        $sql = "INSERT INTO {$this->db_name}.DQS_Document(doc_name,doc_type,doc_path,doc_mem_id ) 
                VALUES (?,?,?,?)";
                
        $this->db->query($sql,array($this->doc_name,$this->doc_type,$this->doc_path,$this->doc_mem_id));        
    }//end insert document into database

/*
* insert
* Insert qrcode into database 
* @input qrcode data
* @output -
* @author Ashirawat
* @Create Date 2564-12-17
*/
public function insert_qr(){//insert document into database    
    $sql = "INSERT INTO {$this->db_name}.DQS_QR(qr_name,qr_path) 
            VALUES (?,?)";
            
    $this->db->query($sql,array($this->qr_name,$this->qr_path));        
}//end insert document into database

}