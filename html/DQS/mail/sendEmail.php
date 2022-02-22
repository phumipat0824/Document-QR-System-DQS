<?php
    use PHPMailer\PHPMailer\PHPMailer;

    if(isset($_POST['email'])) {
        $email = $_POST['email'];
        $name = "แจ้งรีเซ็ตรหัสผ่านระบบ DQS";
        $header = "แจ้งรีเซ็ตรหัสผ่านระบบ DQS";
        $detail  = "กดที่ลิงค์เพื่อรีเซ็ตรหัสผ่านของคุณ";

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