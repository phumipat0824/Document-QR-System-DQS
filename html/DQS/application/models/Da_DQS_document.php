<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include_once 'DQS_model.php';

class Da_DQS_document extends DQS_model {
    
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
    public function delete_file(){
        $sql = "DELETE FROM {$this->db_name}.DQS_Document
                WHERE doc_id = ? "; // ? = ค่าที่เราจะใส่ไปอยู่แล้ว , อย่าใช้ " ' " เพราะอาจจะเออเร่อได้
        $this-> db->query($sql, array($this->doc_id)); //ถ้า SQL ที่เราใส่มี ? ต้องใส่ array ด้วย
    }

    public function delete_qr_file($qr_id)
    {
        $sql = "DELETE FROM {$this->db_name}.DQS_Qrcode
                WHERE qr_id = $qr_id "; // ? = ค่าที่เราจะใส่ไปอยู่แล้ว , อย่าใช้ " ' " เพราะอาจจะเออเร่อได้
        $this-> db->query($sql, array($this->qr_id)); //ถ้า SQL ที่เราใส่มี ? ต้องใส่ array ด้วย

    }


}