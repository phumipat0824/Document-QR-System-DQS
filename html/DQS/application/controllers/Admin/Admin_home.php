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

    

    // public function show_admin_home(){
    //     $this->load->model('M_DQS_member', 'MDM');
    //     $data['arr_member'] = $this->MDM->get_member_all()->result();
    //     $this->output_sidebar_admin('Admin/v_admin_home',$data);
    // }

    public function show_admin_home(){
        $this->load->model('M_DQS_member', 'MDM');
        $data['arr_member'] = $this->MDM->get_member_all()->result();
        $this->output_sidebar_admin('Admin/v_admin_home',$data);
    }

    public function delete_admin(){
        $this->load->model('M_DQS_member', 'MDM');
        $this->MDM->mem_id = $this->input->post('mem_id');
		$this->MDM->delete_member();
        redirect('/Admin/Admin_home/show_admin_home');
        
    }

}