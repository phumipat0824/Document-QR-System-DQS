<?php
/*
* Show home
* show admin home
* @author Ashirawat 
* @Create Date 2564-09-23
*/
defined('BASEPATH') or exit('No direct script access allowed');

require dirname(__FILE__) . '/../DQS_controller.php';

class Admin_home extends DQS_controller
{
    /*
    * show_admin_home
    * Go to admin home
    * @input -
    * @output view
    * @author Apinya
    * @Create Date 2564-10-11
    */

    public function show_admin_home(){

    $this->output_sidebar_admin('Admin/v_admin_home');

    }

    // public function show_admin_home(){
    //     $this->load->model('M_DQS_member', 'MDM');
    //     $data['arr_member'] = $this->MDM->get_member_all()->result();
    //     $this->output_sidebar_admin('Admin/v_admin_home',$data);
    // }

    public function show_member_list(){
        // $this->load->model('M_DQS_member', 'MDM');
        // $this->load->model('M_DQS_department', 'MDD');
        // $this->load->model('M_DQS_province', 'MDP');
        // $data['arr_member'] = $this->MDM->get_member_all()->result();
        // $data['arr_department'] = $this->MDD->get_all()->result();
        // $data['arr_province'] = $this->MDP->get_all()->result();
        // $this->output_sidebar_admin('Admin/v_member_show',$data);
        $this->output_sidebar_admin('Admin/v_member_list');
    }

    
    public function delete_admin(){
        $this->load->model('M_DQS_member', 'MDM');
        $this->MDM->mem_id=$this->input->post('mem_id');
        $this->MDM->delete_member();

        // redirect('/Admin/Admin_home/show_member_list');
        
    }

    public function get_mem_list_ajax()
    {
        $this->load->model('M_DQS_department', 'MDD');
        $data['json_mem'] = $this->MDD->get_member_data()->result();
        echo json_encode($data);
    }

    public function member_show(){

        $this->load->model('M_DQS_member', 'MDM');
        $this->load->model('M_DQS_department', 'MDD');
        $this->load->model('M_DQS_province', 'MDP');

        $dept=$this->MDD->mem_dep_id=$this->input->post('dept_id');
        $province=$this->MDP->mem_pro_id=$this->input->post('pro_id');
        
        $data['arr_member'] = $this->MDM->get_by_dep_id_and_pro_id($dept, $province)->result();
        $data['arr_department'] = $this->MDD->get_all()->result();
        $data['arr_province'] = $this->MDP->get_all()->result();
        $this->output_sidebar_admin('Admin/v_member_list');
        print_r($dept);
    }


    

}