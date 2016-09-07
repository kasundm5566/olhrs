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

$sql = "SELECT * FROM user WHERE username='$username' AND password='$password';";
$result = $connection->query($sql); //To execute query

$records_count = $result->num_rows; //To count the rows

if ($records_count == 1) {
    $row = $result->fetch_assoc(); // To create an array
    $user_id = $row['user_id'];
    $_SESSION['session_id'] = $session_id = time() . "_" . $user_id;
    $_SESSION['userinfo'] = $row;
    $date = date("Y-m-d"); //Date
    $time = date("H:i:s"); //Time
    $username = $row['username'];
//    log($date, $time, $username, $session_id); //To call log function
    header("Location:../customer-home.php");
} else {
    $msg = "Invalid User Name or Password";
    $msg1 = base64_encode($msg); //Encoding Mechanism
    header("Location:../index.php?msg=$msg1#login-section"); //Redirection n passing data
    //Through URL
}

//function log($date, $time, $username, $sessionId) { //To Insert login Details
//    $con = new mysqli("127.0.0.1", "root", "test123", "olhrs"); //Conncection string
//    $sql = "INSERT INTO log (log_date,log_time,username,session_id) VALUES('$date','$time','$username','$sessionId')";
//    $con->query($sql);
//}

?>
