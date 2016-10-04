<?php

require './vendor/autoload.php';


$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.orange.fr';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'antoine.lucsko@wanadoo.fr';                 // SMTP username
$mail->Password = 'XXXXX';                           // SMTP password
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;                                    // TCP port to connect to

$mail->setFrom('antoine.lucsko@wanadoo.fr', 'Mailer');
$mail->addAddress('tony@hicode.ovh', 'Joe User');     // Add a recipient
$mail->addReplyTo('antoine.lucsko@wanadoo.fr', 'Information');

$mail->addAttachment('./tmp/cv2016.pdf');         // Add attachments
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Here is the subject';
$mail->Body    = 'This is the HTML message body <b>in bold!</b>';
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}