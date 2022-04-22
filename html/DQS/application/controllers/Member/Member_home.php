<?php

/*
* Member_home
* @author Pongthorn,Onticha,Chanyapat
* @Create Date 2565-11-19
*/

defined('BASEPATH') or exit('No direct script access allowed');

require dirname(__FILE__) . '/../DQS_controller.php';
/*
* Member_home
* show member home
* @author pongthorn
* @Create Date 2565-01-02
*/
class Member_home extends DQS_controller
{
/*
* show_member_home()
* show  member home
* @input -
* @output member home
* @author pongthorn
* @Create Date 2564-12-05
*/
public function show_member_home()
{
	$this->load->model('M_DQS_folder', 'fol');
	$this->load->model('M_DQS_document', 'qrc');
	$memid = $this->session->userdata('mem_id');
	$data['arr_fol'] = $this->fol->get_by_id($memid)->result();
	$data['arr_qr'] = $this->qrc->get_by_id($memid)->result();
	$data['arr_folder'] = $this->fol->get_all()->result();
	$data['arr_doc'] = $this->qrc->get_all()->result();
	$folder = $this->fol->get_all()->result();
	$data['path_fol'] = array('@');
	
	// $id = 0;
	// $level = 0;
	// $num = 0;
	// 	for($i = 0; $i < count($folder); $i++){
			
	// 			$value = $folder[$i]->fol_id;
	// 			$folder_name = $folder[$i]->fol_name;
	// 			$sub_folder = $value;
	// 			echo  $folder_name." ";
	// 			echo "<br>";
	// 			if($folder[$id]->fol_location_id == $value){
	// 				$num++;
	// 			}
	// 			echo $num;
	// 			echo "<br>";
	// 			while($sub_folder == $folder[$i]->fol_location_id){
	// 				$value = $folder[$i]->fol_id;
	// 				$folder_name = $folder[$i]->fol_name;
	// 				echo $folder_name."  ";
	// 				echo "<br>";
	// 				$id = $sub_folder;
	// 			}
	// 		$id++;
	// 	}

	$this->output_sidebar_member("Member/v_member_home",$data);
}
/*
* show_in_folder()
* show  folder
* @input -
* @output show folder
* @author pongthorn
* @Create Date 2564-12-10
*/
	public function show_in_folder($fol_location_id)
	{
		$this->load->model('M_DQS_folder', 'fol');
		$this->load->model('M_DQS_document', 'qrc');
		$memid = $this->session->userdata('mem_id');
		$this->session->set_userdata('fol_location_id', $fol_location_id);
		$path_folder = $this->fol->get_by_id_fol($fol_location_id)->result();
		$this->session->set_userdata('fol_id', $path_folder[0]->fol_id);
		$data['arr_fol'] = $this->fol->get_by_member_id($memid, $fol_location_id,)->result();
		$data['arr_qr'] = $this->qrc->get_by_id_folder($memid)->result();
		$data['arr_folder'] = $this->fol->get_all()->result();
		$data['arr_doc'] = $this->qrc->get_all()->result();
		$path_location =  $path_folder[0]->fol_location ; //เช็คค่า ที่อยู่ใน data base
		$sub_folder = substr($path_location, 21 ).'/'; // sub string เอาแต่ location ชือของ folder
		$this->session->set_userdata('path', $sub_folder);
		$get_sub_folder = ' '.$sub_folder;
		$sub_path_folder = strpos($sub_folder,'/'); // sub pos แยกตัว '/' ออกมาแต่ละชื่อ
		$show_path_folder = substr($sub_folder,$sub_path_folder);
		$arr = array();
		do{
			$sub_path_folder = strpos($get_sub_folder,'/'); 	
			$sub_path_folder = $sub_path_folder + 1;
			$new_sub_folder = substr($get_sub_folder, 0, $sub_path_folder);
			$get_sub_folder = substr($get_sub_folder,$sub_path_folder);
			$real_path_folder = substr($new_sub_folder,0,-1);
			array_push($arr,$real_path_folder);		
			
		}while(strpos($get_sub_folder,'/') != null);
		$data['path_fol'] = $arr;
		$data['path_loc'] = $path_folder;
		if ($data['arr_fol'] == null) {
			$this->output_sidebar_member("Member/v_member_home_in_folder", $data);
		} else {
			$this->output_sidebar_member("Member/v_member_home", $data);
		}
	}

	public function delete_file(){
        $this->load->model('M_DQS_document','MDD');
        $path = substr($this->input->post('doc_path'),1);
        unlink(getcwd().$path);
        $this->MDD->doc_id = $this->input->post('doc_id');
        $data['qr'] = $this->MDD->get_by_qr_id($this->MDD->doc_id)->result();
        $qr_id = $data['qr'][0]->qr_id;
        $path_qr = substr($data['qr'][0]->qr_path,1);
        unlink(getcwd().$path_qr);
        $this->MDD->delete_qr_file($qr_id);
        $this->MDD->delete_file();

            if($this->session->userdata('mem_role') == 1){
            if($this->input->post('doc_fol_id') != 0){
                redirect('Admin/Admin_home/show_admin_in_folder/' . $this->input->post('doc_fol_id'));
            }
            else{
                redirect('Admin/Admin_home/show_admin_home/');
            }
        }else{
            if($this->input->post('doc_fol_id') != 0){
                redirect('Member/Member_home/show_in_folder/' . $this->input->post('doc_fol_id'));
            }
            else{
                redirect('Member/Member_home/show_member_home/');
            }
        }

    }

	public function delete_file_folder(){
        $this->load->model('M_DQS_document','MDD');
		$path = substr($this->input->post('doc_path'),1);
		unlink(getcwd().$path);
		$this->MDD->doc_id = $this->input->post('doc_id');
		$data['qr'] = $this->MDD->get_by_qr_id($this->MDD->doc_id)->result();
		$qr_id = $data['qr'][0]->qr_id;
		$path_qr = substr($data['qr'][0]->qr_path,1);
		unlink(getcwd().$path_qr);
        $this->MDD->delete_qr_file($qr_id);
        $this->MDD->delete_file();

        redirect('/Member/Member_home/show_in_folder/'.$this->input->post('fol_id'));
        
    }

	// function test($doc_id){
	// 	$this->load->model('M_DQS_Qrcode','MDQ');
	// 	$obj_qr = $this->MDQ->get_by_qr_id($doc_id)->result();
	// 	print_r($obj_qr);
	// }

	/*
	* update_document()
	* update document name
	* @input doc_name
	* @output update doc_name
	* @author Onticha
	* @Create Date 2565-03-21
	*/
	public function update_qr_file(){
        $this->load->model('M_DQS_qrcode','MDQ');
		$this->load->model('M_DQS_document','MDD');
		$qr_id = $this->input->post('qr_id');
		
		$this->MDQ->qr_name = $this->input->post('qr_name');
		$this->MDQ->qr_id = $this->input->post('qr_id');

		$this->MDD->doc_name = $this->input->post('qr_name');


		$obj_qr = $this->MDQ->get_by_qr_id($qr_id)->result();
		$obj_doc = $this->MDD->get_by_doc_id($obj_qr[0]->qr_doc_id)->result();
		$this->MDD->doc_id = $obj_qr[0]->qr_doc_id;
		$doc_fol_id = $obj_doc[0]->doc_fol_id;
		$get_sub_qr = $obj_qr[0]->qr_path;
		$arr = array();
		$i = 0;

		$path_qr = "";


		do{
			$sub_path_qr = strpos($get_sub_qr,'/'); 	
			$sub_path_qr = $sub_path_qr + 1;
			$new_sub_qr = substr($get_sub_qr, 0, $sub_path_qr);
			$get_sub_qr = substr($get_sub_qr,$sub_path_qr);
			$real_path_qr = substr($new_sub_qr,0,-1);
			array_push($arr,$real_path_qr);
			$i++;
			if($i != 1){
				$path_qr = $path_qr."/".$real_path_qr;		
			}
			
		}while(strpos($get_sub_qr,'/') != null);

		$path_qr = ".".$path_qr."/".$this->input->post('qr_name').".jpeg";
		$this->MDQ->qr_path = $path_qr;

// Edit  Document
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

		if(strpos($obj_doc[0]->doc_path,'.jpeg',0)>1){
			$path_doc = ".".$path_doc."/".$this->input->post('qr_name').".jpeg";
		}else if(strpos($obj_doc[0]->doc_path,'.pdf',0)>1){
			$path_doc = ".".$path_doc."/".$this->input->post('qr_name').".pdf";
		}else if(strpos($obj_doc[0]->doc_path,'.png',0)>1){
			$path_doc = ".".$path_doc."/".$this->input->post('qr_name').".png";
		}
		
		$this->MDD->doc_path = $path_doc;

		
	
		
		$get_sub_doc = $obj_doc[0]->doc_path;
		$arr = array();
		$i = 0;

	

		if ($this->MDQ->check_exist_name($this->MDQ->qr_name) == 0 && trim($this->MDQ->qr_name) != "") {
			$this->MDQ->update_qr_file();

			rename($obj_qr[0]->qr_path , $path_qr);
		

		
		}

	// Document
		if ($this->MDD->check_exist_name($this->input->post("qr_name")) == 0 && trim($this->input->post("qr_name")) != "") {
			$this->MDD->update_doc_file();

			rename($obj_doc[0]->doc_path , $path_doc);


		
		}
	
		if($this->session->userdata('mem_role') == 1){
			if($doc_fol_id != 0){
				redirect('Admin/Admin_home/show_admin_in_folder/' . $doc_fol_id);
			}
			else{
				redirect('Admin/Admin_home/show_admin_home/');
			}
		}else{
			if($doc_fol_id != 0){
				redirect('Member/Member_home/show_in_folder/' . $doc_fol_id);
				// echo $doc_fol_id;
			}
			else{
				redirect('Member/Member_home/show_member_home/');
				// echo $doc_fol_id;
			}
		}
   }

}