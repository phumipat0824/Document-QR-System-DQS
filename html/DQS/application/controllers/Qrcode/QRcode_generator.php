<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require dirname(__FILE__).'/../DQS_controller.php';

class QRcode_generator extends DQS_controller {

	public function show_qrcode()
	{

		$this->output("v_qrcode");
	}

	public function upload_logo(){
		$dir = "assets/logo/";
        // $fileImage = $dir . $n_img;
        $name_type;
        if(isset($_FILES["logo"]))
        {           
                $file_name = $_FILES['logo']['name'];
                $file_size =$_FILES['logo']['size'];
                $file_tmp =$_FILES['logo']['tmp_name'];
                $file_type=$_FILES['logo']['type']; 
                $n_img = date("Ymd").time().'_'.$file_name;
                move_uploaded_file($file_tmp,$dir.$n_img);          
        }
	}

	public function upload(){
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


}
?>