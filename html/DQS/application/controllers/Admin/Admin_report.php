<?php

defined('BASEPATH') or exit('No direct script access allowed');

require dirname(__FILE__) . '/../DQS_controller.php';

class Admin_report extends DQS_controller
{

    public function show_admin_report()
    {
        $this->load->model('M_DQS_qrcode', 'mqr');
        $this->load->model('M_DQS_download', 'mdd');
        $data['arr_download'] = $this->mdd->get_all()->result();
        $data['total_download'] = $this->mqr->count_date_download()->result();
        $data['count_download'] = 0;
        for ($i = 0; $i < count($data['arr_download']); $i++) {
            $data['count_download'] += $data['arr_download'][$i]->dow_download;
        }
        $mem_id = $this->session->userdata('mem_id');
        $mem_pro_id  = $this->session->userdata('mem_pro_id');
        $data['arr_qr_code'] = $this->mqr->get_by_user_id($mem_id)->result();
        $data['arr_member'] = $this->mqr->get_by_pro_id($mem_pro_id)->result();
        $this->output_sidebar_admin("Admin/v_admin_report", $data);
    }

    public function get_file_list_ajax()
    {

        $this->load->model('M_DQS_qrcode', 'mqr');
        $mem_id = $this->input->post('mem_id_list');
        $data['arr_doc'] = $this->mqr->get_by_id_user($mem_id)->result();
        echo json_encode($data);
    }

    public function count_download()
    {
        $this->load->model('M_DQS_download', 'mdd');
        $qr_id = $this->input->post('qr_id');
        $download['arr_download'] = $this->mdd->get_by_qr_id($qr_id)->result();
        if ($download['arr_download'] == null) {
            $this->mdd->dow_download = 1;
            $this->mdd->dow_datetime = date("Y-m-d");
            $this->mdd->dow_qr_id = (int)$qr_id;
            $this->mdd->insert_download_history();
        }
        $count_date_insert = 0;
        for ($i = 0; $i < count($download['arr_download']); $i++) {

            $date_download = substr($download['arr_download'][$i]->dow_datetime, 0, 11);
            $discount_start_date = date("Y-m-d");
            $date_format = date('Y-m-d', strtotime($discount_start_date));
            $date_download_format = date('Y-m-d', strtotime($date_download));
            echo 'DATE CURRENT : ' . $date_format . '<br>';
            echo 'DATE QRCODE : ' . $date_download_format . '<br>';
            if ($i == count($download['arr_download']) - 1) {
                if ($count_date_insert == 0) {
                    if ($date_download_format != $date_format) {
                        $this->mdd->dow_download = 1;
                        $this->mdd->dow_datetime = date("Y-m-d");
                        $this->mdd->dow_qr_id = (int)$qr_id;
                        $this->mdd->insert_download_history();
                        echo 'today insert';
                    }
                }
            } else if ($date_download_format == $date_format) {
                $count_date_insert += 1;
                $count_download = $download['arr_download'][$i]->dow_download;
                $dow_id = $download['arr_download'][$i]->dow_id;
                $count_download += 1;
                echo $dow_id . '<br>';
                echo $count_download . '<br>';
                $this->mdd->dow_download = $count_download;
                $this->mdd->dow_id = $dow_id;
                $this->mdd->update_download_history();
                echo 'today update';
            }
        }

        echo json_encode($qr_id);
    }
}
