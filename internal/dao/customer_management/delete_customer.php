<?php

// Create a database connection
include '../../common/dbconnection.php';
$objDBConnection = new dbconnection();
$connection = $objDBConnection->connection();

$username = $_REQUEST['username'];

$sql1 = "DELETE FROM user_group WHERE user_id IN (SELECT user_id FROM user where username='$username');";
$sql2 = "DELETE FROM user WHERE username='$username';";

$connection->query("START TRANSACTION;");

$res1 = $connection->query($sql1);
$res2 = $connection->query($sql2);

if ($res1 and $res2) {
    $connection->query("COMMIT;");
    echo '1';
} else {
    $connection->query("ROLLBACK;");
    echo '2';
}
