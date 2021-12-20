<?php

defined('BASEPATH') or exit('No direct script access allowed');

require dirname(__FILE__) . '/../DQS_controller.php';

class Member_report extends DQS_controller
{

    public function show_member_report()
    {
        $this->output_sidebar_member("Member/v_member_report");
    }

}
?>