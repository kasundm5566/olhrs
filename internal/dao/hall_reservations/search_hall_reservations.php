<?php

// Create a database connection
include '../../common/dbconnection.php';
$objDBConnection = new dbconnection();
$connection = $objDBConnection->connection();

$page = $_REQUEST['page'];
$offset = ($page - 1) * 10;
$year = $_REQUEST['searchYear'];



$sql = "SELECT hall_name,placed_date,reservation_date,reservation_status,total,username"
        . " FROM reservation r,hall_reservation hr,customer c,hall h WHERE"
        . " r.reservation_id=hr.reservation_id AND r.customer_id=c.customer_id AND"
        . " hr.hall_id=h.hall_id AND YEAR(hr.reservation_date)='$year' LIMIT 10 OFFSET $offset;";
$dataArray = [];

$result = $connection->query($sql);
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $dataArray[] = $row;
    }
    echo json_encode($dataArray);
}