<?php
defined('BASEPATH') or exit('No direct script access allowed');

include_once 'DQS_model.php';

class Da_DQS_download extends DQS_model
{

    public $dow_id;
    public $dow_download;
    public $dow_datetime;
    public $dow_qr_id;
    public $dow_mem_id;
    public $dow_pro_id;

    public function __construct()
    {
        parent::__construct();
    }

    public function insert_download_history()
    {
        $sql = "INSERT INTO {$this->db_name}.DQS_Download(dow_download,dow_datetime,dow_qr_id,dow_mem_id,dow_pro_id) 
                    VALUES (?,?,?,?,?)";

        $this->db->query($sql, array($this->dow_download, $this->dow_datetime, $this->dow_qr_id, $this->dow_mem_id, $this->dow_pro_id));
    }

    public function update_download_history()
    {
        $sql = "UPDATE {$this->db_name}.DQS_Download 
        SET dow_download = ?
        WHERE dow_id = ? ";
        $this->db->query($sql, array($this->dow_download, $this->dow_id));
    }
}
