<?php

include '../../common/dbconnection.php';
$objDBConnection = new dbconnection();
$connection = $objDBConnection->connection();

$username = $_POST['profile-username'];
$fname = $_POST['profile-fname'];
$lname = $_POST['profile-lname'];
$email = $_POST['profile-email'];
$tel = $_POST['profile-tel'];

$sql = "UPDATE customer SET first_name='$fname',last_name='$lname',email='$email',telephone='$tel' WHERE username='$username';";
$result = $connection->query($sql);

if ($result) {
    $msg = "Data updated successfully. Please login back to see the modifications.";
    $msg1 = base64_encode($msg); //Encoding Mechanism
    header("Location:../../profile.php?msg=$msg1"); //Redirection n passing data
    //Through URL
} else {
    $msg = "Error updating data...";
    $msg1 = base64_encode($msg); //Encoding Mechanism
    header("Location:../../profile.php?msg=$msg1"); //Redirection n passing data
    //Through URL
}
