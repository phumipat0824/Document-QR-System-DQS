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

	public function show_department()
	{
		$this->output_sidebar_admin('department/v_department');
	}


	public function get_dept_list_ajax()
    {
        $this->load->model('M_DQS_department', 'MDD');
        $data['json_dept'] = $this->MDD->get_all()->result();
        echo json_encode($data);
    }

	public function add_department()
    {
        $this->load->model('M_DQS_department', 'MDD');
		$this->MDD->dep_name = $this->input->post('dep_name');
		$this->MDD->dep_active = $this->input->post('dep_active');
		if ($this->MDD->check_exist_name($this->MDD->dep_name) == 0 && trim($this->MDD->dep_name) != "") {
			$this->MDD->insert();
			redirect('/department/department_list/show_department');
		}
		
    }

	public function edit_department()
    {
        $this->load->model('M_DQS_department', 'MDD');
		$this->MDD->dep_name = $this->input->post('dep_name');
		$this->MDD->dep_active = $this->input->post('dep_active');
		$this->MDD->dep_id = $this->input->post('dep_id');
		if ($this->MDD->check_exist_name($this->MDD->dep_name) == 0 && trim($this->MDD->dep_name) != "") {
			$this->MDD->name_update();
			redirect('/department/department_list/show_department');
		}
		
    }
	
	
	public function update_status(){
		$this->load->model('M_DQS_department', 'MDD');
        $this->MDD->dep_id = $this->input->post('dep_id');
		$this->MDD->dep_active = $this->input->post('dep_active');
		$this->MDD->status_update( $this->MDD->dep_id,$this->MDD->dep_active);
	}

}

?>