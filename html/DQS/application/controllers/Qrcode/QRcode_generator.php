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
			//$this->session->unset_userdata('logo_name');
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
		public function save_qrcode(){
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

}
?>