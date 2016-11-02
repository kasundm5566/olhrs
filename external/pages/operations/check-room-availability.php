<?php

if (!isset($_SESSION)) {
    session_start();
}

include '../common/dbconnection.php';
$objDBConnection = new dbconnection();
$connection = $objDBConnection->connection();
$GLOBALS['connection'] = $connection;

$indate = $_POST['room-in-date'];
$outdate = $_POST['room-out-date'];
$type = $_POST['radio-roomType'];
$username = $_SESSION['username'];

$sql = "SELECT ((SELECT room_count FROM room WHERE room_type_id IN "
        . "(SELECT room_type_id FROM room_type WHERE room_type_name='$type'))"
        . "-(SELECT COALESCE(sum(count), 0) FROM room_reservation WHERE room_type_id IN "
        . "(SELECT room_type_id FROM room_type WHERE room_type_name='$type') "
        . "AND check_in BETWEEN '$indate' AND '$outdate' OR room_type_id IN "
        . "(SELECT room_type_id FROM room_type WHERE room_type_name='$type') "
        . "AND check_out BETWEEN '$indate' AND '$outdate')) AS available_room_count;";

$result = $connection->query($sql);
$available_room_count = 0;
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $available_room_count = $row['available_room_count'];
    }
}
if ($available_room_count > 0) {
    if ($username != "") {
        $encoded_indate = base64_encode($indate); //Encoding Mechanism
        $encoded_outdate = base64_encode($outdate);
        $encoded_type = base64_encode($type);
        $encoded_available_room_count= base64_encode($available_room_count);
        header("Location:../room-reservation.php?indate=$encoded_indate&outdate=$encoded_outdate&type=$encoded_type&roomcount=$encoded_available_room_count");
    } else {
        $status = "Rooms are available. Please login to reserve.";
        $status1 = base64_encode($status); //Encoding Mechanism
        header("Location:../index.php?room-status=$status1#reservation-section"); //Redirection n passing data
        //Through URL
    }
} else {
    if (!empty($username)) {
        $status = "Sorry, Rooms are not available.";
        $status1 = base64_encode($status); //Encoding Mechanism
        header("Location:../customer-home.php?room-status=$status1#reservation-section"); //Redirection n passing data
        //Through URL   
    } else {
        $status = "Sorry, Rooms are not available.";
        $status1 = base64_encode($status); //Encoding Mechanism
        header("Location:../index.php?room-status=$status1#reservation-section"); //Redirection n passing data
        //Through URL   
    }
}
?>
