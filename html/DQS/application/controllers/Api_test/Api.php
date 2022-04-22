<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require dirname(__FILE__).'/../DQS_controller.php';

class Api extends DQS_controller {

	public function index()
	{
		if ($_SERVER['REQUEST_METHOD'] == "GET") {
			$this->load->model('M_DQS_member', 'MDM');
			$data = $this->MDM->get_all()->result();
			echo json_encode($data);
		}else if ($_SERVER['REQUEST_METHOD'] == "POST") {
			$this->load->model('M_DQS_member', 'MDM');
			$data = $this->MDM->get_all()->result();
			echo json_encode($data);
		}else{
			http_response_code(405);
		}
		
	}

	

}



?>