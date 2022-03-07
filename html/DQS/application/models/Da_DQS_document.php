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


}