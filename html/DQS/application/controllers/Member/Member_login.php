<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require dirname(__FILE__).'/../DQS_controller.php';

class Member_login extends DQS_controller {

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

	// public function login(){

	// 	$this->load->model('M_dqs_login','log');
    //     $this->log->mem_username= $this->input->post('mem_username');
    //     $this->log->mem_password= $this->input->post('mem_password');
    //     $msg = 0;
    //     $data["mem"] = $this->log->check_login()->result();
    //     if (empty($data["mem"])) {
    //         $msg = 0;
    //     } else {
    //         $msg = 1;
    //         $this->add_session($data["mem"][0]->mem_id, $data["mem"][0]->mem_firstname, $data["mem"][0]->mem_lastname);
			
    //     }
	// 	echo json_encode($msg);
	// }
	public function login(){
		$mem_username = $this->input->post('mem_username');
        $mem_password = $this->input->post('mem_password');

        // check user from database
		$this->load->model('M_DQS_member','mem');
		$this->mem->mem_username =  $mem_username ;
        $data['arr_member'] = $this->mem->get_all()->result();
		
        // if ($obj_user == NULL) {
        //     // log in failed
        //     $data = [];
        //     $data['error'] = "Username หรือ Password ไม่ถูกต้อง";
        //     $data['mem_username'] = $mem_username;
        //     $data['mem_password'] = $mem_password;
        //     $this->load->view('Login/v_login', $data);
        // } else {
        //     // log in complete

        //     // set id and name for user
        //     $_SESSION['id'] = $obj_user->usr_id;
        //     $_SESSION['name'] = $obj_user->usr_name;
        //     $_SESSION['username'] = $obj_user->usr_username;
        //     $_SESSION['year_month'] = date('Y-m');
        //     $_SESSION['delete_error'] = '';
        //     $_SESSION['edit_error'] = '';
        //     $_SESSION['denied_error'] = '';
        //     $_SESSION['approved_error'] = '';
        //     $_SESSION['clear_state'] = 'true';

            // if for 4 actors
            // if ($obj_user->usr_role == 1) {
            //     $_SESSION['role'] = 'requester';
            //     redirect('Requester/Requisition_list/show_requisition_list');
            // } else if ($obj_user->usr_role == 2) {
            //     $_SESSION['role'] = 'approver';
            //     redirect('Approver/Requisition_list_approver/show_requisition_list_approver');
            // } else if ($obj_user->usr_role == 3) {
            //     $_SESSION['role'] = 'accountant';
            //     redirect('Accountant/Requisition_list_accountant/show_requisition_list_accountant');
            // } else {
            //     $_SESSION['role'] = 'admin';
            //     redirect('Admin/Project_list/show_project_list');
            // }
        //}
		foreach ($data['arr_member'] as $key => $value) {
            //  var_dump($value->ID_admin);
            //  var_dump($value->Password_admin);
			if(($mem_username == $value->mem_username || $mem_username == $value->mem_email) && $mem_password == $value->mem_password)
           	{

               //setcookie("auth",base64_encode($value->mem_username), time() + (86400 * 30), "/"); 
                 //if(isset($_COOKIE["auth"])) {
                     return redirect('Test/test_c/show2');
                    // $isLogin = [
                    //     "isAuth" => "success",
                        
                    // ];
                 }

			}
            
       // echo json_encode( $isLogin);
		redirect('Member/Member_login/show_member_login');
    }


	public function is_login()
	{

        $mem_username = $this->input->post('mem_username');
        $mem_password = $this->input->post('mem_password');
    // //  var_dump($username);
    // //  var_dump($password);
        $this->load->model('M_DQS_member','dca');
        $this->dca->mem_username =  $mem_username ;
        $data['arr_member'] = $this->dca->get_all()->result();
         
    $isLogin = [
        "isAuth" => "unsuccess",
        
    ];
        foreach ($data['arr_member'] as $key => $value) {
            //  var_dump($value->ID_admin);
            //  var_dump($value->Password_admin);
            if($mem_password == $value->mem_password){
               //setcookie("auth",base64_encode($value->mem_username), time() + (86400 * 30), "/"); 
                 //if(isset($_COOKIE["auth"])) {
                     return redirect('Test/test_c/show2');
                    // $isLogin = [
                    //     "isAuth" => "success",
                        
                    // ];
                 }
            
        }
		
  
       // echo json_encode( $isLogin);
		redirect('Member/Member_login/show_member_home');
    }
    public function logout()
    {
        if (isset($_COOKIE['auth'])) {
            unset($_COOKIE['auth']); 
            setcookie('auth', null, -1, '/'); 
            // return true;
            redirect('DQS_qrcode/QRcode_generator/show_qrcode');
        } else {
            return false;
        }
    }

	}

?>