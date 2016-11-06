<?php

// Create a database connection
include '../../common/dbconnection.php';
$objDBConnection = new dbconnection();
$connection = $objDBConnection->connection();

$date = $_REQUEST['date'];
$hall = $_REQUEST['hall'];
$time = $_REQUEST['time'];

$data = "<h5>Balance (Rs.):</h5><hr>";

$sql = "SELECT ((SELECT total FROM reservation WHERE reservation_id IN"
        . " (SELECT reservation_id FROM hall_reservation WHERE"
        . " reservation_date='$date' AND time='$time'"
        . " AND hall_id IN (SELECT hall_id FROM hall WHERE hall_name='$hall')))"
        . "-(SELECT SUM(amount) FROM payment p WHERE p.reservation_id IN"
        . " (SELECT reservation_id FROM hall_reservation WHERE"
        . " reservation_date='$date' AND time='$time'"
        . " AND hall_id IN (SELECT hall_id FROM hall WHERE hall_name='$hall')))) AS balance;";

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