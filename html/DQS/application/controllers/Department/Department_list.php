<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require dirname(__FILE__).'/../DQS_controller.php';

class Department_list extends DQS_controller {

	public function index()
	{
		// $this->load->model('M_DQS_department', 'dept');
		// $pudata['arr_dept'] = $this->dept->get_all()->result();
		// $this->output_sidebar_admin('department/v_department');
	}

	public function show_department()
	{
		$this->output_sidebar_admin('department/v_department');
	}


	public function get_dept_list_ajax()
    {
        $this->load->model('M_DQS_department', 'dept');
        $data['json_dept'] = $this->dept->get_all()->result();
        echo json_encode($data);
    }



}


?>