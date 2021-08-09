<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DQS_model extends CI_Model {

    public $db;
    public $db_name;

 public function __construct()
 {
        $this->db = $this->load->database('default',true);
        $this->db_name = $this->db->database;
        //เชื่อมต่อdatabase

        // $this->db = $this->load->database('default',true);
        // $this->db_name = $this->db->database;
    }
}