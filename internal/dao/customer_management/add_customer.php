<?php

include '../../common/dbconnection.php';
$objDBConnection = new dbconnection();
$connection = $objDBConnection->connection();
$GLOBALS['connection'] = $connection;

$firstName = $_REQUEST['customer-fname'];
$lastName = $_REQUEST['customer-lname'];
$email = $_REQUEST['customer-email'];
$contactNo = $_REQUEST['customer-contactno'];
$username = $_REQUEST['customer-username'];
$password = sha1($_REQUEST['customer-password']);

//echo ($firstName . " " . $lastName . " " . $email . " " . $contactNo . " " . $username . " " . $password);

$sql = "INSERT INTO user (username,password,first_name,last_name,email,telephone,status) "
        . "VALUES ('$username','$password','$firstName','$lastName','$email','$contactNo','verified');";
$sql.="INSERT INTO user_group VALUES ((SELECT user_id FROM user WHERE username='$username'),4);";

$result = $connection->multi_query($sql);

echo $result;