
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

    public function show_member_login()
    {
        $this->output_navbar("Member/v_member_login");
    }
    public function member_home()
    {
        redirect('/Member/Member_login/show_member_home');
    }

    public function show_member_home()
    {
        $this->output_sidebar_member("Member/v_member_home");
    }

     /*
    * member_login
    * Show screen member login
    * @input mem_username,mem_password, mem_user, 
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
            redirect('/Member/Member_login/show_member_home');

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

    public function check_user($mem_username, $mem_password)
    {
        $this->load->model('M_dqs_login', 'mlog');
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