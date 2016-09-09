<?php

// Create a database connection
include '../common/dbconnection.php';
$objDBConnection = new dbconnection();
$connection = $objDBConnection->connection();

$sql = "SELECT * FROM user;";
$dataArray = [];

$result = $connection->query($sql);
while ($row = $result->fetch_assoc()) {
    $dataArray[] = $row;
}
echo json_encode($dataArray);

