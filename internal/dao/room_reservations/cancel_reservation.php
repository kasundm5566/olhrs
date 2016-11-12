<?php

// Create a database connection
include '../../common/dbconnection.php';
$objDBConnection = new dbconnection();
$connection = $objDBConnection->connection();

$checkIn = $_REQUEST['check_in'];
$checkOut = $_REQUEST['check_out'];
$roomType = $_REQUEST['room_type_name'];
$placedDate = $_REQUEST['placed_date'];
$username = $_REQUEST['username'];
$count = $_REQUEST['count'];

$sql = "SELECT rr.reservation_id AS res_id FROM reservation r,room_reservation rr,"
        . "customer c,room_type rt WHERE r.reservation_id=rr.reservation_id"
        . " AND r.customer_id=c.customer_id AND rr.room_type_id=rt.room_type_id"
        . " AND check_in='$checkIn' AND check_out='$checkOut' AND room_type_name='$roomType'"
        . " AND username='$username' AND placed_date='$placedDate' AND count='$count';";

$result = $connection->query($sql);

if ($result) {
    $resId = 0;
    while ($row = $result->fetch_assoc()) {
        $resId = $row['res_id'];
    }
    $sql2 = "DELETE FROM reservation WHERE reservation_id='$resId';";
    $sql2 .= "DELETE FROM room_reservation WHERE reservation_id='$resId';";
    $sql2 .= "DELETE FROM payment WHERE reservation_id='$resId';";
    $res = $connection->multi_query($sql2);
    if ($res) {
        echo '1';
    } else {
        echo '0';
    }
} else {
    echo '0';
}
