<?php

// Create a database connection
include '../../common/dbconnection.php';
$objDBConnection = new dbconnection();
$connection = $objDBConnection->connection();

$username = $_REQUEST['username'];

$sql1 = "DELETE FROM customer WHERE username='$username';";

$res1 = $connection->query($sql1);

if ($res1) {
    echo '1';
} else {
    echo $connection->error;
}
