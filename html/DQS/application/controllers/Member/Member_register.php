<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require dirname(__FILE__).'/../DQS_controller.php';

class Member_register extends DQS_controller {
 public function index()
 {
        echo '<b>Hello World</b>';
        echo '<br><br>';
        echo dirname(__FILE__).'/../DQS_controller.php';
        //$this->load->view('welcome_message');
    }
    
    public function show_member_register()
    {
        $this->output_navbar('member/v_member_register');
    }


    public function show_member_confirm()
    {
        $this->output_navbar('member/v_member_confirm');
    }


    // public function test_parameter($a,$b=null)
    // {
    //     echo $a;
    //     echo '<br>';
    //     var_dump($b);
    //     print_r($b);
        
    // }

    public function insert_member()
    {
   
        $this->load->model('Da_DQS_member','dmem');
        $this->dmem->mem_emp_id = $this->input->post('mem_emp_id');
        $this->dmem->mem_firstname = $this->input->post('mem_firstname');
        $this->dmem->mem_lastname = $this->input->post('mem_lastname');
        $this->dmem->mem_email = $this->input->post('mem_email');
        $this->dmem->mem_password = $this->input->post('mem_password');
        $this->dmem->mem_dep_id = $this->input->post('mem_dep_id');
        $this->dmem->mem_province = $this->input->post('mem_province');

        $this->dmem->insert();

        // redirect('Member/Member_register/show_member_confirm');//เรียกกลับมาหน้านี้อีกครั้งอยู่หน้าเดียวกันใส่ชื่อได้เลย
    }

    public function insert_session()
    {
        //session
        $this->session->set_userdata('mem_emp_id', $this->input->post('mem_emp_id'));
        $this->session->set_userdata('mem_firstname', $this->input->post('mem_firstname'));
        $this->session->set_userdata('mem_lastname', $this->input->post('mem_lastname'));
        $this->session->set_userdata('mem_email', $this->input->post('mem_email'));
        $this->session->set_userdata('mem_password', $this->input->post('mem_password'));
        $this->session->set_userdata('dep_name', $this->input->post('dep_name'));       
        $this->session->set_userdata('pro_name', $this->input->post('pro_name'));

        redirect('Member/Member_register/show_member_confirm');
        //ที่อยู่
    }

    // public function insert_appellant()
    // {
    //     //session
    //     $this->session->set_userdata('ID_ssn', $this->input->post('ID_ssn'));
    //     $this->session->set_userdata('Mem_firstname', $this->input->post('Mem_firstname'));
    //     $this->session->set_userdata('Mem_lastname', $this->input->post('Mem_lastname'));
    //     $this->session->set_userdata('mem_email', $this->input->post('mem_email'));
    //     $this->session->set_userdata('mem_password', $this->input->post('mem_password'));
    //     $this->session->set_userdata('mem_dep_id', $this->input->post('mem_dep_id'));
    //     //ที่อยู่
    // }
}