<?php

if (!isset($_SESSION)) { //To check session not start
    session_start(); //Start a session
}

include '../common/dbconnection.php';
$objDBConnection = new dbconnection();
$connection = $objDBConnection->connection();
$GLOBALS['connection'] = $connection;

$date = $_POST['hall-date'];
$username = $_SESSION['username'];

//$sql = "";
//$result = $connection->query($sql); //To execute query
//
//$records_count = $result->num_rows; //To count the rows

if (true) {
    if ($username != "") {
        $encoded_date = base64_encode($date); //Encoding Mechanism
        header("Location:../hall-reservation.php?date=$encoded_date");
    }else{
        $status = "Please login";
        $status1 = base64_encode($status); //Encoding Mechanism
        header("Location:../index.php?status=$status1#reservation-section"); //Redirection n passing data
        //Through URL
    }
} else {
    $status = "Sorry, Halls are not available";
    $status1 = base64_encode($status); //Encoding Mechanism
    header("Location:../index.php?status=$status1#reservation-section"); //Redirection n passing data
    //Through URL
}
?>
