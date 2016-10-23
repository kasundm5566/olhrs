<?php
include '../common/dbconnection.php';
$objDBConnection = new dbconnection();
$connection = $objDBConnection->connection();
$GLOBALS['connection'] = $connection;

function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

$verficationCode = generateRandomString(32);
$username = $_REQUEST['veri-username'];

$sql = "SELECT email FROM customer WHERE username='$username';";
$res = $connection->query($sql);
if ($res) {
    while ($row = $res->fetch_assoc()) {
        $email = $row['email'];
    }
}

$sql2 = "INSERT INTO verification_code (code,username) VALUES ('$verficationCode', '$username');";
$res2 = $connection->query($sql2);

if ($res2) {
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
    $mail->addAddress($email);   // Add a recipient

    $mail->isHTML(true);  // Set email format to HTML

    $bodyContent = 'Dear ' . $username . ',' . '<br>';
    $bodyContent .= '<p>Thankyou for your interest in Aqua Pearl Lake Resort. We have received your registration details<br>';
    $bodyContent.= "To complete the registration process please enter the following code.<br>";
    $bodyContent.= "$verficationCode<br>";
    $bodyContent.='<p>Thank you.</p>';
    $bodyContent.='<p><i>Aqua Pearl Lake Resort-Support Team<i></p>';
    $bodyContent.='<h4>Please note this is a auto generated message. Do not reply to this email.</h4>';

    $mail->Subject = 'Support-Aqua Pearl Lake Resort';
    $mail->Body = $bodyContent;

    if (!$mail->send()) {
        echo $mail->ErrorInfo;
    } else {
        echo '1';
    }
} else {
    echo '0';
}