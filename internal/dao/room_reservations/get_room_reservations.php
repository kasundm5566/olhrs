<?php

// Create a database connection
include '../../common/dbconnection.php';
$objDBConnection = new dbconnection();
$connection = $objDBConnection->connection();

$page = $_REQUEST['page'];
$recPerPage = $_REQUEST['recordsCount'];
$offset = ($page - 1) * $recPerPage;

//$sql = "SELECT first_name, last_name, username, password, email, telephone, status FROM user LIMIT 10 OFFSET $offset;";

$sql = "SELECT room_type_name,placed_date,check_in,check_out,count,total,username"
        . " FROM reservation r,room_reservation rr,customer c,room_type rt"
        . " WHERE r.reservation_id=rr.reservation_id AND r.customer_id=c.customer_id"
        . " AND rr.room_type_id=rt.room_type_id LIMIT $recPerPage OFFSET $offset;";
$dataArray = [];

$result = $connection->query($sql);
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $dataArray[] = $row;
    }
    echo json_encode($dataArray);
}

