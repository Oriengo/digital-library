<?php
require_once 'path/to/PHPMailer/src/PHPMailer.php';

$mail = new PHPMailer;
$mail->isSMTP();                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';       // Specify main and backup SMTP servers
$mail->SMTPAuth = true;               // Enable SMTP authentication
$mail->Username = 'oriengoonyango@gmail.com'; // SMTP username
$mail->Password = 'Ejoust2022#';  // SMTP password
$mail->SMTPSecure = 'tls';            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                    // TCP port to connect to



$mail->setFrom('oriengoonyango@gmail.com', 'Your Name');
$mail->addAddress('oritechsolutionss@gmail.com', 'Recipient Name');     // Add a recipient
$mail->isHTML(true);                                            // Set email format to HTML
$mail->Subject = 'Test Email';
$mail->Body    = 'This is a test email sent from PHPMailer';


if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}


if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}


?>