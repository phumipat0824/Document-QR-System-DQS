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
	public function delete_file($file_id){
        $this->load->model('M_DQS_document','MDD');
		$this->MDD->doc_id = $file_id;
		$data['qr'] = $this->MDD->get_by_qr_id($file_id)->result();
		$qr_id = $data['qr'][0]->qr_id;
        $this->MDD->delete_qr_file($qr_id);
        $this->MDD->delete_file();

        redirect('/Member/Member_home/show_member_home');
        
    }

}