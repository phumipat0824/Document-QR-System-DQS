<?php

defined('BASEPATH') or exit('No direct script access allowed');

require dirname(__FILE__) . '/../DQS_controller.php';

class Member_register extends DQS_controller
{
    public function index()
    {
        echo '<b>Hello World</b>';
        echo '<br><br>';
        echo dirname(__FILE__) . '/../DQS_controller.php';
        //$this->load->view('welcome_message');
    }

    public function show_member_register()
    {
        $this->load->model('M_DQS_member', 'mmem');
        
        $this->load->model('M_DQS_province', 'MDP');
        $this->load->model('M_DQS_department', 'MDD');
        $data['arr_department'] = $this->MDD->get_all()->result();
        $data['arr_province'] = $this->MDP->get_all()->result();
        


        
        $this->output_navbar('Member/v_member_register', $data);
        
    }
    public function check_email()
    {
        $this->load->model('M_DQS_department', 'MDD');
        $data = $this->MDD->get_member()->result();
        // $this->load->model('M_DQS_member','mmem');
        // $data['arr_member'] = $this->mmem->get_member()->result();
        $mem_email = $this->input->post('mem_email');
        $check = 0;

        for ($i=0 ; $i<count($data);$i++){
            if($data[$i]->mem_email == $mem_email ){
                $check = 1;
                // echo json_encode($check);
            }
                // echo $data[$i]->mem_email;
        }
        echo json_encode($check);
        
        // print_r($data);

    }


    public function show_member_confirm()
    {
        
        $this->output_navbar('Member/v_member_confirm');
    }


    public function get_dept_list_ajax()
    {
        $this->load->model('M_DQS_station_state_of_province', 'MSS');
        $mem_pro_ID = $this->input->post('mem_pro_ID');
        $data['json_station'] = $this->MSS->get_station_by_id($mem_pro_ID)->result();
        echo json_encode($data);
    }
/*
* insert_member
* insert member
* @input -
* @output insert member
* @author Ratchaneekorn,Pongthorn
* @Create Date 2565-2-16
*/
    public function insert_member()
    {          
        $this->load->model('M_DQS_folder', 'folder');
        $this->load->model('M_DQS_member', 'fmem');
        $this->load->model('M_DQS_member', 'dmem');
       
        $this->load->model('M_DQS_station_state_of_province', 'dssp');
        $this->dmem->mem_pref_id = $this->session->userdata('mem_pref_id');
        $this->dmem->mem_firstname = $this->session->userdata('mem_firstname');
        $this->dmem->mem_lastname = $this->session->userdata('mem_lastname');
        $this->dmem->mem_email = $this->session->userdata('mem_email');
        $this->dmem->mem_username = $this->session->userdata('mem_username');
        $this->dmem->mem_password = md5($this->session->userdata('mem_password'));
        $this->dmem->mem_role = $this->session->userdata('mem_role');
        $this->dmem->mem_dep_id = $this->session->userdata('mem_dep_id');
        $this->dmem->mem_pro_id = $this->session->userdata('mem_province_id');
        
                $this->dmem->insert(); 
                
                $this->dssp->update_status( $this->session->userdata('mem_province_id'),$this->session->userdata('mem_dep_id'));
           
                
                $data = $this->fmem->get_by_username_folder($this->session->userdata('mem_username'))->result();
                $newpath = './assets/user/' . $this->session->userdata('mem_username');
                   
                $get_address = './assets/user/';
                $create_folder_user = $this->session->userdata('mem_username');
                $path_new = $get_address . '/';
                if (!file_exists($path_new . $create_folder_user)) {
                    @mkdir($path_new . $create_folder_user, 0777);
                }
                 //$path_in_user
                $create_folde_home = 'Home';
                $path_new = $newpath . '/';
                if (!file_exists($path_new . 'Home')) {
                    @mkdir($path_new . 'Home', 0777);
                }
                $create_folder_service = 'เอกสารราชการ';
                
                $path_new = $newpath . '/';
                if (!file_exists($path_new . 'เอกสารราชการ')) {
                    @mkdir($path_new . 'เอกสารราชการ', 0777);
                }
                $create_folde_meeting = 'เอกสารการประชุม';
                $path_new = $newpath . '/';
                if (!file_exists($path_new . 'เอกสารการประชุม')) {
                    @mkdir($path_new . 'เอกสารการประชุม', 0777);
                }
                for($i = 0 ; $i < 2;$i++){
                        if($i == 0){
                            $this->folder->fol_name = 'เอกสารราชการ';
                            $this->folder->fol_location = $path_new.'เอกสารราชการ';
                            $this->folder->fol_mem_id = $data[0]->mem_id;
                            $this->folder->fol_location_id = 0;
                            $this->folder->insert();
                        }
                        else{
                            $this->folder->fol_name = 'เอกสารการประชุม';
                            $this->folder->fol_location = $path_new.'เอกสารการประชุม';
                            $this->folder->fol_mem_id = $data[0]->mem_id ;
                            $this->folder->fol_location_id = 0;
                            $this->folder->insert();
                        }
                }
               
                $this->output_navbar("Member/v_member_login"); //เรียกกลับมาหน้านี้อีกครั้งอยู่หน้าเดียวกันใส่ชื่อได้เลย
    }
    
    
    public function insert_session()
    {
        
        $this->load->model('M_DQS_province', 'MDP');
        $this->load->model('M_DQS_department', 'MDD');
        //session
        
        
        $this->session->set_userdata('mem_firstname', $this->input->post('mem_firstname'));
        $this->session->set_userdata('mem_lastname', $this->input->post('mem_lastname'));
        $this->session->set_userdata('mem_email', $this->input->post('mem_email'));
        $this->session->set_userdata('mem_password', $this->input->post('mem_password'));
        $this->session->set_userdata('mem_dep_id', $this->input->post('mem_dep_id'));
        $this->session->set_userdata('mem_pref_id', $this->input->post('mem_pref_id'));
        $this->session->set_userdata('mem_province_id', $this->input->post('mem_province_id'));
        $this->session->set_userdata('mem_role', $this->input->post('mem_role'));
        $pro_id = $this->input->post('mem_province_id');
        $data['obj_province'] = $this->MDP->get_by_id($pro_id)->row();

        
        $pro_name =  $data['obj_province']->pro_name;
        $pro_short =  $data['obj_province']->pro_short;

        $this->session->set_userdata('pro_name', $pro_name);
        
        $dep_id = $this->input->post('mem_dep_id');
        $data['obj_department'] = $this->MDD->get_by_id($dep_id)->row();

        $dep_name = $data['obj_department']->dep_name;
        $dep_id = $this->input->post('mem_dep_id');
        $this->session->set_userdata('dep_name', $dep_name);
        $this->session->set_userdata('pro_name', $pro_name);

        $username = $pro_short . str_pad($dep_id, 3, "0", STR_PAD_LEFT);
        
        $this->session->set_userdata('mem_username', $username);

        $this->output_navbar('Member/v_member_confirm');
        // redirect('Member/Member_register/show_member_confirm');
        //ที่อยู่
    }


    public function check_dep_id_pro_id($mem_dep_id, $mem_pro_id)
    {
        $this->load->model('M_DQS_register', 'mlog');
        return $this->mlog->get_by_dep_id_and_pro_id($mem_dep_id, $mem_pro_id)->row();
                  
    }
    public function register()
    {
        // get username and password from v_login.php
        $mem_dep_id = $this->input->post('mem_dep_id');
        $mem_pro_id = $this->input->post('mem_pro_id');
        // $this->load->model('M_DQS_province', 'MDP');
        // $this->load->model('M_DQS_department', 'MDD');

        // $pro_id = $this->input->post('mem_province_id');
        // $data['obj_province'] = $this->MDP->get_by_id($pro_id)->row();
        // $dep_id = $this->input->post('mem_department_id');
        // $data['obj_fepartment'] = $this->MDP->get_by_id($dep_id)->row();


        // check user from database
        $obj_mem = $this->check_dep_id_pro_id($mem_dep_id, $mem_pro_id);

        if ($obj_mem != NULL) {
                // log in failed
            $data['$mem_dep_id'] = $mem_dep_id;
            $data['mem_pro_id'] = $mem_pro_id;
                $this->output_navbar('Member/Member_register/insert_session', $data);
        } else {
                $this->output_navbar('Member/Member_register/show_member_register');
        }


        // if ($pro_id !== $data['obj_province']  || ($dep_id !== $data['obj_department']) {
        //     // log in failed
        //     $data = [];
        //     $data['error'] = "Username หรือ Password ไม่ถูกต้อง";
        //     $data['$mem_dep_id'] = $mem_dep_id;
        //     $data['mem_pro_id'] = $mem_pro_id;
        //     $this->output_navbar('Member/v_member_register', $data);
        // } else {
        //     // log in complete

        //     // set id and name for user
        //     $this->session->set_userdata('mem_username', $mem_username);
        //     if ($obj_mem->mem_role == 0) {
        //         // session_unset();
        //         // session_destroy();
        //         //$this->output_sidebar_member("Member/v_member_home");
        //         redirect('/Member/Member_home/show_member_home');
        //     } else if ($obj_mem->mem_role == 1) {
        //         // session_unset();
        //         // session_destroy();
        //         redirect('/Admin/Admin_home/show_Admin_home');
        //         //$this->output_sidebar_admin('Admin/v_admin_home');
        //     }
        //     //redirect('/Member/Member_login/show_member_home');

        // }
    }

}



