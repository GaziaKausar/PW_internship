<?php

session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';
require 'db.php';

if(isset($_POST['send_otp'])){

    $email = mysqli_real_escape_string(
        $conn,
        $_POST['email']
    );

    $otp = rand(100000,999999);

    $check = mysqli_query(
        $conn,
        "SELECT * FROM users WHERE email='$email'"
    );

    if(mysqli_num_rows($check) > 0){

        mysqli_query(
            $conn,
            "UPDATE users SET otp='$otp'
             WHERE email='$email'"
        );

    } else {

        mysqli_query(
            $conn,
            "INSERT INTO users(email,otp)
             VALUES('$email','$otp')"
        );
    }

    $mail = new PHPMailer(true);

    try{

        $mail->isSMTP();

        $mail->Host = 'smtp.gmail.com';

        $mail->SMTPAuth = true;

        $mail->Username = 'yourgmail@gmail.com';

        $mail->Password = 'yourpassword';

        $mail->SMTPSecure = 'tls';

        $mail->Port = 587;

        $mail->setFrom(
            'yourgmail@gmail.com',
            'OTP Login'
        );

        $mail->addAddress($email);

        $mail->isHTML(true);

        $mail->Subject = 'Your OTP Code';

        $mail->Body = "
            <h2>Your OTP Code</h2>
            <h1>$otp</h1>
        ";

        $mail->send();

        $_SESSION['email'] = $email;

        header('Location: verify.php');

    } catch(Exception $e){

        echo $mail->ErrorInfo;
    }
}
?>