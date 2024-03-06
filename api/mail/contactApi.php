<?php
include("../config/config.php");

//Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$subject = $_POST['subject'];
$comments = $_POST['comments'];



//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings                 //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'hamarfreefire2021@gmail.com';                     //SMTP username
    $mail->Password   = 'opuoyyzoiyjybisd
    ';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('hamarfreefire2021@gmail.com', 'Latte Stone');



    $mail->addAddress('durgeshkumarraj62@gmail.com');     //Add a recipient


    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Contact us - ' . $_POST['subject'];
    $mail->Body    = '<b>Name: </b>' . $_POST['name'] . '<br/><b>Mobile: </b><a href="tel:+91' . $_POST['phone'] . '">' . $_POST['phone'] . '</a><br/><b>Email: </b>' . $_POST['email'] . '<br/><h4>Subject: ' . $_POST['subject'] . '</h4><br/><h2>Message: </h2>' . $_POST['comments'];

    if ($mail->send()) {
        echo 1;
    } else {
        echo 0;
    }
    // echo "<script>console.log('Email successfully sent to {$to}')</script>";
} catch (Exception $e) {
    // echo "<script>console.log('Message could not be sent. Mailer Error: {$mail->ErrorInfo}');";
    echo $e;
}
