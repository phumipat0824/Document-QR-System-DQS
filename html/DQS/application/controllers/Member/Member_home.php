<?php

defined('BASEPATH') or exit('No direct script access allowed');

require dirname(__FILE__) . '/../DQS_controller.php';

class Member_home extends DQS_controller
{

	public function show_member_home()
	{
		$this->load->model('M_DQS_folder', 'fol');
		// $this->load->model('M_DQS_qrcode', 'qrc');
		$memid = $this->session->userdata('mem_id');
		$data['arr_fol'] = $this->fol->get_by_id($memid)->result();
		// $data['arr_qr'] = $this->qrc->get_by_id($memid)->result();
		$this->output_sidebar_member("Member/v_member_home", $data);
	}

	public function show_in_folder($fol_location_id)
	{
		$this->load->model('M_DQS_folder', 'fol');
		$memid = $this->session->userdata('mem_id');
		$this->session->set_userdata('fol_location_id', $fol_location_id);
		$data['arr_fol'] = $this->fol->get_by_member_id($memid, $fol_location_id)->result();

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
		if ($this->Mfol->check_exist_name($this->Mfol->fol_name) == 0 && trim($this->Mfol->fol_name) != "") {
			$this->Mfol->update();
		}
		redirect('Member/Member_home/show_in_folder/' . $this->input->post('fol_location_id'));
		// echo $this->input->post('fol_name');
		// echo $this->input->post('fol_id');
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


		$newpath = './assets/user/' . $this->session->userdata('mem_username') . '/'. $folder_name.'/';

		rmdir($newpath);/* Delete folder by using rmdir function */
		
		redirect('/Member/Member_home/show_member_home');
		$this->load->model('M_DQS_folder', 'fol');
		$memid = $this->session->userdata('mem_id');
		$data['arr_fol'] = $this->fol->get_by_id($memid)->result();
		$this->output_sidebar_member("Member/v_member_home", $data);
		echo $this->input->post('fol_name');
		// // echo $this->input->post('fol_id');
		
	}
}
