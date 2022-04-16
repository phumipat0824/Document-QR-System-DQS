<?php

defined('BASEPATH') or exit('No direct script access allowed');

require dirname(__FILE__) . '/../DQS_controller.php';

class Admin_report extends DQS_controller
{

    public function show_admin_report()
    {
        $this->load->model('M_DQS_qrcode','mqr');
        $mem_id = $this->session->userdata('mem_id');
        $data['arr_qr_code'] = $this->mqr->get_by_user_id($mem_id)->result();
        $this->output_sidebar_admin("Admin/v_admin_report",$data);
    }

}
?>