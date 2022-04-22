<?php

// $uername = $_POST['Username'];
// $destination_dir = "./".$uername."/Home/";
// $base_filename = basename($_FILES["file"]["name"]);
// $base_filetype = $_FILES['file']['type'];
// $target_file = $destination_dir . $base_filename;

$con = mysqli_connect("localhost","devteam1","1212312121!","devteam1_dqs");

$content = trim(file_get_contents("php://input"));
  $json = json_decode($content,true);
  $type = $json["type"];
  $uername = $json['Username'];
$destination_dir = "./assets/user/".$uername."/Home/";
$base_filename = $json['fileName'];
$base_filetype = $json['fileName'];
$target_file = $destination_dir . $base_filename;

  
  
//DB
if ($_SERVER["REQUEST_METHOD"] === 'POST')
{
    $query = "INSERT INTO DQS_Document (`doc_name`,`doc_type`,`doc_path`,`doc_mem_id`)   VALUES('$base_filename','$base_filetype','$target_file',5)";
    $result = $con->query($query);
    if ($result == 1)
    {
        $data["message"] = "data saved successfully";
        $data["status"] = "Ok";
    }
    else
    {
        $data["message"] = "data not saved successfully";
        $data["status"] = "error";    
    }
}
else
    {
    $data["message"] = "Format not supported";
    $data["status"] = "error";    
}
header('Content-Type: application/json');
echo json_encode($result);