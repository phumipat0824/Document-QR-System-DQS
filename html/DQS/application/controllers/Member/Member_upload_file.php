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

	public function show_member_upload_file_in_floder($fol_location_id){

		$this->load->model('M_DQS_folder', 'fol');
		$this->load->model('M_DQS_login', 'qrc');
		$memid = $this->session->userdata('mem_id');
		$this->session->set_userdata('fol_location_id', $fol_location_id);
		$path_folder = $this->fol->get_by_id_fol($fol_location_id)->result();
		$data['arr_fol'] = $this->fol->get_by_member_id($memid, $fol_location_id,)->result();
		$data['arr_qr'] = $this->qrc->get_by_id_folder($memid)->result();
		$data['arr_folder'] = $this->fol->get_all()->result();
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
		$data['path_loc'] = $path_folder;
		$this->output_sidebar_member("Member/v_member_upload_file_in_floder", $data);
	}
	/*
	* upload file
	* upload file pdf into database and server
	* @input file pdf file name file type path
	* @output file path
	* @author Ashirawat
	* @Create Date 2564-11-14
	*/

	public function upload_file_in_floder()
	{ //Update department into database

		$this->load->model('M_DQS_qrcode', 'dqrc');
		$this->dqrc->doc_name = $this->input->post('doc_name');
		$user = $this->session->userdata('mem_username');
		$fol_location_id = $this->input->post('fol_location_id');
		$fol_id = $this->session->userdata('fol_location_id');
		$this->session->set_userdata('username', $user);
		$this->dqrc->doc_fol_id = $fol_id;
		$this->dqrc->doc_type = "pdf";
		$fol_location_id = substr($fol_location_id, 1);

		$upload = $_FILES['doc_path'];
		if ($upload != '') {   //not select file
			//โฟลเดอร์ที่จะ upload file เข้าไป
			$path = dirname(__FILE__) . '/../../../assets/user/'.$this->session->userdata('username').'/'.$fol_location_id.'/';
			

			//เอาชื่อไฟล์เก่าออกให้เหลือแต่นามสกุล
			$type = strrchr($_FILES['doc_path']['name'], ".");

			//ตั้งชื่อไฟล์ใหม่โดยเอาเวลาไว้หน้าชื่อไฟล์เดิม
			$newname = $this->input->post('doc_name') . $type;
			$path_copy = $path . $newname;
			$newpath = '/assets/user/'.$this->session->userdata('username').'/'.$fol_location_id.'/' . $newname;
			//คัดลอกไฟล์ไปเก็บที่เว็บเซริ์ฟเวอร์
				move_uploaded_file($_FILES['doc_path']['tmp_name'], $path_copy);
			}

			$this->dqrc->doc_path = $newpath;
			$this->dqrc->doc_mem_id = $this->session->userdata('mem_id');
			$this->dqrc->insert_document_in_folder();
			$this->get_id_document();
			
	}

	public function upload_file()
	{ //Update department into database

		$this->load->model('M_DQS_qrcode', 'dqrc');
		$this->dqrc->doc_name = $this->input->post('doc_name');
		$user = $this->session->userdata('mem_username');
		$this->session->set_userdata('username', $user);
		$this->dqrc->doc_type = "pdf";

		$upload = $_FILES['doc_path'];
		if ($upload != '') {   //not select file
			//โฟลเดอร์ที่จะ upload file เข้าไป 
			$path = dirname(__FILE__) . '/../../../assets/user/'.$this->session->userdata('username').'/'.'home/';
			

			//เอาชื่อไฟล์เก่าออกให้เหลือแต่นามสกุล
			$type = strrchr($_FILES['doc_path']['name'], ".");

			//ตั้งชื่อไฟล์ใหม่โดยเอาเวลาไว้หน้าชื่อไฟล์เดิม
			$newname = $this->input->post('doc_name') . $type;
			$path_copy = $path . $newname;
			$newpath = '/assets/user/'.$this->session->userdata('username').'/'.'home/' . $newname;
			//คัดลอกไฟล์ไปเก็บที่เว็บเซริ์ฟเวอร์
				move_uploaded_file($_FILES['doc_path']['tmp_name'], $path_copy);
			}

			$this->dqrc->doc_path = $newpath;
			$this->dqrc->doc_mem_id = $this->session->userdata('mem_id');
			$this->dqrc->insert_document();
			$this->get_id_document();
			
	}

	public function get_id_document()
    {
        $this->load->model('M_DQS_qrcode', 'mqrc');	
        $obj_doc = $this->mqrc->get_id()->row();
		$data = site_url().$obj_doc->doc_path;
		echo json_encode($data);	
    }

	public function check_name()
	{
		$this->load->model('M_DQS_qrcode','mqrc');
		$doc_name = $this->input->post('doc_name');
		$obj_name= $this->mqrc->checkname($doc_name)->row();
		if(empty($obj_name)){
			echo json_encode(true);
		}else{
			echo json_encode(false);
		}
		
	}

	public function check_name2()
	{
		$this->load->model('M_DQS_qrcode','mqrc');
		$doc_name = $this->input->post('doc_nameimg');
		$obj_name= $this->mqrc->checkname($doc_name)->row();
		if(empty($obj_name)){
			echo json_encode(true);
		}else{
			echo json_encode(false);
		}
		
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
		$user = $this->session->userdata('mem_username');
		$this->session->set_userdata('username', $user);
		$this->dqrc->doc_type = "img";

		$upload = $_FILES['doc_pathimg'];
		echo $_FILES['doc_pathimg'];
		if ($upload != '') {   //not select file
			//addslashes(file_get_contents($_FILES['doc_path']['tmp_name']));
			//โฟลเดอร์ที่จะ upload file เข้าไป 
			$path = dirname(__FILE__) . '/../../../assets/user/'.$this->session->userdata('username').'/'.'home/';
			//เอาชื่อไฟล์เก่าออกให้เหลือแต่นามสกุล
			$type = strrchr($_FILES['doc_pathimg']['name'], ".");

			//ตั้งชื่อไฟล์ใหม่โดยเอาเวลาไว้หน้าชื่อไฟล์เดิม
			$newname = $this->input->post('doc_nameimg') . $type;
			$path_copy = $path . $newname;

			$newpath = '/assets/user/'.$this->session->userdata('username').'/'.'home/' . $newname;
			//คัดลอกไฟล์ไปเก็บที่เว็บเซริ์ฟเวอร์
			move_uploaded_file($_FILES['doc_pathimg']['tmp_name'], $path_copy);
		} //if

		$this->dqrc->doc_path = $newpath;
		$this->dqrc->doc_mem_id = $this->session->userdata('mem_id');
		$this->dqrc->insert_document();
		$this->get_id_image();
	}

	public function upload_image_in_folder()
	{ //Update department into database

		$this->load->model('Da_DQS_qrcode', 'dqrc');
		$this->dqrc->doc_name = $this->input->post('doc_nameimg');
		$user = $this->session->userdata('mem_username');
		$fol_location_id = $this->input->post('fol_location_id2');
		$fol_id = $this->session->userdata('fol_location_id');
		$this->session->set_userdata('username', $user);
		$this->dqrc->doc_fol_id = $fol_id;
		$this->dqrc->doc_type = "img";
		$fol_location_id = substr($fol_location_id, 1);

		$upload = $_FILES['doc_pathimg'];
		echo $_FILES['doc_pathimg'];
		if ($upload != '') {   //not select file
			//addslashes(file_get_contents($_FILES['doc_path']['tmp_name']));
			//โฟลเดอร์ที่จะ upload file เข้าไป 
			$path = dirname(__FILE__) . '/../../../assets/user/'.$this->session->userdata('username').'/'.$fol_location_id.'/';
			//เอาชื่อไฟล์เก่าออกให้เหลือแต่นามสกุล
			$type = strrchr($_FILES['doc_pathimg']['name'], ".");

			//ตั้งชื่อไฟล์ใหม่โดยเอาเวลาไว้หน้าชื่อไฟล์เดิม
			$newname = $this->input->post('doc_nameimg') . $type;
			$path_copy = $path . $newname;

			$newpath = '/assets/user/'.$this->session->userdata('username').'/'.$fol_location_id.'/' . $newname;
			//คัดลอกไฟล์ไปเก็บที่เว็บเซริ์ฟเวอร์
			move_uploaded_file($_FILES['doc_pathimg']['tmp_name'], $path_copy);
		} //if

		$this->dqrc->doc_path = $newpath;
		$this->dqrc->doc_mem_id = $this->session->userdata('mem_id');
		$this->dqrc->insert_document_in_folder();
		$this->get_id_image();
	}

	public function get_id_image()
    {
        $this->load->model('M_DQS_qrcode', 'mqri');	
        $obj_doc = $this->mqri->get_id()->row();
		$data = site_url().$obj_doc->doc_path;
		echo json_encode($data);	
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
			$path = dirname(__FILE__) . '/../../../assets/user/'.$this->session->userdata('username').'/'.'home/Qrcode/';

			//เอาชื่อไฟล์เก่าออกให้เหลือแต่นามสกุล
			$type = ".jpeg";

			//ตั้งชื่อไฟล์ใหม่โดยเอาเวลาไว้หน้าชื่อไฟล์เดิม
			$newname = $this->input->post('doc_name') . $type;
			$path_copy = $path . $newname;

			$newpath = '/assets/user/'.$this->session->userdata('username').'/'.'home/Qrcode/' . $newname;

		$this->dqrc->qr_path = $newpath;
		$this->session->set_userdata('newpath', $newpath);
		$this->dqrc->qr_mem_id = $this->session->userdata('mem_id');
		$this->dqrc->insert_qrcode();
	}

	public function upload_qrcode_in_floder()
	{ //Update department into database
		$this->load->model('M_DQS_qrcode', 'dqrc');
		$this->dqrc->qr_name = $this->input->post('doc_name');
		$user = $this->session->userdata('mem_username');
		$fol_location_id = $this->input->post('fol_location_id');
		$fol_id = $this->session->userdata('fol_location_id');
		$this->session->set_userdata('username', $user);
		$this->dqrc->doc_fol_id = $fol_id;
		$fol_location_id = substr($fol_location_id, 1);

			//โฟลเดอร์ที่จะ upload file เข้าไป 
			$path = dirname(__FILE__) . '/../../../assets/user/'.$this->session->userdata('username').'/'.$fol_location_id.'/'.'Qrcode/';

			//เอาชื่อไฟล์เก่าออกให้เหลือแต่นามสกุล
			$type = ".jpeg";

			//ตั้งชื่อไฟล์ใหม่โดยเอาเวลาไว้หน้าชื่อไฟล์เดิม
			$newname = $this->input->post('doc_name') . $type;
			$path_copy = $path . $newname;

			$newpath = '/assets/user/'.$this->session->userdata('username').'/'.$fol_location_id.'/'.'Qrcode/' . $newname;

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
			$path = dirname(__FILE__) . '/../../../assets/user/'.$this->session->userdata('username').'/'.'home/Qrcode/';

			//เอาชื่อไฟล์เก่าออกให้เหลือแต่นามสกุล
			$type = ".jpeg";

			//ตั้งชื่อไฟล์ใหม่โดยเอาเวลาไว้หน้าชื่อไฟล์เดิม
			$newname = $this->input->post('doc_nameimg') . $type;
			$path_copy = $path . $newname;

			$newpath = '/assets/user/'.$this->session->userdata('username').'/'.'home/Qrcode/' . $newname;

		$this->dqrc->qr_path = $newpath;
		$this->session->set_userdata('newpath', $newpath);
		$this->dqrc->qr_mem_id = $this->session->userdata('mem_id');
		$this->dqrc->insert_qrcode();
	}

	public function upload_qrcode_image_in_folder()
	{ //Update department into database

		$this->load->model('Da_DQS_qrcode', 'dqrc');
		$this->dqrc->qr_name = $this->input->post('doc_nameimg');
		$user = $this->session->userdata('mem_username');
		$fol_location_id = $this->input->post('fol_location_id2');
		$fol_id = $this->session->userdata('fol_location_id');
		$this->session->set_userdata('username', $user);
		$this->dqrc->doc_fol_id = $fol_id;
		$fol_location_id = substr($fol_location_id, 1);

			//โฟลเดอร์ที่จะ upload file เข้าไป 
			$path = dirname(__FILE__) . '/../../../assets/user/'.$this->session->userdata('username').'/'.$fol_location_id.'/Qrcode/';

			//เอาชื่อไฟล์เก่าออกให้เหลือแต่นามสกุล
			$type = ".jpeg";

			//ตั้งชื่อไฟล์ใหม่โดยเอาเวลาไว้หน้าชื่อไฟล์เดิม
			$newname = $this->input->post('doc_nameimg') . $type;
			$path_copy = $path . $newname;

			$newpath = '/assets/user/'.$this->session->userdata('username').'/'.$fol_location_id.'/Qrcode/' . $newname;

		$this->dqrc->qr_path = $newpath;
		$this->session->set_userdata('newpath', $newpath);
		$this->dqrc->qr_mem_id = $this->session->userdata('mem_id');
		$this->dqrc->insert_qrcode();
	}
	
}