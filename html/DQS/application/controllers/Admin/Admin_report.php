<?php

defined('BASEPATH') or exit('No direct script access allowed');

require dirname(__FILE__) . '/../DQS_controller.php';

class Admin_report extends DQS_controller
{

    public function show_admin_report()
    {
        $this->load->model('M_DQS_qrcode','mqr');
        $mem_id = $this->session->userdata('mem_id');
        $mem_pro_id  = $this->session->userdata('mem_pro_id');
        $data['arr_qr_code'] = $this->mqr->get_by_user_id($mem_id)->result();
        $data['arr_member'] = $this->mqr->get_by_pro_id($mem_pro_id)->result();
        $this->output_sidebar_admin("Admin/v_admin_report",$data);
    }

    public function get_file_list_ajax()
    {

        $this->load->model('M_DQS_qrcode','mqr');
        $mem_id = $this->input->post('mem_id_list');
        $data['arr_doc'] = $this->mqr->get_by_id_user($mem_id)->result();
        echo json_encode($data);
    }


}
?>