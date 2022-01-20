<?php

defined('BASEPATH') or exit('No direct script access allowed');

require dirname(__FILE__) . '/../DQS_controller.php';

class Member_home extends DQS_controller
{

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
	public function show_in_folder($fol_location_id)
	{
		$this->load->model('M_DQS_folder', 'fol');
		$this->load->model('M_DQS_login', 'qrc');
		$memid = $this->session->userdata('mem_id');
		$this->session->set_userdata('fol_location_id', $fol_location_id);
		$data['arr_fol'] = $this->fol->get_by_member_id($memid, $fol_location_id)->result();
		$data['arr_folder'] = $this->fol->get_all()->result();

		if ($data['arr_fol'] == null) {
			$this->output_sidebar_member("Member/v_member_home_in_folder", $data);
		} else {
			$this->output_sidebar_member("Member/v_member_home", $data);
		}
	}

	public function get_folder_ajax()
	{
		$this->load->model('M_DQS_folder', 'fol');
		$this->fol->fol_name = $this->input->post('fol_name');
		if ($this->fol->check_exist_name($this->fol->fol_name) == 0 && trim($this->fol->fol_name) != "") {
			$checkname = 0;
		} else {
			$checkname = 1;
		}
		echo json_encode($checkname);
	}

	public function create_folder()
	{
		$this->load->model('M_DQS_folder', 'folder');
		$this->folder->fol_name = $this->input->post('fol_name');
		$this->folder->fol_mem_id = $this->session->userdata('mem_id');
		if ($this->input->post('fol_location_id') == 0) {
			$newpath = './assets/user/' . $this->session->userdata('mem_username') . '/';
		} else {
			$get_name_location = $this->folder->get_by_id_fol($this->input->post('fol_location_id'))->result();
			$newpath = $get_name_location[0]->fol_location . '/';
		}
		$folder_name = $_POST['fol_name'];

		//if
		if (!file_exists($newpath . $folder_name))/* Check folder exists or not */ {
			@mkdir($newpath . $folder_name, 0777);/* Create folder by using mkdir function */

			//ตั้งชื่อไฟล์ใหม่โดยเอาเวลาไว้หน้าชื่อไฟล์เดิม
			$newname = $this->input->post('fol_name');
			$newpath = $newpath . $newname;

			$this->folder->fol_location = $newpath;
		}
		$get_qrcode = 'Qrcode';
		$path_new = $newpath . '/';
		if (!file_exists($path_new . 'Qrcode')) {
			@mkdir($path_new . 'Qrcode', 0777);
		}
		$this->folder->fol_location_id = $this->input->post('fol_location_id');
		$this->folder->insert();
		redirect('Member/Member_home/show_in_folder/' . $this->input->post('fol_location_id'));
	}

	function update_folder()
	{
		$this->load->model('M_DQS_folder', 'Mfol');

		$this->Mfol->fol_name = $this->input->post('fol_name');
		$this->Mfol->fol_id = $this->input->post('fol_id');
		$fol_location_id = $this->input->post('fol_location_id');
		$obj_fol = $this->Mfol->get_by_id_fol($this->input->post('fol_id'))->result();
		// print_r($obj_fol);

		if ($this->input->post('fol_location_id') == 0) {
			$newpath = './assets/user/' . $this->session->userdata('mem_username') . '/';
		} else {
			$get_name_location = $this->folder->get_by_id_fol($this->input->post('fol_location_id'))->result();
			$newpath = $get_name_location[0]->fol_location . '/';
		}
		//ตั้งชื่อไฟล์ใหม่โดยเอาเวลาไว้หน้าชื่อไฟล์เดิม
		$newname = $this->input->post('fol_name');
		$newpath = $newpath . $newname;
		$this->Mfol->fol_location = $newpath;

		if ($this->Mfol->check_exist_name($this->Mfol->fol_name) == 0 && trim($this->Mfol->fol_name) != "") {
			$this->Mfol->update();
		}
		
		$obj_newfol = $this->Mfol->get_by_id_fol($this->input->post('fol_id'))->result();
		// print_r($obj_newfol);

		rename($obj_fol[0]->fol_location , $obj_newfol[0]->fol_location );
		
		
		
		redirect('Member/Member_home/show_in_folder/' . $this->input->post('fol_location_id'));
		// echo $this->input->post('fol_name');
		// echo $this->input->post('fol_id');
		// print_r(Mfol);
	}
	
	function delete_folder()
	{
		$this->load->model('M_DQS_folder', 'folder');

		$fol_id = $this->input->post('fol_id');
		// $fol_name = $this->input->post('fol_name');
		$fol_location_id = $this->input->post('fol_location_id');

		$fol_name = $this->folder->get_by_id_fol($fol_id)->result();
		$folder_name = $fol_name[0]->fol_name;
		$this->folder->delete($fol_id);



		$newpath = './assets/user/' . $this->session->userdata('mem_username') . '/'. $folder_name ;
		$new_path = base_url().$newpath;

		if(file_exists($newpath)){
			$di = new RecursiveDirectoryIterator($newpath, FilesystemIterator::SKIP_DOTS);
			$ri = new RecursiveIteratorIterator($di, RecursiveIteratorIterator::CHILD_FIRST);
			foreach ( $ri as $file ) {
				$file->isDir() ?  rmdir($file) : unlink($file);
			}
		}

		rmdir($newpath);/* Delete folder by using rmdir function */
		
		redirect('/Member/Member_home/show_member_home');

		
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