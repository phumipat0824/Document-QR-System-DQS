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
        $obj_mem = $this->check_user($mem_username, md5($mem_password));

        if ($obj_mem == NULL) {
            // log in failed
            $data = [];
            $data['error'] = "Username หรือ Password ไม่ถูกต้อง";
            $data['mem_username'] = $mem_username;
            $data['mem_password'] = $mem_password;
            $this->output_navbar('Member/v_member_login', $data);
        } else {
            // log in complete

            // set id and name for user
            //$this->session->set_userdata('mem_username', $mem_username);
            if ($obj_mem->mem_role == 0) {
                // session_unset();
                // session_destroy();
                //$this->output_sidebar_member("Member/v_member_home");
                redirect('/Member/Member_home/show_member_home');
            } else if ($obj_mem->mem_role == 1) {
                // session_unset();
                // session_destroy();
                redirect('/Admin/Admin_home/show_Admin_home');
                //$this->output_sidebar_admin('Admin/v_admin_home');
            }
            //redirect('/Member/Member_login/show_member_home');

        }
    }
     /*
    * show_member_home
    * Go to member home
    * @input -
    * @output view
    * @author Ashirawat, Krsiada
    * @Create Date 2564-08-05
    */

    

    /*
    * show_session
    * Show session member 
    * @input -
    * @output view
    * @author Ashirawat
    * @Create Date 2564-11-10
    */

    public function show_session(){

        $arr_session = $this->session->all_userdata();
        echo '<pre>';
        print_r($arr_session);
        echo '</pre>';
    

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
        $mem_email = $this->input->post('mem_email');
        $mem_password = $this->input->post('mem_password');
        $mem_confirm = $this->input->post('mem_confirm');

        if($mem_password == NULL || $mem_confirm == NULL){
            echo $mem_email;
            echo $mem_password;
            echo $mem_confirm;
            echo json_encode(false);
        }else if($mem_password != $mem_confirm){
            echo json_encode(false);
        }else if($mem_password == $mem_confirm ){
            $this->load->model('M_DQS_member', 'MDM');
            $this->MDM->mem_email = $mem_email;
            $this->MDM->mem_password = md5($mem_password);
            $this->MDM->update_password();
            echo json_encode(true);
        }
    }


    public function show_reset_password()
    {
        $mem_email = $this->input->post('mem_email');
        $data['mem_email'] = $mem_email;
        $this->output_navbar("Member/v_member_reset_password", $data);
    }



    public function check_email()
    {
        $this->load->model('M_DQS_member', 'MDM');
        $mem_email = $this->input->post('mem_email');
        $mem_email_cut = substr($mem_email, 0, strpos($mem_email, '@'));
        $data['arr_mem_email'] = $this->MDM->get_by_email($mem_email)->result();
        $count_mem_email = count($data['arr_mem_email']);
        if ($count_mem_email == 1 || $count_mem_email >= 1) {
            echo true;
        } else {
            echo false;
        }
    }

    public function check_name()
    {
        $this->load->model('M_DQS_member', 'MDM');
        $mem_email = $this->input->post('mem_email');
        $mem_firstname = $this->input->post('mem_firstname');
        $mem_lastname = $this->input->post('mem_lastname');
        $data['arr_mem_fullname'] = $this->MDM->get_by_name($mem_email,$mem_firstname, $mem_lastname)->result();
        $count_mem_name = count($data['arr_mem_fullname']);
        if ($count_mem_name == 1 ) {
            echo true;  
        } else {
            echo false;
        }
    }
}