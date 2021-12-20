<?php

defined('BASEPATH') or exit('No direct script access allowed');

require dirname(__FILE__) . '/../DQS_controller.php';

class Admin_report extends DQS_controller
{

    public function show_admin_report()
    {
        $this->output_sidebar_admin("Admin/v_admin_report");
    }

}
?>