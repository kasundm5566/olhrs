<?php

include '../../common/dbconnection.php';
$objDBConnection = new dbconnection();
$connection = $objDBConnection->connection();
$GLOBALS['connection'] = $connection;

$username = $_REQUEST['username'];

$sql = "SELECT COUNT(user_id) AS count FROM user WHERE username='$username';";
$result = $connection->query($sql);

if ($result) {
    while ($row = $result->fetch_assoc()) {
        echo $row['count'];
    }
}
