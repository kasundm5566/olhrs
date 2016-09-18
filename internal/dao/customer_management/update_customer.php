<?php

// Create a database connection
include '../../common/dbconnection.php';
$objDBConnection = new dbconnection();
$connection = $objDBConnection->connection();

$username = $_REQUEST['update-username'];
$firstName = $_REQUEST['update-fname'];
$lastName = $_REQUEST['update-lname'];
$email = $_REQUEST['update-email'];
$contactNo = $_REQUEST['update-contactno'];

$sql1 = "UPDATE customer SET first_name='$firstName', last_name='$lastName', email='$email', telephone='$contactNo' WHERE username='$username';";

$res1 = $connection->query($sql1);

if ($res1) {
    echo '1';
} else {
    echo $connection->error;
}