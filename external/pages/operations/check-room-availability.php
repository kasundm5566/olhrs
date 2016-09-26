<?php

if (!isset($_SESSION)) { //To check session not start
    session_start(); //Start a session
}

include '../common/dbconnection.php';
$objDBConnection = new dbconnection();
$connection = $objDBConnection->connection();
$GLOBALS['connection'] = $connection;

$indate = $_POST['room-in-date'];
$outdate = $_POST['room-out-date'];
$type = $_POST['radio-roomType'];
$username = $_SESSION['username'];

//$sql = "";
//$result = $connection->query($sql); //To execute query
//
//$records_count = $result->num_rows; //To count the rows

if (true) {
    if ($username != "") {
        $encoded_indate = base64_encode($indate); //Encoding Mechanism
        $encoded_outdate = base64_encode($outdate);
        $encoded_type = base64_encode($type);
        header("Location:../room-reservation.php?indate=$encoded_indate&outdate=$encoded_outdate&type=$encoded_type");
    } else {
        $status = "Please login";
        $status1 = base64_encode($status); //Encoding Mechanism
        header("Location:../index.php?room-status=$status1#reservation-section"); //Redirection n passing data
        //Through URL
    }
} else {
    $status = "Sorry, Halls are not available";
    $status1 = base64_encode($status); //Encoding Mechanism
    header("Location:../index.php?room-status=$status1#reservation-section"); //Redirection n passing data
    //Through URL
}
?>
