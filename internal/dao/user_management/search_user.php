<?php

// Create a database connection
include '../../common/dbconnection.php';
$objDBConnection = new dbconnection();
$connection = $objDBConnection->connection();

//$page = $_REQUEST['page'];
//$offset = ($page - 1) * 10;

$page = $_REQUEST['page'];
$offset = ($page - 1) * 10;
$firstName = $_REQUEST['searchName'];


//$sql = "SELECT first_name, last_name, username, password, email, telephone, status FROM user LIMIT 10 OFFSET $offset;";

$sql = "SELECT username,first_name,last_name,email,telephone,registered_date,group_name FROM user u, groups g WHERE u.group_id=g.group_id HAVING first_name LIKE '$firstName%' LIMIT 10 OFFSET $offset;";
$dataArray = [];

$result = $connection->query($sql);
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $dataArray[] = $row;
    }
    echo json_encode($dataArray);
}