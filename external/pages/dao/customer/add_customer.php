<?php

include '../../common/dbconnection.php';
$objDBConnection = new dbconnection();
$connection = $objDBConnection->connection();

$username = $_REQUEST['username'];

$sql1 = "INSERT INTO customer (username,password,first_name,last_name,email,telephone,status,registered_date)"
        . "VALUES ('$username','$password','$firstName','$lastName','$email','$contactNo','Not-verified','$date');";
//Random code


$res1 = $connection->query($sql1);

if ($res1) {
    echo '1';
} else {
    echo $connection->error;
}
