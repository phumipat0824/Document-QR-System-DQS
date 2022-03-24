<?php

/*
* management file
* @author Natruja
* @Create Date 2565-03-21
*/

defined('BASEPATH') or exit('No direct script access allowed');

require dirname(__FILE__) . '/../DQS_controller.php';

class File_management extends DQS_controller
{

	/*
	* move_file()
	* update file location
	* @input -
	* @output -
	* @author Natruja
	* @Create Date 2565-03-21
	*/
	function move_file()
	{

		$this->load->model('M_DQS_folder', 'mfol');
		$this->load->model('M_DQS_document', 'mdoc');
		$this->mdoc->doc_id = $this->input->post('doc_id');
		$this->mdoc->doc_name = $this->input->post('doc_name');
		$this->mdoc->doc_fol_id = $this->input->post('doc_fol_id');
		$this->mdoc->qr_id = $this->input->post('qr_id');
		$this->mdoc->qr_name = $this->input->post('qr_name');


		$obj_doc = $this->mdoc->get_by_qr_id($this->input->post('doc_id'))->result();
		
		
		$get_name_location = $this->mfol->get_by_id_fol($this->input->post('doc_fol_id'))->result();
		

		$get_sub_doc = $obj_doc[0]->doc_path;
		$arr = array();
		$i = 0;
		$path_doc = "";
		
		do{
			$sub_path_doc = strpos($get_sub_doc,'/'); 	
			$sub_path_doc = $sub_path_doc + 1;
			$new_sub_doc = substr($get_sub_doc, 0, $sub_path_doc);
			$get_sub_doc = substr($get_sub_doc,$sub_path_doc);
			$real_path_doc = substr($new_sub_doc,0,-1);
			array_push($arr,$real_path_doc);
			$i++;
			if($i != 1){
				$path_doc = $path_doc."/".$real_path_doc;		
			}
			
		}while(strpos($get_sub_doc,'/') != null);

		if(strpos($obj_doc[0]->doc_path,'.jpg',0)>1){
			$path_doc = $get_name_location[0]->fol_location."/".$this->input->post('qr_name').".jpeg";
		}elseif(strpos($obj_doc[0]->doc_path,'.jpeg',0)>1){
			$path_doc = $get_name_location[0]->fol_location."/".$this->input->post('qr_name').".jpeg";
		}else if(strpos($obj_doc[0]->doc_path,'.pdf',0)>1){
			$path_doc = $get_name_location[0]->fol_location."/".$this->input->post('qr_name').".pdf";
		}else if(strpos($obj_doc[0]->doc_path,'.png',0)>1){
			$path_doc = $get_name_location[0]->fol_location."/".$this->input->post('qr_name').".png";
		}else if(strpos($obj_doc[0]->doc_path,'.PNG',0)>1){
			$path_doc = $get_name_location[0]->fol_location."/".$this->input->post('qr_name').".png";
		}
		
		$this->mdoc->doc_path = $path_doc;

		//$newdocpath = $get_name_location[0]->fol_location . '/' . $this->mdoc->doc_name.'.jpg';
		//$this->mdoc->doc_path = $newdocpath;
		$this->mdoc->update_location();
	

		//ตัวแปรที่เก็บข้อมูล path ใหม่ของ user ใน server
		$obj_newdoc = $this->mdoc->get_by_qr_id($this->input->post('doc_id'))->result();
		
		
		


		//rename folder name in server
		rename($obj_doc[0]->doc_path, $obj_newdoc[0]->doc_path);
		
		
		//เรียกฟังก์ชั่นย้าย path qrcode
		$this->move_qr($this->input->post('doc_id'),$this->input->post('doc_fol_id'));
	}
	function move_qr($doc_id,$doc_fol_id){
		$this->load->model('M_DQS_folder', 'mfol');
		$this->load->model('M_DQS_document', 'mdoc');
		$obj_qr = $this->mdoc->get_by_qr_id($doc_id)->result();
		$get_name_location = $this->mfol->get_by_id_fol($doc_fol_id)->result();
		$newqrpath = $get_name_location[0]->fol_location . '/Qrcode/' . $this->mdoc->qr_name.'.jpeg';
		$this->mdoc->qr_path = $newqrpath;
		$this->mdoc->update_qr_location();
		$obj_newqr = $this->mdoc->get_by_qr_id($this->mdoc->doc_id)->result();
		rename($obj_qr[0]->qr_path, $obj_newqr[0]->qr_path);
		redirect('Member/Member_home/show_member_home');
	}


}
