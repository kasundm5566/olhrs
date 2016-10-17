<?php

// Create a database connection
include '../../common/dbconnection.php';
$objDBConnection = new dbconnection();
$connection = $objDBConnection->connection();

$sql = "SELECT first_name FROM user;";

$result = $connection->query($sql);

if ($result) {
    while ($row = $result->fetch_assoc()) {
        $dataArray[] = $row['first_name'];
    }

    echo json_encode($dataArray);
}

