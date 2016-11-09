<?php

if (!isset($_SESSION)) {
    session_start();
}

include '../common/dbconnection.php';
$objDBConnection = new dbconnection();
$connection = $objDBConnection->connection();
$GLOBALS['connection'] = $connection;
$username = $_POST['login-username'];
$password = sha1($_POST['login-password']);

$sql = "SELECT * FROM customer WHERE BINARY username='$username' AND password='$password';";
$result = $connection->query($sql); //To execute query

$records_count = $result->num_rows; //To count the rows

if ($records_count == 1) {
    $stat_sql = "SELECT status FROM customer WHERE username='$username'";
    $stat_result = $connection->query($stat_sql);
    $stat_row = $stat_result->fetch_assoc();
    if ($stat_row['status'] == "Not-verified") {
        $encodedUsername = base64_encode($username); //Encoding Mechanism
        header("Location:../verify-account.php?username=$encodedUsername");
    } else {
        $row = $result->fetch_assoc(); // To create an array
        $_SESSION['userinfo'] = $row;
        $_SESSION['username'] = $row['username'];
        header("Location:../customer-home.php");
    }
} else {
    $msg = "Invalid User Name or Password";
    $msg1 = base64_encode($msg); //Encoding Mechanism
    header("Location:../index.php?msg=$msg1#login-section"); //Redirection n passing data
    //Through URL
}
?>
