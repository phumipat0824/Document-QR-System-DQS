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

    public function show_admin_home()
    {
        $this->load->model('M_DQS_folder', 'fol');
        $this->load->model('M_DQS_document', 'qrc');
        $memid = $this->session->userdata('mem_id');
        $data['arr_fol'] = $this->fol->get_by_id($memid)->result();
        $data['arr_qr'] = $this->qrc->get_by_id($memid)->result();
        $data['arr_folder'] = $this->fol->get_all()->result();
        $folder = $this->fol->get_all()->result();
        $data['path_fol'] = array('@');

        $this->output_sidebar_admin('Admin/v_admin_home',$data);
    }

    // public function show_admin_home(){
    //     $this->load->model('M_DQS_member', 'MDM');
    //     $data['arr_member'] = $this->MDM->get_member_all()->result();
    //     $this->output_sidebar_admin('Admin/v_admin_home',$data);
    // }

    public function show_admin_in_folder($fol_location_id){
        $this->load->model('M_DQS_folder', 'fol');
		$this->load->model('M_DQS_document', 'qrc');
		$memid = $this->session->userdata('mem_id');
		$this->session->set_userdata('fol_location_id', $fol_location_id);
		$path_folder = $this->fol->get_by_id_fol($fol_location_id)->result();
		$this->session->set_userdata('fol_id', $path_folder[0]->fol_id);
		$data['arr_fol'] = $this->fol->get_by_member_id($memid, $fol_location_id,)->result();
		$data['arr_qr'] = $this->qrc->get_by_id_folder($memid)->result();
		$data['arr_folder'] = $this->fol->get_all()->result();
		$path_location =  $path_folder[0]->fol_location ; //เช็คค่า ที่อยู่ใน data base
		$sub_folder = substr($path_location, 23 ).'/'; // sub string เอาแต่ location ชือของ folder
		$this->session->set_userdata('path', $sub_folder);
		$get_sub_folder = ' '.$sub_folder;
		$sub_path_folder = strpos($sub_folder,'/'); // sub pos แยกตัว '/' ออกมาแต่ละชื่อ
		$show_path_folder = substr($sub_folder,$sub_path_folder);
		$arr = array();
       
		do{
			$sub_path_folder = strpos($get_sub_folder,'/'); 	
			$sub_path_folder = $sub_path_folder + 1;
			$new_sub_folder = substr($get_sub_folder, 0, $sub_path_folder);
			$get_sub_folder = substr($get_sub_folder,$sub_path_folder);
			$real_path_folder = substr($new_sub_folder,0,-1);
			array_push($arr,$real_path_folder);		
			
		}while(strpos($get_sub_folder,'/') != null);
       
		$data['path_fol'] = $arr;
		$data['path_loc'] = $path_folder;
		if ($data['arr_fol'] == null) {
			$this->output_sidebar_admin("Admin/v_admin_home_in_folder", $data);
		} else {
			$this->output_sidebar_admin("Admin/v_admin_home", $data);
		}
    }
    public function show_member_list()
    {
        // $this->load->model('M_DQS_member', 'MDM');
        // $this->load->model('M_DQS_department', 'MDD');
        // $this->load->model('M_DQS_province', 'MDP');
        // $data['arr_member'] = $this->MDM->get_member_all()->result();
        // $data['arr_department'] = $this->MDD->get_all()->result();
        // $data['arr_province'] = $this->MDP->get_all()->result();
        // $this->output_sidebar_admin('Admin/v_member_show',$data);
        $this->output_sidebar_admin('Admin/v_member_list');
    }


    public function delete_admin()
    {
        $this->load->model('M_DQS_member', 'MDM');
        $this->MDM->mem_id = $this->input->post('mem_id');
        $this->MDM->delete_member();

        // redirect('/Admin/Admin_home/show_member_list');

    }

    public function get_mem_list_ajax()
    {
        $this->load->model('M_DQS_department', 'MDD');
        $pro_id = $this->session->userdata('mem_pro_id');
        $mem_id = $this->session->userdata('mem_id');
        $data['json_mem'] = $this->MDD->get_member_data($pro_id, $mem_id)->result();
        echo json_encode($data);
    }

    public function member_show()
    {

        $this->load->model('M_DQS_member', 'MDM');
        $this->load->model('M_DQS_department', 'MDD');
        $this->load->model('M_DQS_province', 'MDP');

        $dept = $this->MDD->mem_dep_id = $this->input->post('dept_id');
        $province = $this->MDP->mem_pro_id = $this->input->post('pro_id');

        $data['arr_member'] = $this->MDM->get_by_dep_id_and_pro_id($dept, $province)->result();
        $data['arr_department'] = $this->MDD->get_all()->result();
        $data['arr_province'] = $this->MDP->get_all()->result();
        $this->output_sidebar_admin('Admin/v_member_list');
        print_r($dept);
    }


    public function delete_file(){
        $this->load->model('M_DQS_document','MDD');
        $path = substr($this->input->post('doc_path'),1);
        unlink(getcwd().$path);
        $this->MDD->doc_id = $this->input->post('doc_id');
        $data['qr'] = $this->MDD->get_by_qr_id($this->MDD->doc_id)->result();
        // $data['doc'] = $this->MDD->get_by_doc($this->MDD->doc_id)->result();
        $qr_id = $data['qr'][0]->qr_id;
        $path_qr = substr($data['qr'][0]->qr_path,1);
        unlink(getcwd().$path_qr);
        $this->MDD->delete_qr_file($qr_id);
        $this->MDD->delete_file();

        if($this->session->userdata('mem_role') == 1){
            if($this->input->post('doc_fol_id') != 0){
                redirect('Admin/Admin_home/show_admin_in_folder/' . $this->input->post('doc_fol_id'));
            }
            else{
                redirect('Admin/Admin_home/show_admin_home/');
            }
        }else{
            if($this->input->post('doc_fol_id') != 0){
                redirect('Member/Member_home/show_in_folder/' . $this->input->post('doc_fol_id'));
            }
            else{
                redirect('Member/Member_home/show_member_home/');
            }
        }
        // redirect('/Admin/Admin_home/show_admin_home');


    }

    function delete_file_folder()
    {
        $this->load->model('M_DQS_document','MDD');
		$path = substr($this->input->post('doc_path'),1);
		unlink(getcwd().$path);
		$this->MDD->doc_id = $this->input->post('doc_id');
		$data['qr'] = $this->MDD->get_by_qr_id($this->MDD->doc_id)->result();
		$qr_id = $data['qr'][0]->qr_id;
		$path_qr = substr($data['qr'][0]->qr_path,1);
		unlink(getcwd().$path_qr);
        $this->MDD->delete_qr_file($qr_id);
        $this->MDD->delete_file();

        redirect('/Admin/Admin_home/show_admin_in_folder/'.$this->input->post('fol_id'));
    }
    /*
	* update_document()
	* update document name
	* @input doc_name
	* @output update doc_name
	* @author Onticha
	* @Create Date 2565-03-21
	*/
	public function update_qr_file(){
        $this->load->model('M_DQS_qrcode','MDQ');
		$this->load->model('M_DQS_document','MDD');
		$qr_id = $this->input->post('qr_id');
		
		$this->MDQ->qr_name = $this->input->post('qr_name');
		$this->MDQ->qr_id = $this->input->post('qr_id');

		$this->MDD->doc_name = $this->input->post('qr_name');


		$obj_qr = $this->MDQ->get_by_qr_id($qr_id)->result();
		$obj_doc = $this->MDD->get_by_doc_id($obj_qr[0]->qr_doc_id)->result();
		$this->MDD->doc_id = $obj_qr[0]->qr_doc_id;
		$doc_fol_id = $obj_doc[0]->doc_fol_id;
		$get_sub_qr = $obj_qr[0]->qr_path;
		$arr = array();
		$i = 0;

		$path_qr = "";


		do{
			$sub_path_qr = strpos($get_sub_qr,'/'); 	
			$sub_path_qr = $sub_path_qr + 1;
			$new_sub_qr = substr($get_sub_qr, 0, $sub_path_qr);
			$get_sub_qr = substr($get_sub_qr,$sub_path_qr);
			$real_path_qr = substr($new_sub_qr,0,-1);
			array_push($arr,$real_path_qr);
			$i++;
			if($i != 1){
				$path_qr = $path_qr."/".$real_path_qr;		
			}
			
		}while(strpos($get_sub_qr,'/') != null);

		$path_qr = ".".$path_qr."/".$this->input->post('qr_name').".jpeg";
		$this->MDQ->qr_path = $path_qr;

// Edit  Document
		$get_sub_doc = $obj_doc[0]->doc_path;
		$arr = array();
		$i = 0;
		$path_doc = "";
		
		do{
			$sub_path_doc = strpos($get_sub_doc,'/'); 	
			$sub_path_doc = $sub_path_doc + 1;
			$new_sub_doc = substr($get_sub_doc, 0, $sub_path_doc);
			$get_sub_doc = substr($get_sub_doc,$sub_path_doc);
			$real_path_doc = substr($new_sub_doc,0,-1);
			array_push($arr,$real_path_doc);
			$i++;
			if($i != 1){
				$path_doc = $path_doc."/".$real_path_doc;		
			}
			
		}while(strpos($get_sub_doc,'/') != null);

		if(strpos($obj_doc[0]->doc_path,'.jpeg',0)>1){
			$path_doc = ".".$path_doc."/".$this->input->post('qr_name').".jpeg";
		}else if(strpos($obj_doc[0]->doc_path,'.pdf',0)>1){
			$path_doc = ".".$path_doc."/".$this->input->post('qr_name').".pdf";
		}else if(strpos($obj_doc[0]->doc_path,'.png',0)>1){
			$path_doc = ".".$path_doc."/".$this->input->post('qr_name').".png";
		}
		
		$this->MDD->doc_path = $path_doc;

		
	

		$get_sub_doc = $obj_doc[0]->doc_path;
		$arr = array();
		$i = 0;

	

		if ($this->MDQ->check_exist_name($this->MDQ->qr_name) == 0 && trim($this->MDQ->qr_name) != "") {
			$this->MDQ->update_qr_file();

			rename($obj_qr[0]->qr_path , $path_qr);
		

		
		}

	// Document
		if ($this->MDD->check_exist_name($this->input->post("qr_name")) == 0 && trim($this->input->post("qr_name")) != "") {
			$this->MDD->update_doc_file();

			rename($obj_doc[0]->doc_path , $path_doc);


		
		}
		
		if($this->session->userdata('mem_role') == 1){
			if($this->input->post('doc_fol_id') != 0){
				redirect('Admin/Admin_home/show_admin_in_folder/' . $this->input->post('doc_fol_id'));
			}
			else{
				redirect('Admin/Admin_home/show_admin_home/');
			}
		}else{
			if($doc_fol_id != 0){
				redirect('Member/Member_home/show_in_folder/' . $this->input->post('doc_fol_id'));
				// echo $doc_fol_id;
			}
			else{
				redirect('Member/Member_home/show_member_home/');
				// echo $doc_fol_id;
			}
		}
   }
}