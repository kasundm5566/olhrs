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
$group = $_REQUEST['update-group'];

$sql1 = "UPDATE user SET first_name='$firstName', last_name='$lastName', "
        . "email='$email', telephone='$contactNo', group_id="
        . "(SELECT group_id FROM groups WHERE group_name='$group') WHERE username='$username';";

$res1 = $connection->query($sql1);

if ($res1) {
    echo '1';
} else {
    echo $connection->error;
}