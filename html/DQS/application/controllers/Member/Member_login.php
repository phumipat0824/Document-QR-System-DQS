<?php
/*
* Login
* Login Management
* @author Ashirawat , Krisada
* @Create Date 2564-08-05
*/
defined('BASEPATH') or exit('No direct script access allowed');
use PHPMailer\PHPMailer\PHPMailer;
require dirname(__FILE__) . '/../DQS_controller.php';
require_once dirname(__FILE__) . "/../../../mail/PHPMailer/PHPMailer.php";
require_once dirname(__FILE__) . "/../../../mail/PHPMailer/SMTP.php";
require_once dirname(__FILE__) . "/../../../mail/PHPMailer/Exception.php";

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
    * @update Date 2564-10-29
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
            $this->session->set_userdata('mem_username', $obj_mem->mem_username);
            $this->session->set_userdata('username', $obj_mem->mem_username);
            $this->session->set_userdata('mem_password', md5($mem_password));
            $this->session->set_userdata('mem_role', $obj_mem->mem_role);
            $this->session->set_userdata('old_password', $mem_password);
            $this->session->set_userdata('mem_id', $obj_mem->mem_id);
            $this->session->set_userdata('mem_pro_id', $obj_mem->mem_pro_id);
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
        session_unset();
        session_destroy();
        redirect('/Member/Member_login/show_member_login');
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
        $this->load->model('M_DQS_document', 'mlog');
        return $this->mlog->get_by_username_password($mem_username, $mem_password)->row();
    }

    public function show_forget_password()
    {
        $this->output_navbar("Member/v_member_forget_password");
    }

    public function reset_password()
    {
        $this->load->model('M_DQS_member', 'MEM');
        $mem_id = $this->input->post('mem_id');
        $mem_password = $this->input->post('mem_password');
        $this->MEM->mem_password = md5($mem_password);
        $this->MEM->mem_id = $mem_id;
		$this->MEM->update_password();
		$this->output_navbar("Member/v_member_login");
        
    }


    public function show_reset_password($user_name)
    {
        $mem_user;
        $this->load->model('M_DQS_member', 'MEM');
        $user = $this->MEM->get_all_user()->result();
        //$member_username =  $data['arr_mem_email']->mem_username;
        for ($i = 0; $i < count($user); $i++){
            $member_username = $user[$i]->mem_username;
            $member_username = md5($member_username);
            if($member_username == $user_name){
                $data["mem_id"] = $user[$i]->mem_id;
                $this->output_navbar("Member/v_member_reset_password",$data);
            }
     
           
        }
            //echo $mem_user;
        
    }



    public function check_email()
    {
        $this->load->model('M_DQS_department', 'MDD');
        $data = $this->MDD->get_member()->result();
        
        $mem_email = $this->input->post('mem_email');
        $check = 0;

        for ($i=0 ; $i<count($data);$i++){
            if($data[$i]->mem_email == $mem_email ){
                $check = 1;
            
            }
              
        }
        echo json_encode($check);
        
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

    /*
    * send_mail
    * send e-mail for reset passwolrd
    * @input email
    * @output -
    * @author Phumipat
    * @Create Date 2565-02-22
    */
    public function send_mail(){
    //use PHPMailer\PHPMailer\PHPMailer;
    
       
    if(isset($_POST['email'])) {

        $email = $_POST['email'];
        $name = "Document QR System : DQS";
        $header = "แจ้งรีเซ็ตรหัสผ่านระบบจัดเก็บเอกสารเพื่อสร้างคิวอาร์โค้ด (Document QR System : DQS)";
        //$detail  = "กดที่ลิงค์เพื่อรีเซ็ตรหัสผ่านของคุณ";

        $this->load->model('M_DQS_member', 'MDM');
        $obj_mail = $this->MDM->get_by_email($email)->result();
        $user_name = md5($obj_mail[0]->mem_username);
        $link = site_url()."/Member/Member_login/show_reset_password/" .  $user_name;
        $ftag = '<a href="';
        $ltag = '"> คลิกที่นี่</a>';
        $atag = $ftag.$link.$ltag;
        $detail = ' <div style="border: 1px solid #eeeeee;">
        <center>
            <div style="padding-top:2%">
                <img src="http://103.129.15.182/DQS/assets/image/logo_dqs.PNG" height="150" width="150">
            </div>    
        </center>
        <center style="margin-bottom:10px;">
        <h2>Document QR System : DQS</h2>
        </center>
        <br>
        <div style="margin-left: 5%;margin-bottom: 2%;">
            <a>ท่านได้ทำการแจ้งลืมรหัสผ่าน</a><br>
            <a>โปรดคลิกที่ลิงค์ดังกล่าวเพื่อตั้งรหัสผ่านใหม่</a><br>
            <a>Please click the link below to set new password </a>'
            . $atag.
            
        '</div>
        </div>';
        

        //exit(print ($user_name));
        $mail = new PHPMailer();

        // SMTP Settings
        $mail->isSMTP();
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth = true;
        $mail->Username = "info.dqs.team1@gmail.com"; // enter your email address
        $mail->Password = "Tame1@buu"; // enter your password
        $mail->Port = 465;
        $mail->SMTPSecure = "ssl";
        
        //Email Settings
        $mail->isHTML(true);
        $mail->setFrom($email, $name);
        $mail->addAddress($email); // Send to mail
        $mail->CharSet = "utf-8";
        $mail->Subject = $header;
        $mail->Body = $detail;
        

        if($mail->send()) {
            $status = "success";
            $response = "Email is sent";
        } else {
            $status = "failed";
            $response = "Something is wrong" . $mail->ErrorInfo;
        }
    
        //exit(json_encode(array("status" => $status, "response" => $response)));
        $this->output_navbar("Member/v_member_login");
    }
    
    }
}