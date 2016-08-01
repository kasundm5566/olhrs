<?php
if (!isset($_SESSION)) { //To check session not start
    session_start(); //Start a session
}
$username = $_POST['username']; //To get Inputs from From
$password = sha1($_POST['password']); //Encryption 

include '../model/login.php'; //Server Side Include
$objLogin = new login(); //To create an object using login class
$result = $objLogin->loginvalidate($username, $password); //To call a method and passing parameters
$records_count = $result->num_rows; //To count the rows
if ($records_count == 1) {
    $row = $result->fetch_assoc(); // To create an array
    $user_id = $row['id'];
    $_SESSION['session_id'] = $session_id = time() . "_" . $user_id;
    $_SESSION['userinfo'] = $row;
    $date = date("Y-m-d"); //Date
    $time = date("H:i:s"); //Time
    $username = $row['username'];
    $objLogin->log($date, $time, $username, $session_id); //To call log function

    header("Location:../view/dashboard.php");
} else {
    $msg = "Invalid User Name or Password";
    $msg1 = base64_encode($msg); //Encoding Mechanism
    header("Location:../view/index.php?msg=$msg1"); //Redirection n passing data
    //Through URL
}
?>