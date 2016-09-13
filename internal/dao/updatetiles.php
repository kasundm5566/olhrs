<?php

// Create a database connection
include '../common/dbconnection.php';
$objDBConnection = new dbconnection();
$connection = $objDBConnection->connection();

// What kind of operation ajax need to do. According to the parameter
// 'operation', suitable switch case will execute.
$operation = $_REQUEST['operation'];

switch ($operation) {
    case "staffTileUpdate":
        $sql = "SELECT COUNT(*) AS count FROM user;";
        $result = $connection->query($sql);
        while ($row = $result->fetch_assoc()) {
            echo $row['count'];
        }
        break;
    case "customerTileUpdate":
        $sql = "SELECT COUNT(*) AS count FROM customer;";
        $result = $connection->query($sql);
        while ($row = $result->fetch_assoc()) {
            echo $row['count'];
        }
        break;
    default :
        echo 'wrong operation...';
}
