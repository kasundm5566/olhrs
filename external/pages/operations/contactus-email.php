<?php

$senderName = $_REQUEST['sender-name'];
$senderEmail = $_REQUEST['sender-email'];
$senderContactNo = $_REQUEST['sender-contactno'];
$senderMessage = $_REQUEST['sender-message'];

require("../../PHPMailer_5.2.0/class.phpmailer.php");

$mail = new PHPMailer();

$mail->isSMTP();                            // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';             // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                     // Enable SMTP authentication
$mail->Username = 'kasundinesh5566@gmail.com';          // SMTP username
$mail->Password = 'CricketLegendPonting'; // SMTP password
$mail->SMTPSecure = 'ssl';                  // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;                          // TCP port to connect to

$mail->setFrom('kasundinesh5566@gmail.com');
$mail->addAddress($senderEmail);   // Add a recipient

$mail->isHTML(true);  // Set email format to HTML

$bodyContent = 'Dear ' . $senderName . ',' . '<br>';
$bodyContent .= '<p>This is to confirm that we have received your email. We will get back to you soon.<br>';
$bodyContent.='The content of email received is given below.</p><hr>';
$bodyContent.='<h5>Name: </h5>' . $senderName;
$bodyContent.='<h5>Contact no: </h5>' . $senderContactNo;
$bodyContent.='<h5>Message: </h5>' . $senderMessage . '<br><br><hr>';
$bodyContent.='<p>Thank you for contacting us.</p>';
$bodyContent.='<p><i>Aqua Pearl Lake Resort-Support Team<i></p>';
$bodyContent.='<h4>Please note this is a auto generated message. Do not reply to this email.</h4>';

$mail->Subject = 'Support-Aqua Pearl Lake Resort';
$mail->Body = $bodyContent;

if (!$mail->send()) {
//    echo 'Message could not be sent.';
//    echo 'Mailer Error: ' . $mail->ErrorInfo;
    $status = "error";
    $msg = "Error sending email. ".$mail->ErrorInfo;
    $encoded_status = base64_encode($status); //Encoding Mechanism
    $encoded_msg = base64_encode($msg); //Encoding Mechanism
    header("Location:../index.php?msg=$encoded_msg&status=$encoded_status#contact-section"); //Redirection n passing data
} else {
    $status = "success";
    $msg = "Message has been sent. We'll get back to you soon.";
    $encoded_status = base64_encode($status); //Encoding Mechanism
    $encoded_msg = base64_encode($msg); //Encoding Mechanism
    header("Location:../index.php?msg=$encoded_msg&status=$encoded_status#contact-section"); //Redirection n passing data
}
?>