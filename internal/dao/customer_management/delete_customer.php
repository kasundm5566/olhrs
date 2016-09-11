<?php

// Create a database connection
include '../../common/dbconnection.php';
$objDBConnection = new dbconnection();
$connection = $objDBConnection->connection();

$username = $_REQUEST['username'];

$preSql = "SET SQL_SAFE_UPDATES = 0;";
$sql = "DELETE FROM user_group WHERE user_id IN (SELECT user_id FROM user where username='$username');";
$sql .= "DELETE FROM user WHERE username='$username';";
$postSql = "SET SQL_SAFE_UPDATES = 1;";


if ($connection->multi_query($sql) === TRUE) {
    echo 1;
} else {
    echo $connection->error;
}

