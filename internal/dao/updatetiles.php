<?php
// Create a database connection
include '../common/dbconnection.php';
$objDBConnection = new dbconnection();
$connection = $objDBConnection->connection();

// What kind of operation ajax need to do. According to the parameter
// 'operation', suitable switch case will execute.
$operation = $_REQUEST['operation'];

switch ($operation) {
    case "userTileUpdate":
        $sql = "SELECT COUNT(*) AS count FROM user;";
        $result = $connection->query($sql);
        $dataArray = $result->fetch_assoc();
        echo json_encode($dataArray);
        break;
    default :
        echo 'wrong operation...';
}
