<?php

// Create a database connection
include '../../common/dbconnection.php';
$objDBConnection = new dbconnection();
$connection = $objDBConnection->connection();

$checkIn = $_REQUEST['checkIn'];
$checkOut = $_REQUEST['checkOut'];
$roomType = $_REQUEST['roomType'];

$data = "<h5>Balance (Rs.):</h5><hr>";

$sql = "SELECT ((SELECT total FROM reservation WHERE reservation_id IN"
        . " (SELECT reservation_id FROM room_reservation WHERE check_in='$checkIn'"
        . " AND check_out='$checkOut' AND room_type_id IN"
        . " (SELECT room_type_id FROM room_type WHERE room_type_name='$roomType')))"
        . "-(SELECT SUM(amount) FROM payment p WHERE p.reservation_id IN"
        . " (SELECT reservation_id FROM room_reservation WHERE check_in='$checkIn'"
        . " AND check_out='$checkOut' AND room_type_id IN (SELECT room_type_id"
        . " FROM room_type WHERE room_type_name='$roomType')))) AS balance;";

$result = $connection->query($sql);
while ($row = $result->fetch_assoc()) {
    if ($row['balance'] == "") {
        $data.="<h4>Nothing found</h4>";
    } else {
        $data.="<h4>" . $row['balance'] . "</h4>";
    }
}

echo $data;
?>