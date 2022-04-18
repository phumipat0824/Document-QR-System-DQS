<?php

defined('BASEPATH') or exit('No direct script access allowed');

require dirname(__FILE__) . '/../DQS_controller.php';

class Member_report extends DQS_controller
{

    public function show_member_report()
    {
        $this->load->model('M_DQS_document', 'doc');
        $mem_id = $this->session->userdata('mem_id');
        $data['arr_doc'] = $this->doc->get_by_doc_mem_id($mem_id)->result();
        $all_pdf = 0;
        $all_img = 0;
        $pdf = 0;
        $img = 0;
        $all_doc = count($data['arr_doc']);
        for ($i = 0; $i < count($data['arr_doc']); $i++) {
            if($data['arr_doc'][$i]->doc_type == "pdf"){
                $all_pdf += 1;
            }
            else{
                $all_img += 1;
            }
        }       
        $pdf = $all_pdf;
        $img = $all_img;
        $all_pdf = ($all_pdf*100)/$all_doc;
        $all_pdf = round($all_pdf);
        $all_img = ($all_img*100)/$all_doc;
        $all_img = round($all_img);
        $data['all_pdf'] = $all_pdf;
        $data['all_img'] = $all_img;
        $data['pdf'] = $pdf;
        $data['img'] = $img;
        $this->output_sidebar_member("Member/v_member_report" ,$data);
    }
}
?>