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


		echo 'id doc' . $this->input->post('doc_id');
		echo '<br>';
		echo 'name doc' . $this->input->post('doc_name');
		echo '<br>';
		echo 'id folder' . $this->input->post('doc_fol_id');
		echo '<br>';
		echo 'id qr' . $this->input->post('qr_id');
		echo '<br>';
		echo 'name qr' . $this->input->post('qr_name');
		echo '<br>';

		
		$this->mdoc->doc_id = $this->input->post('doc_id');
		
		$this->mdoc->doc_name = $this->input->post('doc_name');
	
		$this->mdoc->doc_fol_id = $this->input->post('doc_fol_id');

		$this->mdoc->qr_id = $this->input->post('qr_id');
		$this->mdoc->qr_name = $this->input->post('qr_name');

	

		$arr_fol = $this->mfol->get_by_mem_id($this->session->userdata('mem_id'));

		$obj_doc = $this->mdoc->get_by_qr_id($this->input->post('doc_id'))->result();
		$obj_qr = $this->mdoc->get_by_qr_id($this->input->post('doc_id'))->result();
		

		echo 'ข้อมูล doc';
		print_r($obj_doc);
		echo '<br>';
		echo 'ข้อมูล qr';
		print_r($obj_qr);
		echo '<br>';

		//ตัวแปรที่เก็บข้อมูล folder โดยดึงข้อมูลจาก id ไอดีของโฟลเดอร์ที่จะย้ายไป
		$get_name_location = $this->mfol->get_by_id_fol($this->input->post('doc_fol_id'))->result();
		echo $this->mdoc->qr_name;
		print_r($get_name_location);

		//ตัด string path qrcode
		//$get_sub_qr = $obj_qr[0]->qr_path;
		//$arr = array();
		//$i = 0;
		//$path_qr = "";
		//echo 'get sub qr'.$get_sub_qr;
		//do{
			//$sub_path_qr = strpos($get_sub_qr,'/'); 	
			//$sub_path_qr = $sub_path_qr + 1;
			//$new_sub_qr = substr($get_sub_qr, 0, $sub_path_qr);
			//$get_sub_qr = substr($get_sub_qr,$sub_path_qr);
			//$real_path_qr = substr($new_sub_qr,0,-1);
			//array_push($arr,$real_path_qr);
			//$i++;
			//if($i != 1){
			//	$path_qr = $path_qr."/".$real_path_qr;		
			//}
			
		//}while(strpos($get_sub_qr,'/') != null);

		//$path_qr = ".".$path_qr."/".$this->input->post('qr_name').".jpeg";
		//$this->mdoc->qr_path = $path_qr;


		$newdocpath = $get_name_location[0]->fol_location . '/' . $this->mdoc->doc_name.'.jpg';
		$newqrpath = $get_name_location[0]->fol_location . '/Qrcode/' . $this->mdoc->qr_name.'.jpeg';
		$this->mdoc->doc_path = $newdocpath;
		$this->mdoc->qr_path = $newqrpath;
		echo 'newdocpath' . $newdocpath;
		//echo 'newqrpath' . $newqrpath;
		//set newpath (fol_location) & new fol_location_id in database
		$this->mdoc->update_location();
		$this->mdoc->		();

		//ตัวแปรที่เก็บข้อมูล path ใหม่ของ user ใน server
		$obj_newdoc = $this->mdoc->get_by_qr_id($this->input->post('doc_id'))->result();
		$obj_newqr = $this->mdoc->get_by_qr_id($this->input->post('doc_id'))->result();
		echo 'ข้อมูลพาทใหม่ doc';
		print_r($obj_newdoc);
		echo '<br>';
		echo 'ข้อมูลพาทใหม่ qr';
		//print_r($obj_newqr);
		echo '<br>';
		//rename folder name in server
		rename($obj_doc[0]->doc_path, $obj_newdoc[0]->doc_path);
		//rename($obj_qr[0]->qr_path, $obj_newqr[0]->qr_path);



		echo 'พาทเก่าเอกสาร' . $obj_doc[0]->doc_path;
		echo '<br>';
		echo 'พาทใหม่เอกสาร' . $obj_newdoc[0]->doc_path;
		echo '<br>';
		echo 'พาทเก่าคิวอา' . $obj_newdoc[0]->doc_path;
		echo '<br>';
		echo 'พาทใหม่คิวอา' . $obj_newqr[0]->qr_path;
		echo '<br>';

		//redirect('Member/Member_home/show_member_home');
	} 
}
