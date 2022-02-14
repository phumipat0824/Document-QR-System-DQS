<?php

/*
* Member_home
* @author Pongthorn,Onticha,Chanyapat
* @Create Date 2565-11-19
*/

defined('BASEPATH') or exit('No direct script access allowed');

require dirname(__FILE__) . '/../DQS_controller.php';
/*
* Member_home
* show member home
* @author pongthorn
* @Create Date 2565-01-02
*/
class Member_home extends DQS_controller
{
/*
* show_member_home()
* show  member home
* @input -
* @output member home
* @author pongthorn
* @Create Date 2564-12-05
*/
    public function show_member_home()
    {
        $this->load->model('M_DQS_folder', 'fol');
		$this->load->model('M_DQS_login', 'qrc');
		$memid = $this->session->userdata('mem_id');
		$data['arr_fol'] = $this->fol->get_by_id($memid)->result();
		$data['arr_qr'] = $this->qrc->get_by_id($memid)->result();
		$data['arr_folder'] = $this->fol->get_all()->result();
		$data['path_fol'] = array('@');
        $this->output_sidebar_member("Member/v_member_home",$data);
    }
/*
* show_in_folder()
* show  folder
* @input -
* @output show folder
* @author pongthorn
* @Create Date 2564-12-10
*/
	public function show_in_folder($fol_location_id)
	{
		$this->load->model('M_DQS_folder', 'fol');
		$this->load->model('M_DQS_login', 'qrc');
		$memid = $this->session->userdata('mem_id');
		$this->session->set_userdata('fol_location_id', $fol_location_id);
		$path_folder = $this->fol->get_by_id_fol($fol_location_id)->result();
		$data['arr_fol'] = $this->fol->get_by_member_id($memid, $fol_location_id,)->result();
		$data['arr_qr'] = $this->qrc->get_by_id($memid)->result();
		$path_location =  $path_folder[0]->fol_location ; //เช็คค่า ที่อยู่ใน data base
		$sub_folder = substr($path_location, 21 ).'/'; // sub string เอาแต่ location ชือของ folder
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

		if ($data['arr_fol'] == null) {
			$this->output_sidebar_member("Member/v_member_home_in_folder", $data);
		} else {
			$this->output_sidebar_member("Member/v_member_home", $data);
		}
	}

	

	function move_folder() 
	{
		$this->load->model('Da_DQS_folder','folder');
		$this->load->model('M_DQS_folder','Mfol');
		$this->folder->fol_location_id = $this->input->post('fol_location_id');
		$this->folder->fol_id = $this->input->post('fol_id');
		$this->folder->fol_name = $this->input->post('fol_name');
		
        $obj_fol = $this->Mfol->get_by_id_fol($this->input->post('fol_id'))->result();
		// print_r($obj_fol);
		
		// $arr_folder = $this->input->post('fol_location_id');
		
		// $arr_folder_explode = explode('|', $arr_folder);
        // $this->folder->fol_location_id = $arr_folder_explode[0];
        // $new_name = $arr_folder_explode[1];

		$get_name_location = $this->Mfol->get_by_id_fol($this->input->post('fol_location_id'))->result();
		
		if($this->folder->fol_location != $get_name_location[0]->fol_location){
			$newpath = $get_name_location[0]->fol_location . '/' . $this->folder->fol_name;
			$this->folder->fol_location = $newpath;
			$this->folder->move();
		}

		$obj_newfol = $this->Mfol->get_by_id_fol($this->input->post('fol_id'))->result();
		// print_r($obj_newfol);

		rename($obj_fol[0]->fol_location , $obj_newfol[0]->fol_location );
		
		redirect('Member/Member_home/show_member_home');
	}
}