<?php

/********************************************************

./assets/user/CHB005/abc

path_root = "./assets/user/";

user_folder = "CHB005"; // ID 5

add_new_folder = "abc"; 
full_path_folder = path_root+user_folder+[home]+add_new_folder ;

add_new_flle = "xyzQR10.pdf"; 
full_path_file = path_root+user_folder+[home]+add_new_folder + add_new_flle;

./assets/user/
	L - CHB005 (UID=5)
		L - ABC (FID=50)
		L- abcQR (FID=48)	-> "/assets/user/CHB005/home/abcQR.pdf"
		L - XYZ (FID=51)
			L- xyzQR (FID=46)	-> "/assets/user/CHB005/xyz/xyzQR.pdf"
			L- xyzQR (FID=49)	-> "/assets/user/CHB005/xyz/xyzQR5.pdf"
		L- xyzQR1 (FID=47)	-> "/assets/user/CHB005/home/abcQR.pdf"			

API => http://103.129.15.182/DQS/assets/user/mqr.php?fid=abc&fname=abcQR99

*/

$user_folder = $_SESSION["USER_LOGIN_NAME"];

$folder_name = $_GET['fid'];

$file_name = $_GET['fname'];

// mkdir("CHB005/xyz", 0777, true);

$user_folder = "CHB005";

$file_name = $file_name."pdf";

$result = mkdir($user_folder."/".$folder_name, 0777, true);

echo $result;

?>