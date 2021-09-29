<?php
/*
* Login
* Login Management
* @author Ashirawat , Krisada
* @Create Date 2564-08-05
*/
defined('BASEPATH') or exit('No direct script access allowed');

require dirname(__FILE__) . '/../DQS_controller.php';

class Member_login extends DQS_controller
{
    /*
    * show_member_login
    * Go to login
    * @input -
    * @output view
    * @author Ashirawat, Krsiada
    * @Create Date 2564-08-05
    */

    public function show_member_login()
    {
        $this->output_navbar("Member/v_member_login");
    }

    /*
    * show_member_home
    * Go to member home
    * @input -
    * @output view
    * @author Ashirawat, Krsiada
    * @Create Date 2564-08-05
    */

    public function show_member_home()
    {
        $this->output_sidebar_member("Member/v_member_home");
    }

     /*
    * member_login
    * Show screen member login
    * @input mem_username,mem_password 
    * @output view
    * @author Ashirawat, Krsiada
    * @Create Date 2564-08-05
    */
    public function login()
    {
        // get username and password from v_login.php
        $mem_username = $this->input->post('mem_username');
        $mem_password = $this->input->post('mem_password');

        // check user from database
        $obj_mem = $this->check_user($mem_username,$mem_password);

        if ($obj_mem == NULL) {
            // log in failed
            $data = [];
            $data['error'] = "Username หรือ Password ไม่ถูกต้อง";
            $data['mem_username'] = $mem_username;
            $data['mem_password'] = $mem_password;
            $this->output_navbar('Member/v_member_login', $data);
        }
        
        else {
            // log in complete
            
            // set id and name for user
            //$_SESSION['mem_username'] = $obj_mem->mem_username;
            if ($obj_mem->mem_role == 0) {
                redirect('/Member/Member_login/show_member_home');
            } 
            
            else if ($obj_mem->mem_role == 1) {
                redirect('/Admin/Admin_home/show_admin_home');
            }
            //redirect('/Member/Member_login/show_member_home');

        }

    }

    /*
    * logout
    * Go back to login
    * @input -
    * @output view
    * @author Ashirawat, Krsiada
    * @Create Date 2564-08-05
    */
    public function logout()
    {
        //session_unset();
        //session_destroy();
        redirect('Member/v_member_login');
    }

    /*
    * check_user
    * check username matches password 
    * @input mem_username,mem_password 
    * @output -
    * @author Ashirawat, Krsiada
    * @Create Date 2564-08-05
    */

    public function check_user($mem_username, $mem_password)
    {
        $this->load->model('M_DQS_login', 'mlog');
        return $this->mlog->get_by_username_password($mem_username, $mem_password)->row();
    }

    public function show_forget_password()
    {
        $this->output_navbar("Member/v_member_forget_password");
    }

    public function reset_password()
    {
        if (isset($_POST['reset_password']) && $_POST['mem_email']) {
            $emailId = $_POST['email'];
            
        }
    }
}