<?php

include '../../common/dbconnection.php';
$objDBConnection = new dbconnection();
$connection = $objDBConnection->connection();

$username = $_REQUEST['username'];
$password = sha1($_REQUEST['password']);
$oldPassword = sha1($_REQUEST['oldPassword']);

$sql = "UPDATE customer SET password='$password' WHERE username='$username' AND password='$oldPassword';";
$result = $connection->query($sql);


echo $connection->affected_rows;
