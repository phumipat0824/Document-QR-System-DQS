<?php

/*
* management file
* @author Natruja
* @Create Date 2565-03-21
*/

defined('BASEPATH') OR exit('No direct script access allowed');

require dirname(__FILE__).'/../DQS_controller.php';

class File_management extends DQS_controller {

	/*
	* move_folder()
	* update folder location
	* @input -
	* @output -
	* @author Chanyapat
	* @Create Date 2564-11-30
	*/
	function move_file() 
	{
		$this->load->model('Da_DQS_folder','folder');
		$this->load->model('M_DQS_folder','mfol');
		$this->load->model('Da_DQS_document','doc');
		$this->load->model('M_DQS_document','mdoc');

		
		//fol_id คือ ตัวแปรที่เก็บไอดีของโฟลเดอร์ที่ต้องการย้ายตำแหน่ง
		$this->doc->doc_id = $this->input->post('doc_id');
		//fol_name คือ ตัวแปรที่เก็บชื่อของโฟลเดอร์ที่ต้องการย้ายตำแหน่ง
		$this->doc->doc_name = $this->input->post('doc_name');
		//fol_location_id นี้ คือตัวแปรที่เก็บค่า fol_id ไอดีของโฟลเดอร์ที่จะย้ายไป
		$this->doc->doc_fol_id = $this->input->post('doc_fol_id');

		$this->doc->qr_id = $this->input->post('qr_id');
		$this->doc->qr_name = $this->input->post('qr_name');

		//$this->doc->doc_mem_id = $this->input->post('doc_mem_id');
		
		$arr_fol = $this->mfol->get_by_mem_id($this->session->userdata('mem_id'));

		// for($i=0;$i<count($arr_fol);$i++){
		// 	if($this->input->post('doc_fol_id') == $arr_fol[$i]->fol_id){
				
		// 		$fol_path = $arr_fol[$i]->fol_location;

		// 	}
			
		// }
		//ตัวแปรที่เก็บข้อมูล path เดิมของ user ใน server
		$obj_doc = $this->mdoc->get_by_qr_id($this->input->post('doc_id'))->result();
		$obj_qr = $this->mdoc->get_by_qr_id($this->input->post('doc_id'))->result();		
		// print_r($this->input->post('doc_id'));
		// print_r($this->input->post('doc_name'));
		// print_r($this->input->post('doc_fol_id'));
		
		
		
		
		//ตัวแปรที่เก็บข้อมูล folder โดยดึงข้อมูลจาก id ไอดีของโฟลเดอร์ที่จะย้ายไป
		$get_name_location = $this->mfol->get_by_id_fol($this->input->post('doc_fol_id'))->result();
	

		if($this->folder->fol_location != $get_name_location[0]->fol_location){
			if($obj_doc[0]->doc_fol_id != $this->input->post('doc_fol_id')){
				
					$newdocpath = $get_name_location[0]->fol_location. '/' . $this->doc->doc_name;
					$newqrpath = $get_name_location[0]->fol_location. '/Qrcode/' . $this->doc->qr_name;
					$this->doc->doc_path = $newdocpath;
					$this->doc->qr_path = $newqrpath;

					//set newpath (fol_location) & new fol_location_id in database
					$this->doc->update_location();
					$this->doc->update_qr_location(); 
			
				//ตัวแปรที่เก็บข้อมูล path ใหม่ของ user ใน server
					$obj_newdoc = $this->mdoc->get_by_qr_id($this->input->post('doc_id'))->result();
					$obj_newqr = $this->mdoc->get_by_qr_id($this->input->post('doc_id'))->result();

					//rename folder name in server
					rename($obj_doc[0]->doc_path , $obj_newdoc[0]->doc_path );
					rename($obj_qr[0]->qr_path , $obj_newqr[0]->qr_path ); 
			}
		}
		
		
		redirect('Member/Member_home/show_member_home');
	}//end funtion move_folder()
}
?>