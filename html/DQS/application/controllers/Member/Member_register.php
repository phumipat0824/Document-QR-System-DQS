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
        
        $this->load->model('M_DQS_province', 'MDP');
        $this->load->model('M_DQS_department', 'MDD');
        $data['arr_department'] = $this->MDD->get_all()->result();
        $data['arr_province'] = $this->MDP->get_all()->result();
        $this->output_navbar('Member/v_member_register', $data);
  
    }


    public function show_member_confirm()
    {
        $this->output_navbar('Member/v_member_confirm');
    }


   

    public function insert_member()
    {          
        $this->load->model('Da_DQS_member', 'dmem');
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

        if ($obj_mem == NULL) {
                // log in failed
            $data = [];
            $data['error'] = "Username หรือ Password ไม่ถูกต้อง";
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
