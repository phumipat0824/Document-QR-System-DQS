<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require dirname(__FILE__) . '/../DQS_controller.php'; // Controller in folder 
class test extends DQS_controller {
    public function exam1(){
        //$arr = array(30,3,1,5,18); 
        $arr = array(1,6,8,4,16);  
        
        // Coding back-end 02 here!!!! 
        $temp = 0;
        $max = max($arr);
        $min = min($arr);
        $frist = 0;
        $miss=array();
        $prime = 0;
        $arr_prime=array();
        for($i = 0; $i <= count($arr) - 1; $i++) {
                if($i==0){
                    echo "List of Numbers => ".$arr[$i];
                }else{
                    echo ",".$arr[$i];
                }
        }
        echo "<br>";
        for($i = $min; $i <= $max; $i++){
            for($j = 0; $j <= count($arr) - 1; $j++) {
                if($arr[$j] == $i) {
                    $temp++;
                    
                }
            }
            if($temp != 1){
                        $frist++; 
                    }
            if($temp != 1 && $frist == 1 ){
                echo "Missing Numbers => ".$i;
                array_push($miss,$i);
            }
            if ($temp != 1 && $frist != 1 ) {
                echo ",".$i;
                array_push($miss,$i);
            }
            $temp = 0;
        }

        echo "<br>";
        
        for($i = 0; $i <= count($miss) - 1; $i++) {
            $prime = 0;
            for($j = 2; $j < $miss[$i]; $j++) {        
                if(($miss[$i] % $j) == 0){
                $prime = 1;
                
		     }       
            }
        if($prime == 0){
         array_push($arr_prime,$miss[$i]);
     }
}
    $sum = 0;
    for($i = 0; $i <= count($arr_prime) - 1; $i++) {
        if($i==0){
            echo "Missing Prime Numbers => ".$arr_prime[$i];
        }else{
            echo ",".$arr_prime[$i];
        }
        $sum += $arr_prime[$i]; 
}
        echo "<br>";
        echo "Sum of Prime Number is => ".$sum;

        // Coding back-end 02 here!!!! 
      

    }
    public function exam2(){
        //$date_list = array('02-03-2023', '01-03-2023', '03-03-2023', '05-03-2023', '04-03-2023');  
        $date_list = array('02-03-2022', '01-03-2022', '03-03-2022', '02-09-2021', '02-03-2022');  


        // Coding back-end 01 here!!!! 
        $dete = array();
        for($i = 0; $i <= count($date_list) - 1; $i++) {
            array_push($dete,date('Y-m-d', strtotime($date_list[$i])));
            }
            for($i = 0; $i <= count($dete) - 1; $i++) {
                echo $dete[$i];
                echo "<br>";
                }
        $max = max($dete);
        $min = min($dete);
        $ye1 = substr($max, 0, 4);
        $ye2 = substr($min, 0, 4);
        $ye1 = $ye1+543;
        $mo1 = substr($max, 5,2);
        $mo2 = substr($min, 5,2);
        $ye2 = $ye2+543;
        echo "Max. date = ".$max;
        echo "<br>";
        echo "Min. date = ".$min;
        echo "<br>";
        
        
        substr($max, 0, 8);
        $origin = new DateTime($min);
        $target = new DateTime($max);
        $interval = $origin->diff($target);
        echo "Difference Between Max and Min Date = ";
        echo $interval->format('%a days');
        

        // Coding back-end 01 here!!!!
    }
    public function test1(){
        $get_data=file_get_contents('https://covid19.ddc.moph.go.th/api/Cases/today-cases-all');
        $data['covid19_th']=json_decode($get_data);
        print_r ($get_data);
        //$this->load->view('Test/test',$data);
    }
    public function show_input()    
    {
        $this->load->view('Test/v_show_input');
    }

    public function show_value()    
    {
        $data['name_title'] = $this->request->getPost('name_title');
        $data['accept1'] = $this->request->getPost('accept1');
        $data['accept2'] = $this->request->getPost('accept2');
        $data['accept3'] = $this->request->getPost('accept3');
        $data['accept4'] = $this->request->getPost('accept4');
        $data['Fname'] = $this->request->getPost('Fname');
        $data['Lname'] = $this->request->getPost('Lname');
        $data['date'] = $this->request->getPost('date');
        $data['email'] = $this->request->getPost('email');
        $data['gender'] = $this->request->getPost('gender');
        $data['phone'] = $this->request->getPost('phone');
        $data['address'] = $this->request->getPost('address');
        $data['symptom'] = $this->request->getPost('symptom');
        $data['age'] = $this->request->getPost('age');
        $data['province'] = $this->request->getPost('province');
        $data['district'] = $this->request->getPost('district');

        $file = $this-> request->getFile('image');
        if($file->isValid())
        {
            $image_name = $file->getRandomName();
            $file->move('./picture',$image_name);
        }
        $data['image'] = $image_name;

        $this->load->view('Test/v_show_value',$data);
    }


}
	

