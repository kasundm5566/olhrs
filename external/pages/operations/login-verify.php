<?php

if (!isset($_SESSION)) { //To check session not start
    session_start(); //Start a session
}

include '../common/dbconnection.php';
$objDBConnection = new dbconnection();
$connection = $objDBConnection->connection();
$GLOBALS['connection'] = $connection;
$username = $_POST['login-username'];
$password = sha1($_POST['login-password']);

$sql = "SELECT * FROM customer WHERE username='$username' AND password='$password';";
$result = $connection->query($sql); //To execute query

$records_count = $result->num_rows; //To count the rows

if ($records_count == 1) {
    $row = $result->fetch_assoc(); // To create an array
    $_SESSION['userinfo'] = $row;
    $username = $row['username'];
    $_SESSION['username'] = $username;
    header("Location:../customer-home.php");
} else {
    $msg = "Invalid User Name or Password";
    $msg1 = base64_encode($msg); //Encoding Mechanism
    header("Location:../index.php?msg=$msg1#login-section"); //Redirection n passing data
    //Through URL
}
?>
