<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include '../common/dbconnection.php';
$objDBConnection = new dbconnection();
$connection = $objDBConnection->connection();

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
