<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require dirname(__FILE__) . '/../DQS_controller.php'; // Controller in folder 
class test extends DQS_controller {
    public function exam1(){

        // echo "FRAME";               // การพิมพ์ค่าของ php 
        // print 'frame';
        // var_dump($frame);

        echo "<br><br>";            // ขึ้นบรรทัดใหม่

        // ---------------------------------------------

        $frame = "FRAME";           // การประกาศตัวแปร php
        $num1 = 10;
        $cars = array("Volvo",10,"Toyota"); 

        $x = true;
        $y = false;

        // ---------------------------------------------

        /*

        echo $frame . " Hello!!";       // การต่อ string
        echo  "$frame Hello!!";         // การต่อ string2

        */
        $num = "5";
        echo $num++;                    // num++  แสดงตัวเดิม +เลขทีหลัง
        echo "<br>";                    // ++num  แสดงเลขที่ + เลย
        echo $num;  

    }

    public function exam2(){

        // ฟังก์ชันของ String php

        $se = "Software Engineering";
        echo "$se<br><br>";
        echo '1. strlen คืนค่าจำนวนตัวอักษรทั้งหมด : ' . strlen($se);
        echo "<br>";
        echo '2. str_word_count คืนค่าคำในประโยค ตามเว้นวรรค : ' . str_word_count($se);
        echo "<br>";
        echo '3. strrev คือการ Reverse string : ' . strrev($se);
        echo "<br>";
        echo '4. strpos คือการ ค้นหาคำใน string : ' . strpos($se,'ware');
        echo "<br>";
        echo '5. str_replace คือการ แทนที่คำใน string : ' . str_replace('Software','FRAME',$se); // ตัว1-โดนแทน   ตัว2-คำแทนที่ ตัว3-ประโยค
        echo "<br>";
        echo '6. substr คือการตัดค่าออกมา : ' . substr($se,0,8);
        echo "<br>";
        echo '7. chop / rtrim ตามหาคำนั้นในประโยค แล้วลบออก จากขวามือ(ตรงกลางไม่ได้ เว้นไม่ได้) : ' . chop($se,"Engineering");
        echo "<br>";
        echo '8. ltrim() ตามหาคำนั้นในประโยค แล้วลบออก จากซ้ายมือ(ตรงกลางไม่ได้ เว้นไม่ได้) : ' . ltrim($se,"Software");
        echo "<br>";
        echo '9. substr_count คืนค่าจำนวนคำที่ค้นหาใน string : ' . substr_count($se,'e');
        echo "<br>";
        echo '10. strtoupper แปลงคำเป็นตัวใหญ่ : ' . strtoupper($se);
        echo "<br>";
        echo '11. strtolower แปลงคำเป็นตัวเล็ก : ' . strtolower($se);
        echo "<br>";
        echo '12. strtr คือการ แทนที่คำใน string (เป็นตัวอักษร) : ' . strtr($se,'e','x');
        echo "<br>";
        
    }


    public function exam3(){

        $frame = array("old"=>"18", "sex"=>"male", "birthday"=>"21/10/43");

        echo $frame['old'];

        // array 2 มิติ
        $cars = array (
            array("Volvo",22,18),
            array("BMW",15,13),
            array("Saab",5,2),
            array("Land Rover",17,15)
        );

        
        // echo '<br>';
        // echo count($cars);

        // echo '<br>';

        // echo count($cars[0]);

        echo '<br>Array2มิติ<br>-----------------------------<br>';

        for($i=0; $i < count($cars) ; $i++){
            for($j=0; $j < count($cars[$i]) ; $j++){
                echo $cars[$i][$j];
                echo ' , ';
            }
            echo '<br>';
        }
        echo '-----------------------------';






        // -------------- ประกาศตัวแปรตัวอย่าง -----------------------

        $arr_string = array("Volvo", "BMW", "Toyota");
        $arr_num = array(10,5,7,4);
        
        echo '<br><br> ตย.1 : ';
        
        for($i=0; $i < count($arr_string) ; $i++){
            echo $arr_string[$i];
            echo ' ';
        }
        echo '<br> ตย.2 : ';
        for($i=0; $i < count($arr_num) ; $i++){
            echo $arr_num[$i];
            echo ' ';
        }        
        echo "<br><br>";

        // ----------------------------------------------------------

        // ข้อที่ 1 
        echo '1. sort() เรียงน้อยไปมาก : ';
        sort($arr_num);

        for($i=0; $i < count($arr_num) ; $i++){
            echo $arr_num[$i];
            echo ' ';
        }
        echo "<br>";

        // ----------------------------------------------------------

        // ข้อที่ 2 
        echo '2. rsort() เรียงมากไปน้อย : ';
        rsort($arr_num);

        for($i=0; $i < count($arr_num) ; $i++){
            echo $arr_num[$i];
            echo ' ';
        }
        echo "<br>";

        // ----------------------------------------------------------
        
        echo '3. array_merge() รวม Array เข้าด้วยกัน : ';
        $arr_new = array_merge($arr_num,$arr_string);
        for($i=0; $i < count($arr_new) ; $i++){
            echo $arr_new[$i];
            echo ' ';
        }
        echo "<br>";
        
        // ----------------------------------------------------------

        echo '4. array_pop() ลบค่าตัวสุดท้ายใน Array : ';
        array_pop($arr_num);
        for($i=0; $i < count($arr_num) ; $i++){
            echo $arr_num[$i];
            echo ' ';
        }
        echo "<br>";
        
        // ----------------------------------------------------------

        echo '5. array_shift() ลบค่าตัวหน้าสุดใน Array : ';
        array_shift($arr_num);
        for($i=0; $i < count($arr_num) ; $i++){
            echo $arr_num[$i];
            echo ' ';
        }
        echo "<br>";
        
        // ----------------------------------------------------------

        echo '6. array_push() เพิ่มค่าตัวสุดท้ายใน Array : ';
        array_push($arr_num,4,5);
        for($i=0; $i < count($arr_num) ; $i++){
            echo $arr_num[$i];
            echo ' ';
        }
        echo "<br>";
        
        // ----------------------------------------------------------

        echo '7.การตั้ง Loop สลับหน้า-หลังใน Array : ';
        for($i=count($arr_num)-1; $i >= 0 ; $i--){
            echo $arr_num[$i];
            echo ' ';
        }
        echo "<br>";
        
        // ----------------------------------------------------------
        
        echo '8. array_search() ค้นหาคำ Toyota ใน Array : ';
        echo array_search("Toyota",$arr_string);

        echo "<br>";
        
        // ----------------------------------------------------------

        echo '9.array_slice() หั่นทิ้ง Array มาเก็บอีกตัว (หั่นทิพย์) : ';
        $ab = array_slice($arr_num,2,2);
        for($i=count($ab)-1; $i >= 0 ; $i--){
            echo $ab[$i];
            echo ' ';
        }
        echo "<br>";
        
        // ----------------------------------------------------------

        echo '10.array_sum() ถ้าเป็นตัวเลขทั้งหมด + ผลรวมให้ : ';
        echo array_sum($arr_num);

    
        // ----------------------------------------------------------


    }

}
	

