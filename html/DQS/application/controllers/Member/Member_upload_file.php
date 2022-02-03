<?php

defined('BASEPATH') or exit('No direct script access allowed');

require dirname(__FILE__) . '/../DQS_controller.php';

class Member_upload_file extends DQS_controller
{

	public function show_member_upload_file()
	{

		$this->output_sidebar_member("Member/v_member_upload_file");
	}


	public function show_member_upload_photo()
	{

		$this->output_sidebar_member("Member/v_member_upload_photo");
	}

	public function show_member_upload_web()
	{

		$this->output_sidebar_member("Member/v_member_upload_web");
	}

	public function show_test()
	{

		$this->output("member/test_upload");
	}

	// public function update()
    // {
    //     $this->load->model('M_DQS_qrcode', 'qrc');
	// 	$data['arr_qr'] = $this->fol->get_by_id($memid)->result();
	// 	for ($i = 0; $i < count($arr_qr); $i++) {

	// 		$this->load->model('Da_DQS_qrcode','qro');
	// 		$this->qro->qr_id = $arr_qr->qr_id;
	// 		$this->qro->qr_doc_id = $arr_qr->doc_id;
	// 		$this->qro->set_id();

	// 	}
    // }

	public function upload()
	{
		$doc_name = $_POST['doc_name'];
		$this->load->model('Da_DQS_qrcode', 'dqrc');
		$this->dqrc->doc_type = "pdf";
		$this->dqrc->doc_name = $doc_name;
		$upload = $_FILES['doc_path'];
		if ($upload != '') {   //not select file
			//โฟลเดอร์ที่จะ upload file เข้าไป 
			$path = dirname(__FILE__) . '/../../../assets/pdf/fileupload_Member/';
			//เอาชื่อไฟล์เก่าออกให้เหลือแต่นามสกุล
			$type = strrchr($_FILES['doc_path']['name'], ".");

			//ตั้งชื่อไฟล์ใหม่โดยเอาเวลาไว้หน้าชื่อไฟล์เดิม
			$newname = $doc_name . $type;
			$path_copy = $path . $newname;

			$newpath = '/assets/pdf/fileupload_Member/' . $newname;
			//คัดลอกไฟล์ไปเก็บที่เว็บเซริ์ฟเวอร์
			move_uploaded_file($_FILES['doc_path']['tmp_name'], $path_copy);
		}
		$this->session->set_userdata('newpath', $newpath);
		$this->dqrc->doc_path = $newpath;
		$this->dqrc->insert_doc();
	}

	public function save_qrcode()
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
		file_put_contents("filename.jpeg", $image);

		// Sending response back to client
		echo "Done";
	}

	/*
		* upload file
		* upload file pdf into database 
		* @input file pdf
		* @output show QRcode
		* @author Ashirawat
		* @Create Date 2564-11-14
		*/
	public function upload_file()
	{ //Update department into database

		$this->load->model('Da_DQS_qrcode', 'dqrc');
		$this->dqrc->doc_name = $this->input->post('doc_name');
		$this->dqrc->doc_type = "pdf";

		$upload = $_FILES['doc_path'];
		if ($upload != '') {   //not select file
			//โฟลเดอร์ที่จะ upload file เข้าไป 
			$path = dirname(__FILE__) . '/../../../assets/users/'.$this->session->mem_username.'/'.'home/';
			

			//เอาชื่อไฟล์เก่าออกให้เหลือแต่นามสกุล
			$type = strrchr($_FILES['doc_path']['name'], ".");

			//ตั้งชื่อไฟล์ใหม่โดยเอาเวลาไว้หน้าชื่อไฟล์เดิม
			$newname = $this->input->post('doc_name') . $type;
			$path_copy = $path . $newname;

			$newpath = '/assets/users/'.$this->session->mem_username.'/'.'home/' . $newname;
			//คัดลอกไฟล์ไปเก็บที่เว็บเซริ์ฟเวอร์
			move_uploaded_file($_FILES['doc_path']['tmp_name'], $path_copy);
		} //if
		$this->dqrc->doc_path = $newpath;
		$this->dqrc->doc_mem_id = $this->session->userdata('mem_id');
		$this->dqrc->insert_doc();
	}

	public function upload_img() ///แก้
	{ //Update department into database

		$this->load->model('Da_DQS_qrcode', 'dqrc');
		$this->dqrc->doc_name = $this->input->post('doc_name');
		$this->dqrc->doc_type = "img";

		$upload = $_FILES['doc_path'];
		echo $_FILES['doc_path'];
		if ($upload != '') {   //not select file
			//addslashes(file_get_contents($_FILES['doc_path']['tmp_name']));
			//โฟลเดอร์ที่จะ upload file เข้าไป 
			$path = dirname(__FILE__) . '/../../../assets/img/fileupload_Member/';

			//เอาชื่อไฟล์เก่าออกให้เหลือแต่นามสกุล
			$type = strrchr($_FILES['doc_path']['name'], ".");

			//ตั้งชื่อไฟล์ใหม่โดยเอาเวลาไว้หน้าชื่อไฟล์เดิม
			$newname = $this->input->post('doc_name') . $type;
			$path_copy = $path . $newname;

			$newpath = '/assets/img/fileupload_Member/' . $newname;
			//คัดลอกไฟล์ไปเก็บที่เว็บเซริ์ฟเวอร์
			move_uploaded_file($_FILES['doc_path']['tmp_name'], $path_copy);
		} //if
		$this->dqrc->doc_path = $newpath;
		$this->dqrc->doc_mem_id = $this->session->userdata('mem_id');
		$this->dqrc->insert_doc();
	}

	public function save_server()
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

	public function upload_qr()
	{ //Update department into database

		$this->load->model('Da_DQS_qrcode', 'dqrc');
		$this->dqrc->qr_name = $this->input->post('doc_name');
		$this->session->set_userdata('mem_username', $mem_username);

			//โฟลเดอร์ที่จะ upload file เข้าไป 
			$path = dirname(__FILE__) . '/../../../assets/users/'.$this->session->mem_username.'/'.'home/';

			//เอาชื่อไฟล์เก่าออกให้เหลือแต่นามสกุล
			$type = ".jpeg";

			//ตั้งชื่อไฟล์ใหม่โดยเอาเวลาไว้หน้าชื่อไฟล์เดิม
			$newname = $this->input->post('doc_name') . $type;
			$path_copy = $path . $newname;

			$newpath = '/assets/users/'.$this->session->mem_username.'/'.'home/' . $newname;

		$this->dqrc->qr_path = $newpath;
		$this->session->set_userdata('newpath', $newpath);
		$this->dqrc->qr_mem_id = $this->session->userdata('mem_id');
		$this->dqrc->insert_qr();
	}
}