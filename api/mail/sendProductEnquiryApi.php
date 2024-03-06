<?php
include("../config/config.php");

//Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


$product_id=$_POST['product_id'];
$name=$_POST['name'];
$phone=$_POST['phone'];
$message=$_POST['message'];


$sql="select * from product where id = {$product_id}";
$result=mysqli_query($con, $sql);

if(mysqli_num_rows($result)==1)
{
    $row=mysqli_fetch_assoc($result);

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
        $mail->Password   = 'qudtcidlzzoriwcs';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
        //Recipients
        $mail->setFrom('hamarfreefire2021@gmail.com', 'Lakno Hygienic Products');
    
        
        $mail->addAddress('durgeshkumarraj62@gmail.com');     //Add a recipient
    
    
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Enquiry - '.$row['Product_Name'];
        $mail->Body    = '<b>Product: </b>'.$row['product_name'].'<br/><b>Name: </b>'.$_POST['name'].'<br/><b>Mobile: </b><a href="tel:+91'.$_POST['phone'].'">'.$_POST['phone'].'</a><br/><h2>Message: </h2>'.$_POST['message'];
    
        if($mail->send())
        {
            echo 1;
        }
        else
        {
            echo 0;
        }
        // echo "<script>console.log('Email successfully sent to {$to}')</script>";
    } 
    catch (Exception $e){
        // echo "<script>console.log('Message could not be sent. Mailer Error: {$mail->ErrorInfo}');";
        echo $e;
    }
}
else
{

}


?>
