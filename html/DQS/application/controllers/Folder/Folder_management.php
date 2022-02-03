<?php

/*
* management folder
* @author Pongthorn,Onticha
* @Create Date 2565-13-01
*/
defined('BASEPATH') OR exit('No direct script access allowed');

require dirname(__FILE__).'/../DQS_controller.php';

class Folder_management extends DQS_controller {

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
	
    public function insert_folder() // สร้างโฟลเดอร์
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
		

		rename($obj_fol[0]->fol_location , $obj_newfol[0]->fol_location );
		
		redirect('Member/Member_home/show_in_folder/' . $this->input->post('fol_location_id'));
	
	}
	
	function delete_folder()
	{
		$this->load->model('M_DQS_folder', 'folder');

		$fol_id = $this->input->post('fol_id');
		
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
    


}
?>