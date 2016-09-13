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

$date = date("Y-m-d");

$sql1 = "INSERT INTO customer (username,password,first_name,last_name,email,telephone,status,registered_date)"
        . "VALUES ('$username','$password','$firstName','$lastName','$email','$contactNo','verified','$date');";


$res1 = $connection->query($sql1);

if ($res1) {
    echo '1';
} else {
    echo $connection->error;
}