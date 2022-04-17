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
public function show(){
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
    }
    public function backend1()
    {
       
        $arr1 = array("National Top Five Institute in Digital Technology and Smart System driving the EEC and the Eastern Part of Thailand");
        $arr2 = array("one of the five faculties in the country dedicated to civilized digital technology and smart systems graduates");
        $arr3 = array("TO PROPEL THE EEC AND THE EASTERN REGION");

        // Coding back-end 01 here!!!! 
        $use = array();
        $used = array();
        $first = implode(" ",$arr1);
        $second = implode(" ",$arr2);
        $third = implode(" ",$arr3);
        $total = $first." ".$second." ".$third;
        $cap = strtoupper($total);

        echo "First String = ".implode(" ",$arr1)."<br>";
        echo "Second String = ".implode(" ",$arr2)."<br>";
        echo "Third String = ".implode(" ",$arr3)."<br>";
        echo "Total words = ".str_word_count($total)."<br>";
        echo "Group by words : "."<br>";
        //print_r(str_word_count($total,1)[0]);


        for($i = 0 ;$i<str_word_count($cap);$i++){
            $num = 1;
            $x = 0;
            for($j = 0 ;$j<str_word_count($cap);$j++){
                if(str_word_count($cap,1)[$i] == str_word_count($cap,1)[$j]){
                    $x = $x+1;
                }

            }
            
            // $words = 0;
            // if($x>1){
            //     for($k = 0 ; $k < $i ;$k++){
            //         if(str_word_count($total,1)[$i] == str_word_count($total,1)[$k]){
            //             $words = 1;
            //         }
                        
            //     }

            // }
          
                
                
                $chack = 0;
                for($k = 0 ; $k < count($use) ;$k++){
                        if(str_word_count($cap,1)[$i] == $use[$k]){
                            $chack += 1;
                            // array_push($used,str_word_count($cap,1)[$i]." = ".$x);
                        }

                }
                array_push($use,str_word_count($cap,1)[$i]);
                if($chack == 0){
                    array_push($used,str_word_count($cap,1)[$i]." = ".$x);
                }
                $num += $i;
                   // echo "&nbsp".$num.". ".str_word_count($cap,1)[$i]." = ".$x."<br>";
                
            

        }
        $num = 0;
        for($i = 0;$i<count($used);$i++){
            $num += 1;
            echo "&nbsp".$num.". ".$used[$i]."<br>";

        }



        // Coding back-end 01 here!!!! 
    }

    public function backend2()
    {
      
        $dob = array('21-03-2019', '31-08-1992', '15-04-1998', '12-02-1994', '23-01-1996');
        $currentDate = date("d-m-Y");
        $prime = array();
        $notprime = array();
        $dete = array();
        $detemax = array();
        $maxdete = array();
        $age = array();
        
        
        
            for($i = 0; $i <= count($dob) - 1; $i++) { 
                array_push($dete,date("Y F dD", strtotime($dob[$i])));
            }
            for($i = 0; $i <= count($dob) - 1; $i++) { 
                array_push($detemax,date("Y-F-d", strtotime($dob[$i])));
            }
            for($i = 0; $i <= count($dob) - 1; $i++) { 
                array_push($maxdete,date("d-m-Y", strtotime($dob[$i])));
            }
            for($i = 0; $i <= count($dob) - 1; $i++) { 
                $agetime = date_diff(date_create($dob[$i]), date_create($currentDate));
                array_push($age,$agetime->format("%y"));
            }
        $max = max($dete);
        $min = min($dete);
        //date_format($min,"Y/m/d H:i:s");
        $agemax = date_diff(date_create($max), date_create($currentDate));
        $agemin = date_diff(date_create($min), date_create($currentDate));
        function date_sort($a, $b) {
            return strtotime($a) - strtotime($b);
        }
        usort($dete, "date_sort");
        usort($maxdete, "date_sort");
        //usort($age, "date_sort");
        // Coding back-end 02 here!!!! 
        echo "List of DOB => ".implode(",",$dob)."<br>";
        echo "List of DOB (Decs) => ".implode(",",$maxdete)."<br>";
        // for(){

        // }
        arsort($age);
        //var_dump($age);
        echo "List of Age (Decs) => ".implode(",",$age)."<br>";
        echo "Max Age = ".$agemin->format("%y")." (".$min.")"."<br>";
        echo "Min Age = ".$agemax->format("%y")." (".$max.")"."<br>";

        //print_r($age);
        //echo "<br>";
        
        //echo $max;

        //$arr = array('11-01-2012', '01-01-2014', '01-01-2015', '09-02-2013', '01-01-2013');    
        
        
        //print_r($dete);
for($i = 0 ;$i <= count($age) - 1;$i++){
        //echo $age[$i]."<br>";
        $n = 0;
    for($j = 2; $j < $age[$i]; $j++) {
        if($age[$i] % $j == 0){
            $n++;
        break;
    }
}
    if ($n == 0){
        //echo "prime".$age[$i]."<br>";
        array_push($prime,$age[$i]);
    } else {
        //echo "notprime".$age[$i]."<br>";
        array_push($notprime,$age[$i]);
    }
    }

    $sump = 0;
    for($i = 0 ;$i <= count($prime) - 1;$i++){
        $sump += $prime[$i];
}
echo "Sum of Prime Numbers in Age List => ".implode("+",$prime)." = ".$sump."<br>";
$sumn = 0;
for($i = 0 ;$i <= count($notprime) - 1;$i++){
    $sumn += $notprime[$i];
}
echo "Sum of Nto Prime Numbers in Age List => ".implode("+",$notprime)." = ".$sumn."<br>";

// echo $max."<br>";
// echo $min."<br>";

// $ye1 = substr($max, 0, 4);
// $ye2 = substr($min, 0, 4);
// $ye1 = $ye1+543;
// $mo1 = substr($max, 5,2);
// $mo2 = substr($min, 5,2);
// echo strpos($min,'1',1);
// $ye2 = $ye2+543;

        // Coding back-end 02 here!!!! 
    

}



}
