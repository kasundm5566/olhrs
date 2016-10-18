<?php

include '../../common/dbconnection.php';
$objDBConnection = new dbconnection();
$connection = $objDBConnection->connection();
$GLOBALS['connection'] = $connection;

$firstName = $_REQUEST['user-fname'];
$lastName = $_REQUEST['user-lname'];
$email = $_REQUEST['user-email'];
$contactNo = $_REQUEST['user-contactno'];
$username = $_REQUEST['user-username'];
$password = sha1($_REQUEST['user-password']);
$group = $_REQUEST['user-group'];

$date = date("Y-m-d");

$sql1 = "INSERT INTO user (username,password,first_name,last_name,email,telephone,registered_date, group_id)"
        . "VALUES ('$username','$password','$firstName','$lastName','$email','$contactNo','$date', (SELECT group_id FROM groups WHERE group_name='$group'));";


$res1 = $connection->query($sql1);

if ($res1) {
    echo '1';
} else {
    echo $connection->error;
}