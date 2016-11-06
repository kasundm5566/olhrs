<?php

// Create a database connection
include '../../common/dbconnection.php';
$objDBConnection = new dbconnection();
$connection = $objDBConnection->connection();

$sql = "SELECT COUNT(*) AS count FROM payment;";

$result = $connection->query($sql);

while ($row = $result->fetch_assoc()) {
    echo $row['count'];
}