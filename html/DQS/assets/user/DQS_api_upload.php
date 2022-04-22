<?php
error_reporting(E_ERROR | E_PARSE);


// Response object structure
$response = new stdClass;
$response->status = null;
$response->message = null;
//$response->filename = null;

// Uploading file
//$destination_dir = "./CHB005/Home/";
$uername = $_POST['Username'];
$destination_dir = "./".$uername."/Home/";
$base_filename = basename($_FILES["file"]["name"]);
$base_filetype = $_FILES['file']['type'];
$target_file = $destination_dir . $base_filename;

if(!$_FILES["file"]["error"])
{
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {        
        $response->status = true;
        $response->message = "File uploaded successfully";

    } else {

        $response->status = false;
        $response->message = "File failed";
        //$response->filename = $target_file;
    }    
} 
else
{
    $response->status = false;
    $response->message = "File uploading failed";
    //$response->filename = $base_filename;
}
// print_r($_FILES);






    header('Content-Type: application/json');
echo json_encode($response);