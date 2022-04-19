<?php

defined('BASEPATH') or exit('No direct script access allowed');

require dirname(__FILE__) . '/../DQS_controller.php';

class Member_report extends DQS_controller
{

    public function show_member_report()
    {
        $this->load->model('M_DQS_document', 'doc');
        $this->load->model('M_DQS_download', 'dow');
        $mem_id = $this->session->userdata('mem_id');
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


            if(substr($date, 5,2) == 1){
                $Jan += 1;
            }
            else if(substr($date, 5,2) == 2){
                $Feb += 1;
            }
            else if(substr($date, 5,2) == 3){
                $Mar += 1;
            }
            else if(substr($date, 5,2) == 4){
                $Apr += 1;
            }
            else if(substr($date, 5,2) == 5){
                $May += 1;
            }
            else if(substr($date, 5,2) == 6){
                $Jun += 1;
            }
            else if(substr($date, 5,2) == 7){
                $Jul += 1;
            }
            else if(substr($date, 5,2) == 8){
                $Aug += 1;
            }
            else if(substr($date, 5,2) == 9){
                $Sep += 1;
            }
            else if(substr($date, 5,2) == 10){
                $Oct += 1;
            }
            else if(substr($date, 5,2) == 11){
                $Nov += 1;
            }
            else if(substr($date, 5,2) == 12){
                $Dec += 1;
            }

        }
        $all_doc = count($data['arr_doc']);
        if($all_doc != 0){
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
        $this->output_sidebar_member("Member/v_member_report" ,$data);
        }
        else{
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
            $this->output_sidebar_member("Member/v_member_report" ,$data);
        }
    }
}
?>