<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require dirname(__FILE__).'/../DQS_controller.php';

class Member_upload_file extends DQS_controller {

	public function show_member_upload_file()
	{

		$this->output("member/v_member_upload_file");
	}

	public function upload(){
			$this->session->unset_userdata('logo_name');
				/* Get the name of the uploaded file */
			$filename = $_FILES['logo']['name'];
			$n_img = date("Ymd").time().'_'.$filename;
			$this->session->set_userdata('logo_name', $n_img);
			/* Choose where to save the uploaded file */
			$location = "assets/logo/".$n_img;

			/* Save the uploaded file to the local filesystem */
			if ( move_uploaded_file($_FILES['logo']['tmp_name'], $location) ) { 
			echo 'Success'; 
			} else { 
			echo 'Failure'; 
			}

		}
		public function dowload(){
		if (isset($_GET['file'])) {
			$file = $_GET['file'];
			if (file_exists($file) && is_readable($file) && preg_match('/\.png$/',$file)) {
				header('Content-Type: application/png');
				header("Content-Disposition: attachment; filename=\"$file\"");
				readfile($file);
				}
			}
		}

		/*
		* upload file
		* upload file pdf into database 
		* @input file pdf
		* @output show QRcode
		* @author Ashirawat
		* @Create Date 2564-11-14
		*/
		public function upload_file (){//Update department into database

			$this->load->model('Da_DQS_qrcode','dqrc');
			$upload=$_FILES[''];
			if($upload != '') {   //not select file
			//โฟลเดอร์ที่จะ upload file เข้าไป 
				$path= dirname(__FILE__).'/../../../assets/pdf/fileupload_Member/';  
	
			//เอาชื่อไฟล์เก่าออกให้เหลือแต่นามสกุล
				$type = strrchr($_FILES['']['name'],".");
				
			//ตั้งชื่อไฟล์ใหม่โดยเอาเวลาไว้หน้าชื่อไฟล์เดิม
				$newname = $this->input->post('').$type;
				$path_copy=$path.$newname;
				
				$newpath = '/assets/pdf/fileupload_Member/'.$newname;
			//คัดลอกไฟล์ไปเก็บที่เว็บเซริ์ฟเวอร์
				move_uploaded_file($_FILES[''][''],$path_copy);  	
			}//if
			$this->dqrc-> = $newpath;
			$this->dqrc->insert();
			redirect('');

		}

		public function upload_file (){//Update department into database

			$upload=$_FILES[''];
			if($upload != '') {   //not select file
			//โฟลเดอร์ที่จะ upload file เข้าไป 
				$path= dirname(__FILE__).'/../../../assets/Document/fileupload/';  
	
			//เอาชื่อไฟล์เก่าออกให้เหลือแต่นามสกุล
				$type = strrchr($_FILES['']['name'],".");
				
			//ตั้งชื่อไฟล์ใหม่โดยเอาเวลาไว้หน้าชื่อไฟล์เดิม
				$newname = $this->input->post('').$type;
				$path_copy=$path.$newname;
				
				$newpath = '/assets/Doc/fileupload_Member/'.$newname;
			//คัดลอกไฟล์ไปเก็บที่เว็บเซริ์ฟเวอร์
				move_uploaded_file($_FILES[''][''],$path_copy);  	
			}//if
			$this->dmep->dp_image = $newpath;
			$this->dmep->insert();
			redirect('');


		}


}
?>