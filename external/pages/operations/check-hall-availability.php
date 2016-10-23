<?php

if (!isset($_SESSION)) {
    session_start();
}

include '../common/dbconnection.php';
$objDBConnection = new dbconnection();
$connection = $objDBConnection->connection();
$GLOBALS['connection'] = $connection;

$date = $_POST['hall-date'];
$time = $_POST['session-dropdown'];
$username = $_SESSION['username'];

$sql = "SELECT hall_name FROM hall WHERE hall_name NOT IN "
        . "(SELECT hall_name FROM reservation rv, hall_reservation hr, hall h "
        . "WHERE rv.reservation_id=hr.reservation_id AND hr.hall_id=h.hall_id AND "
        . "hr.reservation_date='$date' AND hr.time='$time');";
$result = $connection->query($sql); //To execute query

$halls = [];
if ($result) {
    while ($row = $result->fetch_array()) {
        $halls[] = $row['hall_name'];
    }
}

if (count($halls) != 0) {
    if (!empty($username)) {
        $hallNames;
        for ($i = 0; $i < count($halls); $i++) {
            $hallNames.=$halls[$i];
            $hallNames.=",";
        }
        $encoded_date = base64_encode($date); //Encoding Mechanism
        $encodedTime = base64_encode($time);
        $encodedHallNames = base64_encode($hallNames);
        header("Location:../hall-reservation.php?date=$encoded_date&time=$encodedTime&halls=$encodedHallNames");
    } else {
        for ($i = 0; $i < count($halls); $i++) {
            $status.=$halls[$i];
            $status.=", ";
        }
        $status .= " are available. Please login to reserve.";
        $status1 = base64_encode($status); //Encoding Mechanism
        header("Location:../index.php?status=$status1#reservation-section"); //Redirection n passing data
        //Through URL
    }
} else {
    if (!empty($username)) {
        $status = "Sorry, Halls are not available.";
        $status1 = base64_encode($status); //Encoding Mechanism
        header("Location:../customer-home.php?status=$status1#reservation-section"); //Redirection n passing data
        //Through URL   
    } else {
        $status = "Sorry, Halls are not available.";
        $status1 = base64_encode($status); //Encoding Mechanism
        header("Location:../index.php?status=$status1#reservation-section"); //Redirection n passing data
        //Through URL   
    }
}
?>
