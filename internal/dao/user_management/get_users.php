<?php

// Create a database connection
include '../../common/dbconnection.php';
$objDBConnection = new dbconnection();
$connection = $objDBConnection->connection();

$page = $_REQUEST['page'];
$recPerPage = $_REQUEST['recordsCount'];
$offset = ($page - 1) * $recPerPage;

//$sql = "SELECT first_name, last_name, username, password, email, telephone, status FROM user LIMIT 10 OFFSET $offset;";

$sql = "SELECT username,first_name,last_name,email,telephone,registered_date,group_name FROM user u, groups g WHERE u.group_id=g.group_id LIMIT $recPerPage OFFSET $offset;";
$dataArray = [];

$result = $connection->query($sql);
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $dataArray[] = $row;
    }
    echo json_encode($dataArray);
}

