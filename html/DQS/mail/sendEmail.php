<?php
    use PHPMailer\PHPMailer\PHPMailer;
    
    if(isset($_POST['email'])) {
        $email = $_POST['email'];
        $name = "Document QR System : DQS";
        $header = "แจ้งรีเซ็ตรหัสผ่านระบบจัดเก็บเอกสารเพื่อสร้างคิวอาร์โค้ด (Document QR System : DQS)";
        $detail = "กดที่ลิงค์เพื่อรีเซ็ตรหัสผ่านของคุณ";
        $detail = ' <div style="border: 1px solid #eeeeee;">
                    <center>
                        <div style="padding-top:2%">
                            <img src="http://103.129.15.182/DQS/assets/image/logo_dqs.PNG" height="150" width="150">
                        </div>    
                    </center>
                    <center style="margin-bottom:10px;">
                    <h2>Document QR System : DQS</h2>
                    </center>
                    <br>
                    <div style="margin-left: 5%;margin-bottom: 2%;">
                        <a>ท่านได้ทำการแจ้งลืมรหัสผ่าน</a><br>
                        <a>โปรดคลิกที่ลิงค์ดังกล่าวเพื่อตั้งรหัสผ่านใหม่</a><br>
                        <a>Please click the link below to set new password </a>
                        <a href="http://103.129.15.182/DQS"> คลิกที่นี่</a>
                    </div>
                    </div>';
        require_once "PHPMailer/PHPMailer.php";
        require_once "PHPMailer/SMTP.php";
        require_once "PHPMailer/Exception.php";

        $mail = new PHPMailer();

        // SMTP Settings
        $mail->isSMTP();
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth = true;
        $mail->Username = "info.dqs.team1@gmail.com"; // enter your email address
        $mail->Password = "1212312121!"; // enter your password
        $mail->Port = 465;
        $mail->SMTPSecure = "ssl";

        //Email Settings
        $mail->isHTML(true);
        $mail->setFrom($email, $name);
        $mail->addAddress($email); // Send to mail
        $mail->CharSet = "utf-8";
        $mail->Subject = $header;
        $mail->Body = $detail;

        if($mail->send()) {
            $status = "success";
            $response = "Email is sent";
        } else {
            $status = "failed";
            $response = "Something is wrong" . $mail->ErrorInfo;
        }

        exit(json_encode(array("status" => $status, "response" => $response)));
    }
?>