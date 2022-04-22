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

    /*
	* 
	* show_member_register()
    * show member register
	* @input -
	* @output data
	* @author Ratchaneekorn
	* @Create Date 2564-09-01
    */
    public function show_member_register()
    {
        $this->load->model('M_DQS_member', 'mmem');
        
        $this->load->model('M_DQS_province', 'MDP');
        $this->load->model('M_DQS_department', 'MDD');
        $data['arr_department'] = $this->MDD->get_all()->result();
        $data['arr_province'] = $this->MDP->get_all()->result();
        
        $this->output_navbar('/Member/v_member_register', $data);
        
    }

      /*
	* 
	* check_email()
    * check email
	* @input -
	* @output check
	* @author Ratchaneekorn
	* @Create Date 2565-02-15
    */
    public function check_email()
    {
        $this->load->model('M_DQS_department', 'MDD');
        $data = $this->MDD->get_member()->result();
        // $this->load->model('M_DQS_member','mmem');
        // $data['arr_member'] = $this->mmem->get_member()->result();
        $mem_email = $this->input->post('mem_email');
        $check = 0;

        for ($i=0 ; $i<count($data);$i++){
            if($data[$i]->mem_email == $mem_email ){
                $check = 1;
            
            }
              
        }
        echo json_encode($check);

    }

    public function check_status()
    {
        $this->load->model('M_DQS_station_state_of_province', 'MSS');
        $this->load->model('M_DQS_member', 'mmem');
        $data = $this->MSS->get_all()->result();
        $data2 = $this->MSS->get_all()->result();
        // $this->load->model('M_DQS_member','mmem');
        // $data['arr_member'] = $this->mmem->get_member()->result();
        $mem_pro_id = $this->input->post('mem_pro_id');
        $mem_dep_id = $this->input->post('mem_dep_id');
        

        for ($i=0 ; $i<count($data);$i++){
            if($data[$i]->mem_pro_id == $mem_pro_id ){
                if($data2[$i]->mem_dep_id == $mem_dep_id ){
                    $check = 1;
                }
                
            
            }
            $check = 0;
              
        }
        echo json_encode($check);

    }
      /*
	* 
	* show_member_confirm()
    * show member confirm
	* @input -
	* @output member confirm
	* @author Ratchaneekorn
	* @Create Date 2565-02-15
    */
    public function show_member_confirm()
    {
        
        $this->output_navbar('/Member/v_member_confirm');
    }
      /*
	* get_dept_list_ajax()
    * get dept list ajax
	* @input -
	* @output data
	* @author Ratchaneekorn
	* @Create Date 2565-01-30
    */
    public function get_dept_list_ajax()
    {
        $this->load->model('M_DQS_station_state_of_province', 'MSS');
        $mem_pro_list = $this->input->post('mem_pro_list');
        $data['json_station'] = $this->MSS->get_station_by_id($mem_pro_list)->result();
        echo json_encode($data);
    }
/*
* insert_member()
* insert member
* @input -
* @output insert member
* @author Ratchaneekorn,Pongthorn
* @Create Date 2565-2-16
*/
public function insert_member()
{          
    $this->load->model('M_DQS_folder', 'folder');
    $this->load->model('M_DQS_member', 'fmem');
    $this->load->model('M_DQS_member', 'dmem');
   
    $this->load->model('M_DQS_station_state_of_province', 'dssp');
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
            
            $this->dssp->update_status( $this->session->userdata('mem_province_id'),$this->session->userdata('mem_dep_id'));
       
            
            $data = $this->fmem->get_by_username_folder($this->session->userdata('mem_username'))->result();
            $newpath = './assets/user/' . $this->session->userdata('mem_username');
            $path_in_fol_home = $newpath . '/Home'.'/';  
            $path_in_fol_service = $newpath . '/เอกสารราชการ'.'/';
            $path_in_fol_meeting = $newpath . '/เอกสารการประชุม'.'/';

            $get_address = './assets/user/';
            $create_folder_user = $this->session->userdata('mem_username');
            $path_new = $get_address . '/';
            if (!file_exists($path_new . $create_folder_user)) {
                @mkdir($path_new . $create_folder_user, 0777);
            }
             //$path_in_user
            $create_folde_home = 'Home';
            $path_new = $newpath . '/';
            if (!file_exists($path_new . 'Home')) {
                @mkdir($path_new . 'Home', 0777);
            }
            $create_folde_qrcode = 'Qrcode';
            $path_new = $path_in_fol_home . '/';
            if (!file_exists($path_new . 'Qrcode')) {
                @mkdir($path_new . 'Qrcode', 0777);
            }
            $create_folder_service = 'เอกสารราชการ';
            
            $path_new = $newpath . '/';
            if (!file_exists($path_new . 'เอกสารราชการ')) {
                @mkdir($path_new . 'เอกสารราชการ', 0777);
            }
            $create_folde_qrcode = 'Qrcode';
            $path_new = $path_in_fol_service . '/';
            if (!file_exists($path_new . 'Qrcode')) {
                @mkdir($path_new . 'Qrcode', 0777);
            }
            $create_folde_meeting = 'เอกสารการประชุม';
            $path_new = $newpath . '/';
            if (!file_exists($path_new . 'เอกสารการประชุม')) {
                @mkdir($path_new . 'เอกสารการประชุม', 0777);
            }
            $create_folde_qrcode = 'Qrcode';
            $path_new = $path_in_fol_meeting . '/';
            if (!file_exists($path_new . 'Qrcode')) {
                @mkdir($path_new . 'Qrcode', 0777);
            }
            for($i = 0 ; $i < 2;$i++){
                    if($i == 0){
                        
                        $this->folder->fol_name = 'เอกสารราชการ';
                        $this->folder->fol_location = $newpath . '/เอกสารราชการ';
                        $this->folder->fol_mem_id = $data[0]->mem_id;
                        $this->folder->fol_location_id = 0;
                        $this->folder->insert();
                    }
                    else{
                        $this->folder->fol_name = 'เอกสารการประชุม';
                        $this->folder->fol_location = $newpath . '/เอกสารการประชุม';
                        $this->folder->fol_mem_id = $data[0]->mem_id ;
                        $this->folder->fol_location_id = 0;
                        $this->folder->insert();
                    }
            }       
               
                $this->output_navbar("/Member/v_member_login"); //เรียกกลับมาหน้านี้อีกครั้งอยู่หน้าเดียวกันใส่ชื่อได้เลย
    }
    
    /*
    * insert_session()
    * insert session
    * @input -
    * @output insert session
    * @author Ratchaneekorn
    * @Create Date 2565-2-16
    */
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

        $this->output_navbar('/Member/v_member_confirm');
        // redirect('Member/Member_register/show_member_confirm');
        //ที่อยู่
    }




}



