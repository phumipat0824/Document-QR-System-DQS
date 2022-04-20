<?php

defined('BASEPATH') or exit('No direct script access allowed');

require dirname(__FILE__) . '/../DQS_controller.php';

class Admin_report extends DQS_controller
{

    // public function show_admin_report()
    // {
    //     $this->load->model('M_DQS_qrcode', 'mqr');
    //     $this->load->model('M_DQS_download', 'mdd');
    //     $data['arr_download'] = $this->mdd->get_all()->result();
    //     $data['total_download'] = $this->mqr->count_date_download()->result();
    //     $data['count_download'] = 0;
    //     for ($i = 0; $i < count($data['arr_download']); $i++) {
    //         $data['count_download'] += $data['arr_download'][$i]->dow_download;
    //     }
    //     $mem_id = $this->session->userdata('mem_id');
    //     $mem_pro_id  = $this->session->userdata('mem_pro_id');
    //     $data['arr_qr_code'] = $this->mqr->get_by_user_id($mem_id)->result();
    //     $data['arr_member'] = $this->mqr->get_by_pro_id($mem_pro_id)->result();
    //     $this->output_sidebar_admin("Admin/v_admin_report", $data);
    // }

    // public function get_file_list_ajax()
    // {

    //     $this->load->model('M_DQS_qrcode', 'mqr');
    //     $mem_id = $this->input->post('mem_id_list');
    //     $data['arr_doc'] = $this->mqr->get_by_id_user($mem_id)->result();
    //     echo json_encode($data);
    // }

    public function count_download()
    {
        $this->load->model('M_DQS_download', 'mdd');
        $qr_id = $this->input->post('qr_id');
        $this->mdd->dow_download = 1;
        $this->mdd->dow_datetime = date("Y-m-d");
        $this->mdd->dow_qr_id = (int)$qr_id;
        $this->mdd->dow_mem_id = $this->session->userdata('mem_id');
        $this->mdd->dow_pro_id = $this->session->userdata('mem_pro_id');
        $this->mdd->insert_download_history();
        echo json_encode($qr_id);
    }
    public function show_admin_report()
    {
        $this->load->model('M_DQS_qrcode', 'mqr');
        $this->load->model('M_DQS_document', 'doc');
        $this->load->model('M_DQS_download', 'dow');
        $mem_pro_id = $this->session->userdata('mem_pro_id');
        $data['arr_member'] = $this->mqr->get_by_pro_id($mem_pro_id)->result();
        $data['arr_download'] = $this->dow->get_by_pro_id($mem_pro_id)->result();
        $data['arr_doc'] = $this->doc->get_all_doc()->result();
        $all_pdf = 0;
        $all_img = 0;
        $pdf = 0;
        $img = 0;
        $Jan = 0;
        $Feb = 0;
        $Mar = 0;
        $Apr = 0;
        $May = 0;
        $Jun = 0;
        $Jul = 0;
        $Aug = 0;
        $Sep = 0;
        $Oct = 0;
        $Nov = 0;
        $Dec = 0;
        for ($i = 0; $i < count($data['arr_download']); $i++) {
            $date = $data['arr_download'][$i]->dow_datetime;


            if (substr($date, 5, 2) == 1) {
                $Jan += 1;
            } else if (substr($date, 5, 2) == 2) {
                $Feb += 1;
            } else if (substr($date, 5, 2) == 3) {
                $Mar += 1;
            } else if (substr($date, 5, 2) == 4) {
                $Apr += 1;
            } else if (substr($date, 5, 2) == 5) {
                $May += 1;
            } else if (substr($date, 5, 2) == 6) {
                $Jun += 1;
            } else if (substr($date, 5, 2) == 7) {
                $Jul += 1;
            } else if (substr($date, 5, 2) == 8) {
                $Aug += 1;
            } else if (substr($date, 5, 2) == 9) {
                $Sep += 1;
            } else if (substr($date, 5, 2) == 10) {
                $Oct += 1;
            } else if (substr($date, 5, 2) == 11) {
                $Nov += 1;
            } else if (substr($date, 5, 2) == 12) {
                $Dec += 1;
            }
        }
        $all_doc = count($data['arr_doc']);
        if ($all_doc != 0) {
            for ($i = 0; $i < count($data['arr_doc']); $i++) {
                if ($data['arr_doc'][$i]->doc_type == "pdf") {
                    $all_pdf += 1;
                } else {
                    $all_img += 1;
                }
            }

            $pdf = $all_pdf;
            $img = $all_img;
            $all_pdf = ($all_pdf * 100) / $all_doc;
            $all_pdf = round($all_pdf);
            $all_img = ($all_img * 100) / $all_doc;
            $all_img = round($all_img);
            $data['all_pdf'] = $all_pdf;
            $data['all_img'] = $all_img;
            $data['pdf'] = $pdf;
            $data['img'] = $img;
            $data['Jan'] = $Jan;
            $data['Feb'] = $Feb;
            $data['Mar'] = $Mar;
            $data['Apr'] = $Apr;
            $data['May'] = $May;
            $data['Jun'] = $Jun;
            $data['Jul'] = $Jul;
            $data['Aug'] = $Aug;
            $data['Sep'] = $Sep;
            $data['Oct'] = $Oct;
            $data['Nov'] = $Nov;
            $data['Dec'] = $Dec;
            $this->output_sidebar_admin("Admin/v_admin_report", $data);
        } else {
            $data['all_pdf'] = $all_pdf;
            $data['all_img'] = $all_img;
            $data['pdf'] = $pdf;
            $data['img'] = $img;
            $data['Jan'] = $Jan;
            $data['Feb'] = $Feb;
            $data['Mar'] = $Mar;
            $data['Apr'] = $Apr;
            $data['May'] = $May;
            $data['Jun'] = $Jun;
            $data['Jul'] = $Jul;
            $data['Aug'] = $Aug;
            $data['Sep'] = $Sep;
            $data['Oct'] = $Oct;
            $data['Nov'] = $Nov;
            $data['Dec'] = $Dec;
            $this->output_sidebar_admin("Admin/v_admin_report", $data);
        }
    }

    public function get_file()
    {

        $this->load->model('M_DQS_qrcode', 'mqr');
        $this->load->model('M_DQS_document', 'doc');
        $this->load->model('M_DQS_download', 'dow');
        $mem_id = $this->input->post('user_id');
        if ($mem_id == "total") {
            $mem_pro_id = $this->session->userdata('mem_pro_id');
            $data['arr_member'] = $this->mqr->get_by_pro_id($mem_pro_id)->result();
            $data['arr_download'] = $this->dow->get_by_pro_id($mem_pro_id)->result();
            $data['arr_doc'] = $this->doc->get_all_doc()->result();
            $all_pdf = 0;
            $all_img = 0;
            $pdf = 0;
            $img = 0;
            $Jan = 0;
            $Feb = 0;
            $Mar = 0;
            $Apr = 0;
            $May = 0;
            $Jun = 0;
            $Jul = 0;
            $Aug = 0;
            $Sep = 0;
            $Oct = 0;
            $Nov = 0;
            $Dec = 0;
            for ($i = 0; $i < count($data['arr_download']); $i++) {
                $date = $data['arr_download'][$i]->dow_datetime;


                if (substr($date, 5, 2) == 1) {
                    $Jan += 1;
                } else if (substr($date, 5, 2) == 2) {
                    $Feb += 1;
                } else if (substr($date, 5, 2) == 3) {
                    $Mar += 1;
                } else if (substr($date, 5, 2) == 4) {
                    $Apr += 1;
                } else if (substr($date, 5, 2) == 5) {
                    $May += 1;
                } else if (substr($date, 5, 2) == 6) {
                    $Jun += 1;
                } else if (substr($date, 5, 2) == 7) {
                    $Jul += 1;
                } else if (substr($date, 5, 2) == 8) {
                    $Aug += 1;
                } else if (substr($date, 5, 2) == 9) {
                    $Sep += 1;
                } else if (substr($date, 5, 2) == 10) {
                    $Oct += 1;
                } else if (substr($date, 5, 2) == 11) {
                    $Nov += 1;
                } else if (substr($date, 5, 2) == 12) {
                    $Dec += 1;
                }
            }
            $all_doc = count($data['arr_doc']);
            if ($all_doc != 0) {
                for ($i = 0; $i < count($data['arr_doc']); $i++) {
                    if ($data['arr_doc'][$i]->doc_type == "pdf") {
                        $all_pdf += 1;
                    } else {
                        $all_img += 1;
                    }
                }

                $pdf = $all_pdf;
                $img = $all_img;
                $all_pdf = ($all_pdf * 100) / $all_doc;
                $all_pdf = round($all_pdf);
                $all_img = ($all_img * 100) / $all_doc;
                $all_img = round($all_img);
                $data['all_pdf'] = $all_pdf;
                $data['all_img'] = $all_img;
                $data['pdf'] = $pdf;
                $data['img'] = $img;
                $data['Jan'] = $Jan;
                $data['Feb'] = $Feb;
                $data['Mar'] = $Mar;
                $data['Apr'] = $Apr;
                $data['May'] = $May;
                $data['Jun'] = $Jun;
                $data['Jul'] = $Jul;
                $data['Aug'] = $Aug;
                $data['Sep'] = $Sep;
                $data['Oct'] = $Oct;
                $data['Nov'] = $Nov;
                $data['Dec'] = $Dec;
                $this->output_sidebar_admin("Admin/v_admin_report", $data);
            } else {
                $data['all_pdf'] = $all_pdf;
                $data['all_img'] = $all_img;
                $data['pdf'] = $pdf;
                $data['img'] = $img;
                $data['Jan'] = $Jan;
                $data['Feb'] = $Feb;
                $data['Mar'] = $Mar;
                $data['Apr'] = $Apr;
                $data['May'] = $May;
                $data['Jun'] = $Jun;
                $data['Jul'] = $Jul;
                $data['Aug'] = $Aug;
                $data['Sep'] = $Sep;
                $data['Oct'] = $Oct;
                $data['Nov'] = $Nov;
                $data['Dec'] = $Dec;
                $this->output_sidebar_admin("Admin/v_admin_report", $data);
            }
        } else {
            $mem_pro_id = $this->session->userdata('mem_pro_id');
            $data['arr_member'] = $this->mqr->get_by_pro_id($mem_pro_id)->result();
            $data['arr_doc'] = $this->doc->get_by_doc_mem_id($mem_id)->result();
            $data['arr_download'] = $this->dow->get_by_mem_id($mem_id)->result();
            $all_pdf = 0;
            $all_img = 0;
            $pdf = 0;
            $img = 0;
            $Jan = 0;
            $Feb = 0;
            $Mar = 0;
            $Apr = 0;
            $May = 0;
            $Jun = 0;
            $Jul = 0;
            $Aug = 0;
            $Sep = 0;
            $Oct = 0;
            $Nov = 0;
            $Dec = 0;
            for ($i = 0; $i < count($data['arr_download']); $i++) {
                $date = $data['arr_download'][$i]->dow_datetime;


                if (substr($date, 5, 2) == 1) {
                    $Jan += 1;
                } else if (substr($date, 5, 2) == 2) {
                    $Feb += 1;
                } else if (substr($date, 5, 2) == 3) {
                    $Mar += 1;
                } else if (substr($date, 5, 2) == 4) {
                    $Apr += 1;
                } else if (substr($date, 5, 2) == 5) {
                    $May += 1;
                } else if (substr($date, 5, 2) == 6) {
                    $Jun += 1;
                } else if (substr($date, 5, 2) == 7) {
                    $Jul += 1;
                } else if (substr($date, 5, 2) == 8) {
                    $Aug += 1;
                } else if (substr($date, 5, 2) == 9) {
                    $Sep += 1;
                } else if (substr($date, 5, 2) == 10) {
                    $Oct += 1;
                } else if (substr($date, 5, 2) == 11) {
                    $Nov += 1;
                } else if (substr($date, 5, 2) == 12) {
                    $Dec += 1;
                }
            }
            $all_doc = count($data['arr_doc']);
            if ($all_doc != 0) {
                for ($i = 0; $i < count($data['arr_doc']); $i++) {
                    if ($data['arr_doc'][$i]->doc_type == "pdf") {
                        $all_pdf += 1;
                    } else {
                        $all_img += 1;
                    }
                }

                $pdf = $all_pdf;
                $img = $all_img;
                $all_pdf = ($all_pdf * 100) / $all_doc;
                $all_pdf = round($all_pdf);
                $all_img = ($all_img * 100) / $all_doc;
                $all_img = round($all_img);
                $data['all_pdf'] = $all_pdf;
                $data['all_img'] = $all_img;
                $data['pdf'] = $pdf;
                $data['img'] = $img;
                $data['Jan'] = $Jan;
                $data['Feb'] = $Feb;
                $data['Mar'] = $Mar;
                $data['Apr'] = $Apr;
                $data['May'] = $May;
                $data['Jun'] = $Jun;
                $data['Jul'] = $Jul;
                $data['Aug'] = $Aug;
                $data['Sep'] = $Sep;
                $data['Oct'] = $Oct;
                $data['Nov'] = $Nov;
                $data['Dec'] = $Dec;
                $this->output_sidebar_admin("Admin/v_admin_report", $data);
            } else {
                $data['all_pdf'] = $all_pdf;
                $data['all_img'] = $all_img;
                $data['pdf'] = $pdf;
                $data['img'] = $img;
                $data['Jan'] = $Jan;
                $data['Feb'] = $Feb;
                $data['Mar'] = $Mar;
                $data['Apr'] = $Apr;
                $data['May'] = $May;
                $data['Jun'] = $Jun;
                $data['Jul'] = $Jul;
                $data['Aug'] = $Aug;
                $data['Sep'] = $Sep;
                $data['Oct'] = $Oct;
                $data['Nov'] = $Nov;
                $data['Dec'] = $Dec;
                $this->output_sidebar_admin("Admin/v_admin_report", $data);
            }
        }
    }
}
