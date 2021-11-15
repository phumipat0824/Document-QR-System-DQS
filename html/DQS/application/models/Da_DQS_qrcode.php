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
    public function insert(){//insert document into database    
        $sql = "INSERT INTO {$this->db_name}.DQS_Document(doc_name,doc_type,doc_path) 
                VALUES (?,?,?)";
                
        $this->db->query($sql,array($this->doc_name,$this->doc_type,$this->doc_path));        
    }//end insert document into database

}