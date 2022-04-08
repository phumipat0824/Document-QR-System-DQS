<?php

defined('BASEPATH') or exit('No direct script access allowed');

require dirname(__FILE__) . '/../DQS_controller.php';

class Member_report extends DQS_controller
{

    public function show_member_report()
    {
        $this->load->model('M_DQS_qrcode','mqr');
        $mem_id = $this->session->userdata('mem_id');
        $data['arr_qr_code'] = $this->mqr->get_by_user_id($mem_id)->result();
        $this->output_sidebar_member("Member/v_member_report" ,$data);
    }

}
?>