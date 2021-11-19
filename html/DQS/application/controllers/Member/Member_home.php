<?php

defined('BASEPATH') or exit('No direct script access allowed');

require dirname(__FILE__) . '/../DQS_controller.php';

class Member_home extends DQS_controller
{

    public function show_member_home()
    {
        $this->load->model('M_DQS_folder', 'fol');
		$data['arr_fol'] = $this->fol->get_all()->result();
        $this->output_sidebar_member("Member/v_member_home",$data);
    }
    public function create_folder()
    {
		
		$this->load->model('Da_DQS_folder','folder');
		$this->folder->fol_name = $this->input->post('fol_name');


        $folder_name=$_POST['fol_name'];
		$path='./assets/folder/';
	
		//if
        if (!file_exists($path . $folder_name))/* Check folder exists or not */
			{
				@mkdir($path . $folder_name, 0777);/* Create folder by using mkdir function */
				
				
			//ตั้งชื่อไฟล์ใหม่โดยเอาเวลาไว้หน้าชื่อไฟล์เดิม
				$newname = $this->input->post('fol_name');
				$newpath ='./assets/folder/'.$newname;
                
        }
		
		$this->folder->fol_location = $newpath;
		$this->folder->insert();
		redirect('Member/Member_home/show_member_home');
        
     }

    
}
?>