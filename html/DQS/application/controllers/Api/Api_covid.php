<?php
defined('BASEPATH') or exit('No direct script access allowed');
require dirname(__FILE__) . '/../DQS_controller.php';
class Api_covid extends DQS_controller
{

public function show_api_covid(){
@$get_data = file_get_contents('https://covid19.ddc.moph.go.th/api/Cases/today-cases-all');

$data['covid'] = json_decode($get_data);

//print_r($data);
$this->load->view('v_covid',$data);
}

}
