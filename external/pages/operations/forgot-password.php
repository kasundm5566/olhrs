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

$generatedPassword = generateRandomString(8);
$generatedPasswordEncoded = sha1($generatedPassword);
$username = $_POST['forgotpass-username'];
$email = $_POST['forgotpass-email'];

$sql = "SELECT email FROM customer WHERE username='$username';";
$res = $connection->query($sql);
if ($res) {
    while ($row = $res->fetch_assoc()) {
        $email = $row['email'];
    }
}

$sql2 = "UPDATE customer SET password='$generatedPasswordEncoded' WHERE username='$username' AND email='$email';";
$res2 = $connection->query($sql2);
$res3 = $connection->query("SELECT ROW_COUNT() AS affected_count;");

$affected = 0;
while ($row = $res3->fetch_assoc()) {
    $affected = $row['affected_count'];
}

if ($affected > 0) {

    require("../../PHPMailer_5.2.0/class.phpmailer.php");

    $mail = new PHPMailer();

    $mail->isSMTP();                            // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';             // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                     // Enable SMTP authentication
    $mail->Username = 'sandboxtest23@gmail.com';          // SMTP username
    $mail->Password = 'testAccount123'; // SMTP password
    $mail->SMTPSecure = 'ssl';                  // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 465;                          // TCP port to connect to

    $mail->setFrom('sandboxtest23@gmail.com');
    $mail->addAddress($email);   // Add a recipient

    $mail->isHTML(true);  // Set email format to HTML

    $bodyContent = 'Dear ' . $username . ',' . '<br>';
    $bodyContent .= '<p>We have reset your password and here is a auto generated password.<br>';
    $bodyContent.= "We recommend you to change your password once you log in.<br><strong>";
    $bodyContent.= "$generatedPassword</strong><br>";
    $bodyContent.='<p>Thank you.</p>';
    $bodyContent.='<p><i>Aqua Pearl Lake Resort-Support Team<i></p>';
    $bodyContent.='<h4>Please note this is a auto generated message. Do not reply to this email.</h4>';

    $mail->Subject = 'Support-Aqua Pearl Lake Resort';
    $mail->Body = $bodyContent;

    if (!$mail->send()) {
        $msg = "Error occurred in mail server.";
        $msg1 = base64_encode($msg); //Encoding Mechanism
        header("Location:../forgot-password-status.php?msg=$msg1"); //Redirection n passing data
        //Through URL
        echo '0';
    } else {
        $msg = "Password reset success. We have sent you a new password to your email.";
        $msg1 = base64_encode($msg); //Encoding Mechanism
        header("Location:../forgot-password-status.php?msg=$msg1"); //Redirection n passing data
        //Through URL
        echo '1';
    }
} else {
    $msg = "Password reset failed. Please make sure the credentials provided are correct.";
    $msg1 = base64_encode($msg); //Encoding Mechanism
    header("Location:../forgot-password-status.php?msg=$msg1"); //Redirection n passing data
    //Through URL
    echo '0';
}