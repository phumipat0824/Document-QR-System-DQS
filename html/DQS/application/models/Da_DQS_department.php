<?php
defined('BASEPATH') or exit('No direct script access allowed');

include_once 'DQS_model.php';

class Da_DQS_department extends DQS_model
{

    public $dep_id;
    public $dep_name;
    public $dep_active;

    public function __construct()
    {
        parent::__construct();
    }
}
