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
        $this->load->model('M_DQS_department', 'MDD');
        $data['json_dept'] = $this->MDD->get_all()->result();
        echo json_encode($data);
    }

	public function add_department()
    {
        $this->load->model('M_DQS_department', 'MDD');
		$this->MDD->dep_name = $this->input->post('dep_name');
		$this->MDD->dep_active = $this->input->post('dep_active');
		if (!$this->MDD->check_exist_name($this->MDD->dep_name)) {
			$this->MDD->insert();
			redirect('/department/department_list/show_department');
		}else{
			echo "
			<script>
				alert('ข้อมูลซ้ำในระบบหรือไม่กรอกข้อมูล กรุณากรอกใหม่');
				window.location.href='show_department';
			</script>";
			
		}
    }

	
	// public function check_dept_name(){
	// 	$this->load->model('M_DQS_department', 'MDD');
	// 	$this->MDD->dep_name = $this->input->post('dep_name');
    //     $data['json_check_dept'] = $this->dept->check_exist_name($this->MDD->dep_name)->row();
    //     echo json_encode($data);
	// }
	
	public function update_status(){
		$this->load->model('M_DQS_department', 'MDD');
        $this->MDD->dep_id = $this->input->post('dep_id');
		$this->MDD->dep_active = $this->input->post('dep_active');
		$this->MDD->status_update( $this->MDD->dep_id,$this->MDD->dep_active);
	}

}

?>