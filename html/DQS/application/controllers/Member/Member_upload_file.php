<?php

defined('BASEPATH') or exit('No direct script access allowed');

require dirname(__FILE__) . '/../DQS_controller.php';

	/*
	* Member_upload_file
	* @author Ashirawat
	* @Create Date 2564-11-14
	*/

class Member_upload_file extends DQS_controller
{

	/*
	* show_member_upload_file
	* show display upload file
	* @input -
	* @output display upload file
	* @author Ashirawat
	* @Create Date 2564-11-14
	*/
	
	public function show_member_upload_file()
	{

		$this->output_sidebar_member("Member/v_member_upload_file");
	}

	/*
	* upload file
	* upload file pdf into database and server
	* @input file pdf file name file type path
	* @output file path
	* @author Ashirawat
	* @Create Date 2564-11-14
	*/

	public function upload_file()
	{ //Update department into database

		$this->load->model('M_DQS_qrcode', 'dqrc');
		$this->dqrc->doc_name = $this->input->post('doc_name');
		$this->dqrc->doc_type = "pdf";

		$upload = $_FILES['doc_path'];
		if ($upload != '') {   //not select file
			//โฟลเดอร์ที่จะ upload file เข้าไป 
			$path = dirname(__FILE__) . '/../../../assets/users/'.$this->session->userdata('username').'/'.'home/';
			

			//เอาชื่อไฟล์เก่าออกให้เหลือแต่นามสกุล
			$type = strrchr($_FILES['doc_path']['name'], ".");

			//ตั้งชื่อไฟล์ใหม่โดยเอาเวลาไว้หน้าชื่อไฟล์เดิม
			$newname = $this->input->post('doc_name') . $type;
			$path_copy = $path . $newname;

			//$newpath = '/assets/users/'.$this->session->userdata('username').'/'.'home/' . $newname;
			//คัดลอกไฟล์ไปเก็บที่เว็บเซริ์ฟเวอร์
			
			//move_uploaded_file($_FILES['doc_path']['tmp_name'], $path_copy);
			if ($this->dqrc->check_exist_name($this->dqrc->doc_name) == 0 && trim($this->dqrc->doc_name) != ""){
				$newpath = '/assets/users/'.$this->session->userdata('username').'/'.'home/' . $newname;
				move_uploaded_file($_FILES['doc_path']['tmp_name'], $path_copy);
				$this->session->set_userdata('new', $newpath);
				$this->dqrc->doc_path = $newpath;
				$this->dqrc->doc_mem_id = $this->session->userdata('mem_id');
				$this->dqrc->insert_doc();
			}
		} //if
		$this->session->set_userdata('new', $newpath);
		$this->dqrc->doc_path = $newpath;
		$this->dqrc->doc_mem_id = $this->session->userdata('mem_id');
		$this->dqrc->insert_document();
		
	}

	/*
	* upload_image
	* upload file image into database and server
	* @input file image file name file type path
	* @output file path
	* @author Ashirawat
	* @Create Date 2564-11-19
	*/

	public function upload_image()
	{ //Update department into database

		$this->load->model('Da_DQS_qrcode', 'dqrc');
		$this->dqrc->doc_name = $this->input->post('doc_nameimg');
		$this->dqrc->doc_type = "img";

		$upload = $_FILES['doc_pathimg'];
		echo $_FILES['doc_pathimg'];
		if ($upload != '') {   //not select file
			//addslashes(file_get_contents($_FILES['doc_path']['tmp_name']));
			//โฟลเดอร์ที่จะ upload file เข้าไป 
			$path = dirname(__FILE__) . '/../../../assets/users/'.$this->session->userdata('username').'/'.'home/';
			//เอาชื่อไฟล์เก่าออกให้เหลือแต่นามสกุล
			$type = strrchr($_FILES['doc_pathimg']['name'], ".");

			//ตั้งชื่อไฟล์ใหม่โดยเอาเวลาไว้หน้าชื่อไฟล์เดิม
			$newname = $this->input->post('doc_nameimg') . $type;
			$path_copy = $path . $newname;

			$newpath = '/assets/users/'.$this->session->userdata('username').'/'.'home/' . $newname;
			//คัดลอกไฟล์ไปเก็บที่เว็บเซริ์ฟเวอร์
			move_uploaded_file($_FILES['doc_pathimg']['tmp_name'], $path_copy);
		} //if
		$this->session->set_userdata('new2', $newpath);
		$this->dqrc->doc_path = $newpath;
		$this->dqrc->doc_mem_id = $this->session->userdata('mem_id');
		$this->dqrc->insert_document();
	}

	/*
	* save_qrcode_image
	* upload file qrcode into server
	* @input file image qrcode file path
	* @output -
	* @author Ashirawat
	* @Create Date 2565-01-04
	*/

	public function save_qrcode_image()
	{
		// Get the incoming image data
		$image = $_POST["image"];
		
		// Remove image/jpeg from left side of image data
		// and get the remaining part
		$image = explode(";", $image)[1];

		// Remove base64 from left side of image data
		// and get the remaining part
		$image = explode(",", $image)[1];

		// Replace all spaces with plus sign (helpful for larger images)
		$image = str_replace(" ", "+", $image);

		// Convert back from base64
		$image = base64_decode($image);
		
		// Save the image as filename.jpeg
		file_put_contents(dirname(__FILE__) . '/../../..'.$this->session->userdata('newpath'), $image);

		// Sending response back to client
		echo "Done";
	}

	/*
	* upload_qrcode_file
	* upload file qrcode into database and server
	* @input file image file name file type path
	* @output file path
	* @author Ashirawat, Jerasak
	* @Create Date 2564-11-19
	*/

	public function upload_qrcode_file()
	{ //Update department into database

		$this->load->model('M_DQS_qrcode', 'dqrc');
		$this->dqrc->qr_name = $this->input->post('doc_name');
		$user = $this->session->userdata('mem_username');
		$this->session->set_userdata('username', $user);

			//โฟลเดอร์ที่จะ upload file เข้าไป 
			$path = dirname(__FILE__) . '/../../../assets/users/'.$this->session->userdata('username').'/'.'home/';

			//เอาชื่อไฟล์เก่าออกให้เหลือแต่นามสกุล
			$type = ".jpeg";

			//ตั้งชื่อไฟล์ใหม่โดยเอาเวลาไว้หน้าชื่อไฟล์เดิม
			$newname = $this->input->post('doc_name') . $type;
			$path_copy = $path . $newname;

			$newpath = '/assets/users/'.$this->session->userdata('username').'/'.'home/' . $newname;

		$this->dqrc->qr_path = $newpath;
		$this->session->set_userdata('newpath', $newpath);
		$this->dqrc->qr_mem_id = $this->session->userdata('mem_id');
		$this->dqrc->insert_qrcode();
	}

	/*
	* upload_qrcode_image
	* upload file qrcode into database and server
	* @input file image file name file type path
	* @output file path
	* @author Ashirawat, Jerasak
	* @Create Date 2565-02-03
	*/

	public function upload_qrcode_image()
	{ //Update department into database

		$this->load->model('Da_DQS_qrcode', 'dqrc');
		$this->dqrc->qr_name = $this->input->post('doc_nameimg');
		$user = $this->session->userdata('mem_username');
		$this->session->set_userdata('username', $user);

			//โฟลเดอร์ที่จะ upload file เข้าไป 
			$path = dirname(__FILE__) . '/../../../assets/users/'.$this->session->userdata('username').'/'.'home/';

			//เอาชื่อไฟล์เก่าออกให้เหลือแต่นามสกุล
			$type = ".jpeg";

			//ตั้งชื่อไฟล์ใหม่โดยเอาเวลาไว้หน้าชื่อไฟล์เดิม
			$newname = $this->input->post('doc_nameimg') . $type;
			$path_copy = $path . $newname;

			$newpath = '/assets/users/'.$this->session->userdata('username').'/'.'home/' . $newname;

		$this->dqrc->qr_path = $newpath;
		$this->session->set_userdata('newpath', $newpath);
		$this->dqrc->qr_mem_id = $this->session->userdata('mem_id');
		$this->dqrc->insert_qrcode();
	}
	
}