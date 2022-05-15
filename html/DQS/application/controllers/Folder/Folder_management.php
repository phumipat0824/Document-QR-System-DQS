<?php

/*
* management folder
* @author Pongthorn,Onticha,Chanyapat
* @Create Date 2565-11-19
*/

defined('BASEPATH') OR exit('No direct script access allowed');

require dirname(__FILE__).'/../DQS_controller.php';

class Folder_management extends DQS_controller {
/*
* get_folder_ajax()
* check name ajax
* @input -
* @output -
* @author pongthorn
* @Create Date 2564-12-10
*/
	public function get_folder_ajax()
	{
		$this->load->model('M_DQS_folder', 'fol');
		$this->fol->fol_name = $this->input->post('fol_name');
		if ($this->fol->check_exist_name($this->fol->fol_name) == 0 && trim($this->fol->fol_name) != "") {
			$checkname = 0;
		} else {
			$checkname = 1;
		}
		echo json_encode($checkname);
	}//end funtion get_folder_ajax()
	
	/*
	* insert_folder()
	* insert folder 
	* @input -
	* @output -
	* @author Pongthorn
	* @Create Date 2564-11-19
	*/
    public function insert_folder() // สร้างโฟลเดอร์
	{
		$this->load->model('M_DQS_folder', 'folder');
		
		 $this->folder->fol_name = $this->input->post('fol_name');
		 $this->folder->fol_mem_id = $this->session->userdata('mem_id');
		 

		if ($this->input->post('fol_location_id') == 0) {
			$newpath = './assets/user/' . $this->session->userdata('mem_username') . '/';
		} else {
			$get_name_location = $this->folder->get_by_id_fol($this->input->post('fol_location_id'))->result();
			$newpath = $get_name_location[0]->fol_location . '/';
		}
		$folder_name = $_POST['fol_name'];

		//if
		if (!file_exists($newpath . $folder_name))/* Check folder exists or not */ {
			@mkdir($newpath . $folder_name, 0777);/* Create folder by using mkdir function */

			//ตั้งชื่อไฟล์ใหม่โดยเอาเวลาไว้หน้าชื่อไฟล์เดิม
			$newname = $this->input->post('fol_name');
			$newpath = $newpath . $newname;

			$this->folder->fol_location = $newpath;
		}
		$get_qrcode = 'Qrcode';
		$path_new = $newpath . '/';
		if (!file_exists($path_new . 'Qrcode')) {
			@mkdir($path_new . 'Qrcode', 0777);
		}
		$this->folder->fol_location_id = $this->input->post('fol_location_id');
		$this->folder->insert();
		
		
		if($this->session->userdata('mem_role') == 1){
			if($this->input->post('fol_location_id') != 0){
				redirect('Admin/Admin_home/show_admin_in_folder/' . $this->input->post('fol_location_id'));
			}
			else{
				redirect('Admin/Admin_home/show_admin_home/');
			}
		}else{
			if($this->input->post('fol_location_id') != 0){
				redirect('Member/Member_home/show_in_folder/' . $this->input->post('fol_location_id'));
			}
			else{
				redirect('Member/Member_home/show_member_home/');
			}
		}
		
	}//end funtion insert_folder()
	
	/*
	* update_folder()
	* update folder name
	* @input folder name
	* @output update folder name
	* @author Onticha
	* @Create Date 2564-11-30
	*/
public function update_doc($doc_id,$new_path){
	$this->load->model('M_DQS_folder', 'Mfol');
	$id_doc = $this->Mfol->get_by_id_doc($doc_id)->result();
	$name_doc = $id_doc[0]->doc_name;
	$type_doc = $id_doc[0]->doc_type;
	$update_path = $new_path."/".$name_doc.$type_doc;
	$this->Mfol->doc_id = $doc_id;
	$this->Mfol->doc_path = $update_path;
	$this->Mfol->update_document();

	$id_qr = $this->Mfol->get_by_doc_id($doc_id)->result();
	$name_qr = $id_qr[0]->qr_name;
	$update_qr_path = $new_path."/Qrcode/".$name_qr.".jpeg";
	$this->Mfol->qr_id = $id_qr[0]->qr_id;
	$this->Mfol->qr_path = $update_qr_path;
	$this->Mfol->update_qrcode();
}

public function update_in_fol($fol_id,$new_path){
	$this->load->model('M_DQS_folder', 'Mfol');

	
		$this->Mfol->fol_id = $fol_id;
		$obj_fol = $this->Mfol->get_by_id_fol($fol_id)->result();
		$new_fol_path = $new_path."/".$obj_fol[0]->fol_name;
		$this->Mfol->fol_location = $new_fol_path;
		$this->Mfol->update_in_folder();
		$doc_id = $this->Mfol->get_by_doc_fol_id($fol_id)->result();
		for($i=0; $i<count($doc_id); $i++ ){
			$this->update_doc($doc_id[$i]->doc_id,$new_fol_path);
		}

}

public function check_fol_id($fol_id){
	$this->load->model('M_DQS_folder', 'Mfol');
	$obj_fol = $this->Mfol->get_by_id_fol($fol_id)->result();
	$arr_fol_id = $this->Mfol->get_by_fol_location_id($fol_id)->result();
	$newpath = $obj_fol[0]->fol_location;

	if($arr_fol_id != NULL){
		for($i=0; $i<count($arr_fol_id); $i++ ){
			$this->update_in_fol($arr_fol_id[$i]->fol_id,$newpath);
			$this->check_fol_id($arr_fol_id[$i]->fol_id);
		}
	}
}

public function update_folder()
	{
		$this->load->model('M_DQS_folder', 'Mfol');

		$this->Mfol->fol_name = $this->input->post('fol_name');
		$this->Mfol->fol_id = $this->input->post('fol_id');
		$fol_location_id = $this->input->post('fol_location_id');
		$obj_fol = $this->Mfol->get_by_id_fol($this->input->post('fol_id'))->result();
		$arr_fol_id = $this->Mfol->get_by_fol_location_id($this->input->post('fol_id'))->result();



		if ($this->input->post('fol_location_id') == 0) {
			$newpath = './assets/user/' . $this->session->userdata('mem_username') . '/';
		} else {
			$get_name_location = $this->Mfol->get_by_id_fol($this->input->post('fol_location_id'))->result();
			$newpath = $get_name_location[0]->fol_location . '/';
		}
		//ตั้งชื่อไฟล์ใหม่โดยเอาเวลาไว้หน้าชื่อไฟล์เดิม
		$newname = $this->input->post('fol_name');
		$newpath = $newpath . $newname;
		$this->Mfol->fol_location = $newpath;

		if ($this->Mfol->check_exist_name($this->Mfol->fol_name) == 0 && trim($this->Mfol->fol_name) != "") {
			$this->Mfol->update();
		}
		
		$obj_newfol = $this->Mfol->get_by_id_fol($this->input->post('fol_id'))->result();
		

		rename($obj_fol[0]->fol_location , $obj_newfol[0]->fol_location );

		$doc_id = $this->Mfol->get_by_doc_fol_id($this->input->post('fol_id'))->result();
		for($i=0; $i<count($doc_id); $i++ ){
			$this->update_doc($doc_id[$i]->doc_id,$newpath);
		}

		$fol_check_id = $this->input->post('fol_id');
		$this->check_fol_id($fol_check_id);

		if($this->session->userdata('mem_role') == 1){
			if($this->input->post('fol_location_id') != 0){
				redirect('Admin/Admin_home/show_admin_in_folder/' . $this->input->post('fol_location_id'));
			}
			else{
				redirect('Admin/Admin_home/show_admin_home/');
			}
		}else{
			if($this->input->post('fol_location_id') != 0){
				redirect('Member/Member_home/show_in_folder/' . $this->input->post('fol_location_id'));
			}
			else{
				redirect('Member/Member_home/show_member_home/');
			}
		}
		
	
	}//end funtion update_folder()

public	function delete_in_folder($fol_id){
		$this->load->model('M_DQS_folder', 'MDF');
		
		$doc_id = $this->MDF->get_by_doc_fol_id($fol_id)->result();
	

		for($i=0; $i<count($doc_id); $i++ ){
			$qr_doc_id = $this->MDF->get_by_doc_id($doc_id[$i]->doc_id)->result();
			$this->MDF->DeleteQR($qr_doc_id[0]->qr_id);
		}

		$this->MDF->DeleteDocument($fol_id);
		
		$this->MDF->DeleteFolder($fol_id);
		// $this->delete_fol_in_fol($folder_id[0]->fol_location_id);

	}

	public function delete_fol_in_fol($fol_id){
		$this->load->model('M_DQS_folder', 'MDF');
		$fol_local_id = $this->MDF->get_by_fol_location_id($fol_id)->result();
		$folder_id = $this->MDF->get_folder_by_id($fol_id)->result();
		if($fol_local_id == null){
		   $this->delete_in_folder($fol_id);
		   if($folder_id!=0 && $folder_id != null){
			if($folder_id[0]->fol_location_id !=0){
				$this->delete_fol_in_fol($folder_id[0]->fol_location_id);
			}
		   }
		}else{
			for($i=0; $i<count($fol_local_id); $i++ ){
				$this->delete_fol_in_fol($fol_local_id[$i]->fol_id);
			}
		}
	}
	/*
	* delete_folder()
	* delete folder 
	* @input -
	* @output -
	* @author Onticha
	* @Create Date 2564-11-30
	*/
public	function delete_folder()
	{
		$this->load->model('M_DQS_folder', 'MDF');
		// $this->load->model('M_DQS_document', 'MDD');
		// $this->load->model('M_DQS_qrcode', 'MQR');

		$fol_id = $this->input->post('fol_id');
		
		$fol_location_id = $this->input->post('fol_location_id');

		$fol_name = $this->MDF->get_by_id_fol($fol_id)->result();
		$doc_id = $this->MDF->get_by_doc_fol_id($fol_id)->result();
		$fol_local_id = $this->MDF->get_by_fol_location_id($fol_id)->result();

		// print_r($fol_local_id);



		for($i=0; $i<count($fol_local_id); $i++ ){
			// $this->delete_in_folder($fol_local_id[$i]->fol_id);
			$this->delete_fol_in_fol($fol_local_id[$i]->fol_id);
			// $this->MDF->DeleteQR($qr_doc_id[0]->qr_id);
		}

		// for($i=0; $i<count($doc_id); $i++ ){
		// 	$qr_doc_id = $this->MDF->get_by_doc_id($doc_id[$i]->doc_id)->result();
		// 	$this->MDF->DeleteQR($qr_doc_id[0]->qr_id);
		// }

		$this->MDF->DeleteDocument($fol_id);
		// $this->MDF->DeleteDocument($fol_id);

		// print_r($doc_id);
		// $fol_name = $this->MDF->get_by_id_fol($fol_id)->result();
		$folder_name = $fol_name[0]->fol_name;
		$this->MDF->DeleteFolder($fol_id);


		$newpath = $fol_name[0]->fol_location;
		$new_path = base_url().$newpath;

		if(file_exists($newpath)){
			$di = new RecursiveDirectoryIterator($newpath, FilesystemIterator::SKIP_DOTS);
			$ri = new RecursiveIteratorIterator($di, RecursiveIteratorIterator::CHILD_FIRST);
			foreach ( $ri as $file ) {
				$file->isDir() ?  rmdir($file) : unlink($file);
			}
		}

		rmdir($newpath);/* Delete folder by using rmdir function */
		
		if($this->session->userdata('mem_role') == 1){
			if($this->input->post('fol_location_id') != 0){
				redirect('Admin/Admin_home/show_admin_in_folder/' . $this->input->post('fol_location_id'));
			}
			else{
				redirect('Admin/Admin_home/show_admin_home/');
			}
		}else{
			if($this->input->post('fol_location_id') != 0){
				redirect('Member/Member_home/show_in_folder/' . $this->input->post('fol_location_id'));
			}
			else{
				redirect('Member/Member_home/show_member_home/');
			}
		}
		
	}//end funtion delete_folder()
  
	/*
	* move_folder()
	* update folder location
	* @input -
	* @output -
	* @author Chanyapat
	* @Create Date 2564-11-30
	*/
	function move_folder() 
	{
		$this->load->model('Da_DQS_folder','folder');
		$this->load->model('M_DQS_folder','mfol');
		$this->load->model('M_DQS_document','mdoc');


		//fol_location_id นี้ คือตัวแปรที่เก็บค่า fol_id ไอดีของโฟลเดอร์ที่จะย้ายไป
		$this->folder->fol_location_id = $this->input->post('fol_location_id');
		//fol_id คือ ตัวแปรที่เก็บไอดีของโฟลเดอร์ที่ต้องการย้ายตำแหน่ง
		$this->folder->fol_id = $this->input->post('fol_id');
		//fol_name คือ ตัวแปรที่เก็บชื่อของโฟลเดอร์ที่ต้องการย้ายตำแหน่ง
		$this->folder->fol_name = $this->input->post('fol_name');

		// echo "<pre>";

		//get path ปัจจุบัน
		$get_current_location = $this->mfol->get_by_id_fol($this->input->post('fol_id'))->result();
		$current_path = $get_current_location[0]->fol_location;
		$arr_file = $this->mdoc->get_parent_and_child_by_path($current_path)->result();
	
		//ตัวแปรที่เก็บข้อมูล folder โดยดึงข้อมูลจาก id ไอดีของโฟลเดอร์ที่จะย้ายไป
		$get_new_location = $this->mfol->get_by_id_fol($this->input->post('fol_location_id'))->result();

		$count_current_location_max_level = $this->count_max_level_folder($current_path);

		$rout_path = './assets/user/' . $this->session->userdata('mem_username');
		$current_path_no_rout = str_replace($rout_path,'',$current_path);
		$count_current_location_level = $count_current_location_max_level - substr_count($current_path_no_rout, '/') + 1;
		
		//check total level folder
		if($this->input->post('fol_location_id') == '0'){
			// echo "if <br>";
			$count_new_location_level = 1;
		}
		else{
			// echo "else <br>";
			$new_path_no_rout = str_replace($rout_path,'',$get_new_location[0]->fol_location);
			$count_new_location_level = substr_count($new_path_no_rout, '/');
		}
		$count_total_level = $count_current_location_level + $count_new_location_level;

		// echo "count_total_level = ".$count_total_level."<br>";
		// echo "count_current_location_level = ".$count_current_location_level."<br>";
		// echo "count_new_location_level = ".$count_new_location_level."<br>";

		if($count_total_level <= 5){
			// echo "count <= 5";
			if($this->input->post('fol_id') != $this->input->post('fol_location_id')){
				for($i=0;$i<count($arr_file);$i++){
					$obj_doc = $this->mdoc->get_by_qr_id($arr_file[$i]->doc_id)->result();
					
					$obj_qr = $this->mdoc->get_by_qr_id($arr_file[$i]->doc_id)->result();
				
					$this->mdoc->doc_id = $arr_file[$i]->doc_id;
					$this->mdoc->doc_name = $arr_file[$i]->doc_name;
					$this->mdoc->doc_fol_id = $arr_file[$i]->doc_fol_id;;
					$this->mdoc->qr_id = $arr_file[$i]->qr_id;
					$this->mdoc->qr_name = $arr_file[$i]->qr_name;
	
					//if & else แก้ไข path document ที่ต้องการย้าย
					if($this->input->post('fol_location_id') == '0'){
						// //ลบ path ฝั่งซ้าย
						// $rout_path = './assets/user/' . $this->session->userdata('mem_username');
						// $old_full_path = $arr_file[$i]->doc_path;
						// $replace_path = str_replace($rout_path,'',$old_full_path);
	
						// //ลบ path ฝั่งขวา
						// $current_folder_name = $get_current_location[0]->fol_name;
						// $replace_path = preg_replace("/".$current_folder_name.".+$/m","",$replace_path);
						// //replace (แทนที่) path ใหม่
						// $new_full_doc_path = str_replace($replace_path,'/',$arr_file[$i]->doc_path);
						
						$current_folder_name = $get_current_location[0]->fol_name;
						$new_replace_path = './assets/user/' . $this->session->userdata('mem_username').'/'.$current_folder_name;
						
					}
					else{
							$current_folder_name = $get_current_location[0]->fol_name;
							$new_replace_path = $get_new_location[0]->fol_location.'/'.$current_folder_name;	
					
					}
	
					//replace (แทนที่) path ใหม่
					$new_full_doc_path = str_replace($get_current_location[0]->fol_location,$new_replace_path,$arr_file[$i]->doc_path);
					// echo "new_full_doc_path = ".$new_full_doc_path."<br>";
	
					$this->mdoc->doc_path = $new_full_doc_path;
					$this->mdoc->update_location();
					//ตัวแปรที่เก็บข้อมูล path ใหม่ของ user ใน server
					$obj_newdoc = $this->mdoc->get_by_qr_id($arr_file[$i]->doc_id)->result();
					//rename folder name in server
					// rename($obj_doc[0]->doc_path, $obj_newdoc[0]->doc_path);
				
				
					//เรียกฟังก์ชั่นย้าย path qrcode
					if($this->input->post('fol_location_id') == '0'){
						$current_folder_name = $get_current_location[0]->fol_name;
						$new_replace_path = './assets/user/' . $this->session->userdata('mem_username').'/'.$current_folder_name;
						
					}
					else{
						$current_folder_name = $get_current_location[0]->fol_name;
						$new_replace_path = $get_new_location[0]->fol_location.'/'.$current_folder_name;
						
					}
		
					//replace (แทนที่) path ใหม่
					$new_full_qr_path = str_replace($get_current_location[0]->fol_location,$new_replace_path,$arr_file[$i]->qr_path);
					$this->mdoc->qr_path = $new_full_qr_path;
					// echo "new_full_qr_path = ".$new_full_qr_path."<br>";
					$this->mdoc->update_qr_location();
					$obj_newqr = $this->mdoc->get_by_qr_id($this->mdoc->doc_id)->result();
					// rename($obj_qr[0]->qr_path, $obj_newqr[0]->qr_path);
			
				}
	
				//ตัวแปรที่เก็บข้อมูล path เดิมของ user ใน server
				$obj_fol = $this->mfol->get_by_id_fol($this->input->post('fol_id'))->result();
				
				//ตัวแปรที่เก็บข้อมูล path เดิมของ user ใน server เอาไว้เช็ค path ย่อย
				$path_fol = $this->mfol->get_by_id_fol($this->input->post('fol_id'))->result();
		
		
				//ข้อมูลตัวที่จะย้าย
				$get_current_folder = $this->mfol->get_by_id_fol($this->input->post('fol_id'))->result();
				$parent_path = $get_current_folder[0]->fol_location;
		
				$arr_child_folder = $this->mfol->get_by_path($parent_path)->result();
		
				$new_parent_path = '';
			
				//เรียกใช้ฟังก์ชันย้าย folder
				if($this->input->post('fol_location_id') == '0'){
					$new_parent_path = './assets/user/' . $this->session->userdata('mem_username') . '/'. $this->folder->fol_name;
				}
				else{
					$new_parent_path = $get_new_location[0]->fol_location . '/' . $this->folder->fol_name;		
				}
	
				//set newpath (fol_location) & new fol_location_id in database
				$this->folder->fol_location = $new_parent_path;
				$this->folder->update_location(); 
	
				//ตัวแปรที่เก็บข้อมูล path ใหม่ของ user ใน server
				$obj_newfol = $this->mfol->get_by_id_fol($this->input->post('fol_id'))->result();
	
				//rename folder name in server
				rename($obj_fol[0]->fol_location , $obj_newfol[0]->fol_location ); 
	
	
				for($i=0; $i < count($arr_child_folder); $i++){
					$child_path = $arr_child_folder[$i]->fol_location;
					$new_child_path = str_replace($parent_path, $new_parent_path, $child_path);
	
					$this->folder->fol_location = $new_child_path;
					$this->folder->fol_location_id = $arr_child_folder[$i]->fol_location_id;
					$this->folder->fol_id = $arr_child_folder[$i]->fol_id;
					$this->folder->update_location(); 
			
				}//for
			}

			//redirect
			if($this->session->userdata('mem_role') == 1){
				if($this->input->post('fol_location_id') != 0){
					redirect('Admin/Admin_home/show_admin_in_folder/' . $this->input->post('fol_location_id'));
				}
				else{
					redirect('Admin/Admin_home/show_admin_home/');
				}
			}else{
				if($this->input->post('fol_location_id') != 0){
					redirect('Member/Member_home/show_in_folder/' . $this->input->post('fol_location_id'));
				}
				else{
					redirect('Member/Member_home/show_member_home/');
				}
			}
			
		}// end if
		else{
			// echo "count > 5";
			// redirect
			redirect($_SERVER['HTTP_REFERER']);
			
		}// end else

		
	}//end funtion move_folder()

	/*
	* count_max_level()
	* get count max level folder
	* @input folder path
	* @output count max level folder
	* @author Chanyapat
	* @Create Date 2565-04-15
	*/
	public function count_max_level_folder($path)
    {
		// $path = './assets/user/CHB009/test2/test5/test6/test6';
		//ลบฝั่งซ้าย
		$rout_path = './assets/user/' . $this->session->userdata('mem_username')."/";
		$path_no_rout = str_replace($rout_path,'',$path);
		$folder_level_1_name = strtok($path_no_rout, '/');
		$folder_level_1_path = $rout_path.$folder_level_1_name;

		$this->load->model('M_DQS_folder', 'fol');

        $fol_mem_id = $this->session->userdata('mem_id');

        $arr_level = [];
        $arr_level[1] = $this->fol->get_level_1_by_path($folder_level_1_path)->result();
        $arr_child = $this->fol->get_level_2_or_more_by_path($path)->result();

		if(empty($arr_level[1])){
			return 0;
		}

        //===========================================================================

        //เตรียมข้อมูลก่อนจัดข้อมูลใส่ level 2 และ level ถัด ๆ ไป
        $arr_fol_id_previous_level = [];

        for ($i = 0; $i < count($arr_level[1]); $i++) {
            array_push($arr_fol_id_previous_level, $arr_level[1][$i]->fol_id);
        } //for

        //===========================================================================

        //จัดข้อมูลใส่ level 2 และ level ถัด ๆ ไป
		
		$count_level = 1;
        $max_level = 5;
        for ($level = 2; $level <= $max_level; $level++) {
			
			if(empty($arr_child)){
				break;
			}
			else{
				$count_level++;
			}

            $arr_level[$level] = [];
            $arr_fol_id_this_level = [];
            $arr_index_remove = [];

            //หาข้อมูลไหนที่อยู่ level นี้
            for ($i = 0; $i < count($arr_child); $i++) {

                if (in_array($arr_child[$i]->fol_location_id, $arr_fol_id_previous_level)) {
                    //กรณีเจอ parent_id ที่อยู่ level ก่อนหน้า (ทำแบบนี้เพื่อที่จะได้ไม่ปน level)

                    //เก็บข้อมูลลง level ปัจจุบัน
                    array_push($arr_level[$level], $arr_child[$i]);

                    //เก็บว่าเจอ index ตัวไหนที่ต้องเอาออก เพราะใช้แล้ว
                    array_push($arr_index_remove, $i);

                    //เก็บว่า fol_id ของ level นี้มีตัวอะไร
                    array_push($arr_fol_id_this_level, $arr_child[$i]->fol_id);

                } //if
            } //for

            //เอาข้อมูลที่ใช้แล้วออก (ทำจากหลังมาหน้า ข้อมูลจะได้ไม่เคลื่อน)
            for ($i = count($arr_index_remove) - 1; $i >= 0; $i--) {
                array_splice($arr_child, $arr_index_remove[$i], 1);
            } //for

            //เตรียมข้อมูลสำหรับ loop รอบถัดไป
            $arr_fol_id_previous_level = $arr_fol_id_this_level;

        } //for

        //===========================================================================
		
		// echo $count_level;
        return $count_level;

    } //end count_max_level_folder()

	/*
	* get_dropdown_data_ajax()
	* get dropdown level
	* @input -
	* @output -
	* @author Chanyapat
	* @Create Date 2565-03-22
	*/
	public function get_dropdown_data_ajax()
    {
		$this->load->model('M_DQS_folder', 'fol');

        $fol_id = $this->input->post("fol_id");
        $fol_mem_id = $this->session->userdata('mem_id');

        $arr_level = [];
        $arr_level[1] = $this->fol->get_level_1_by_member_id($fol_mem_id)->result();
        $arr_child = $this->fol->get_level_2_or_more_by_member_id($fol_mem_id)->result();

        //===========================================================================

        //เตรียมข้อมูลก่อนจัดข้อมูลใส่ level 2 และ level ถัด ๆ ไป
        $arr_fol_id_previous_level = [];

        for ($i = 0; $i < count($arr_level[1]); $i++) {
            array_push($arr_fol_id_previous_level, $arr_level[1][$i]->fol_id);
        } //for

        //===========================================================================

        //จัดข้อมูลใส่ level 2 และ level ถัด ๆ ไป

        $max_level = 5;
        for ($level = 2; $level <= $max_level; $level++) {

            $arr_level[$level] = [];
            $arr_fol_id_this_level = [];
            $arr_index_remove = [];

            //หาข้อมูลไหนที่อยู่ level นี้
            for ($i = 0; $i < count($arr_child); $i++) {

                if (in_array($arr_child[$i]->fol_location_id, $arr_fol_id_previous_level)) {
                    //กรณีเจอ parent_id ที่อยู่ level ก่อนหน้า (ทำแบบนี้เพื่อที่จะได้ไม่ปน level)

                    //เก็บข้อมูลลง level ปัจจุบัน
                    array_push($arr_level[$level], $arr_child[$i]);

                    //เก็บว่าเจอ index ตัวไหนที่ต้องเอาออก เพราะใช้แล้ว
                    array_push($arr_index_remove, $i);

                    //เก็บว่า fol_id ของ level นี้มีตัวอะไร
                    array_push($arr_fol_id_this_level, $arr_child[$i]->fol_id);

                } //if
            } //for

            //เอาข้อมูลที่ใช้แล้วออก (ทำจากหลังมาหน้า ข้อมูลจะได้ไม่เคลื่อน)
            for ($i = count($arr_index_remove) - 1; $i >= 0; $i--) {
                array_splice($arr_child, $arr_index_remove[$i], 1);
            } //for

            //เตรียมข้อมูลสำหรับ loop รอบถัดไป
            $arr_fol_id_previous_level = $arr_fol_id_this_level;

        } //for

        //===========================================================================

        $data['arr_level'] = $arr_level;
		if($fol_id != 0){
			$arr_current_folder = $this->fol->get_folder_by_id($fol_id)->result();
		
			$data['current_path'] = $arr_current_folder[0]->fol_location;
	
			// $data['arr_folder'] = $this->fol->get_mem_folder($fol_mem_id)->result();
			if($arr_current_folder[0]->fol_location_id == 0){
				$data['is_level_1'] = true;
			}else{
					$data['is_level_1'] = false;
			}
		}else{
			$data['current_path'] = 'home';
			$data['is_level_1'] = true;
		}
        

        echo json_encode($data);

    } //end get_dropdown_data_ajax()
}
?>