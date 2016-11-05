<?php

// Create a database connection
include '../../common/dbconnection.php';
$objDBConnection = new dbconnection();
$connection = $objDBConnection->connection();

$page = $_REQUEST['page'];
$recPerPage = $_REQUEST['recordsCount'];
$offset = ($page - 1) * $recPerPage;

//$sql = "SELECT first_name, last_name, username, password, email, telephone, status FROM user LIMIT 10 OFFSET $offset;";

$sql = "SELECT first_name,last_name,username,rating,comment,date,type"
        . " FROM reservation r,feedback f,customer c WHERE r.feedback_id=f.feedback_id"
        . " AND f.customer_id=c.customer_id LIMIT $recPerPage OFFSET $offset;";
$dataArray = [];

$result = $connection->query($sql);
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $dataArray[] = $row;
    }
    echo json_encode($dataArray);
}

