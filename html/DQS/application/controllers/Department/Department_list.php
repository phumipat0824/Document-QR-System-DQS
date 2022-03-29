<?php
/*
* Department
* Department Management
* @author Kiattisak
* @Create Date 2564-08-05
*/
defined('BASEPATH') OR exit('No direct script access allowed');

require dirname(__FILE__).'/../DQS_controller.php';

class Department_list extends DQS_controller {

	public function index()
	{
		
	}

	//  * show_department
	// 	* show Department Management View
	// 	* @input -
	// 	* @output -
	// 	* @author Kiattisak
	// 	 
	public function show_department()
	{
		$this->output_sidebar_admin('department/v_department');
	}


	//  * get_dept_list_ajax
	// 	* send JSON value of department to View
	// 	* @input -
	// 	* @output JSON
	// 	* @author Kiattisak
	public function get_dept_list_ajax()
    {
        $this->load->model('M_DQS_department', 'MDD');
		
        $data['json_dept'] = $this->MDD->get_all_by_pro_id($this->session->mem_pro_id)->result();
        echo json_encode($data);
    }
	
	
	
	//  * add_department
	// 	* add data to department 
	// 	* @input department name,department status
	// 	* @output -
	// 	* @author Kiattisak
	public function add_department()
    {
		
        $this->load->model('M_DQS_department', 'MDD');
		$this->load->model('M_DQS_station_state_of_province', 'MDSS');
		$this->MDD->dep_name = $this->input->post('dep_name');
		// echo $this->MDD->dep_name;
		// $this->MDSS->station_status = $this->input->post('station_status');
		if ($this->MDD->check_exist_name($this->session->mem_pro_id,$this->MDD->dep_name)->num_rows() == 0 && trim($this->MDD->dep_name) != "") {
			$this->MDD->insert($this->MDD->dep_name);
			// insert departmenr
			$dep_last_id=$this->MDD->get_last_id()->row();
			$this->MDSS->insert($this->session->mem_pro_id,$dep_last_id->dep_id);
			// insert station
			// redirect('/Department/Department_list/show_department');
		}
		
    }


	//  * edit_department
	// 	* edit data of department
	// 	* @input department name , status of department and id of department
	// 	* @output -
	// 	* @author Kiattisak
	public function edit_department()
    {
        $this->load->model('M_DQS_department', 'MDD');
		$this->MDD->dep_name = $this->input->post('dep_name');
		$this->MDD->dep_active = $this->input->post('dep_active');
		$this->MDD->dep_id = $this->input->post('dep_id');
		if ($this->MDD->check_exist_name($this->session->mem_pro_id,$this->MDD->dep_name)->num_rows() == 0 && trim($this->MDD->dep_name) != "") {
			$this->MDD->name_update();
			redirect('/Department/Department_list/show_department');
		}
		
    }
	
	//  * update_status
	// 	* change status of department
	// 	* @input status of department and id of department
	// 	* @output -
	// 	* @author Kiattisak
	public function update_status(){
		$this->load->model('M_DQS_department', 'MDD');
        $this->MDD->dep_id = $this->input->post('dep_id');
		$this->MDD->station_status = $this->input->post('station_status');
		$this->MDD->status_update( $this->MDD->dep_id,$this->MDD->station_status,$this->session->mem_pro_id);
	}

}

?>