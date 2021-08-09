<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require 'CRS_Model.php';

class Da_DQS_department extends DQS_model {

    public $dep_id;
    public $dep_name;
    public $dep_province;
    public $dep_active;

 public function __construct()
 {
        parent::__construct();
    }


}