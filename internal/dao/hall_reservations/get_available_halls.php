<?php

if (!isset($_SESSION)) {
    session_start();
}
include '../../common/dbconnection.php';
$objDBConnection = new dbconnection();
$connection = $objDBConnection->connection();
$GLOBALS['connection'] = $connection;

$date = $_POST['hall-date'];
$time = $_POST['sel-session'];

$sql = '';
if ($time == 'Full day') {
    $sql = "SELECT hall_name FROM hall WHERE hall_name NOT IN "
            . "(SELECT hall_name FROM reservation rv, hall_reservation hr, hall h "
            . "WHERE rv.reservation_id=hr.reservation_id AND hr.hall_id=h.hall_id AND "
            . "hr.reservation_date='$date' AND (hr.time='$time' OR hr.time='Morning' OR hr.time='Evening'));";
} else {
    $sql = "SELECT hall_name FROM hall WHERE hall_name NOT IN "
            . "(SELECT hall_name FROM reservation rv, hall_reservation hr, hall h "
            . "WHERE rv.reservation_id=hr.reservation_id AND hr.hall_id=h.hall_id AND "
            . "hr.reservation_date='$date' AND (hr.time='$time' OR hr.time='Full day'));";
}

$result = $connection->query($sql); //To execute query
$halls = [];
if ($result) {
    while ($row = $result->fetch_array()) {
        $halls[] = $row['hall_name'];
    }
}
if (count($halls) != 0) {
    $hallNames;
    for ($i = 0; $i < count($halls); $i++) {
        $hallNames.=$halls[$i];
        $hallNames.=",";
    }
    $encodedHallNames = base64_encode($hallNames);
    header("Location:../../module/reservations/reservations-home.php?halls=$encodedHallNames");
}
?>