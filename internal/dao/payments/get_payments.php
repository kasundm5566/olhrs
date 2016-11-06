<?php

// Create a database connection
include '../../common/dbconnection.php';
$objDBConnection = new dbconnection();
$connection = $objDBConnection->connection();

$page = $_REQUEST['page'];
$recPerPage = $_REQUEST['recordsCount'];
$offset = ($page - 1) * $recPerPage;

//$sql = "SELECT first_name, last_name, username, password, email, telephone, status FROM user LIMIT 10 OFFSET $offset;";

$sql = "SELECT payment_date,amount,username,type,payment_method_name FROM"
        . " payment p,reservation r,customer c,payment_method pm WHERE"
        . " p.reservation_id=r.reservation_id AND r.customer_id=c.customer_id"
        . " AND p.payment_method_id=pm.payment_method_id LIMIT $recPerPage OFFSET $offset;";
$dataArray = [];

$result = $connection->query($sql);
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $dataArray[] = $row;
    }
    echo json_encode($dataArray);
}

