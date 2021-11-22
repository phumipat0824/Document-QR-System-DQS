<?php
/*
* Show home
* show admin home
* @author Ashirawat 
* @Create Date 2564-09-23
*/
defined('BASEPATH') or exit('No direct script access allowed');

require dirname(__FILE__) . '/../DQS_controller.php';

class Admin_config extends DQS_controller
{
    /*
    * show_admin_home
    * Go to admin home
    * @input -
    * @output view
    * @author Ashirawat
    * @Create Date 2564-09-23
    */

    // public function show_admin_home()
    // {
    //     $this->output_sidebar_admin('Admin/v_admin_delete');
        

    // }
    

    public function show_admin_config(){
        $this->load->model('M_DQS_department', 'MDD');
        $data['arr_member'] = $this->MDD->get_department()->result();
        $this->output_sidebar_admin('Admin/v_admin_config', $data);
    }
    
}