<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require('koneksi.php');
session_start();

function sendmail_verify($email,$verify_token,$email_template){
    //Load Composer's autoloader
    require 'vendor/autoload.php';

    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'nabiilahrizqiamal@gmail.com';                     //SMTP username
        $mail->Password   = 'qzhaeghaehcyulpw';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
        $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('from@example.com', 'Mailer');
        $mail->addAddress('nabiilahrizqiamalia@gmail.com', 'User');     //Add a recipient              //Name is optional
        $mail->addReplyTo('no-reply@example.com', 'Information');

        //Content
        $mail->isHTML(true);    
        $email_template = "
            <h2>Klik tautan berikut</h2>
            <a href=''>[klik disini]</a>
        ";                             //Set email format to HTML
        $mail->Subject = 'verifikasi email';
        $mail->Body    = $email_template;

        $mail->send();
        echo 'email terkirim';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
