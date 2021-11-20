<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require dirname(__FILE__).'/../DQS_controller.php';

class QRcode_generator extends DQS_controller {

	public function show_qrcode()
	{
		//$this->session->unset_userdata('logo_name');
		$this->output("v_qrcode");
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

}
?>