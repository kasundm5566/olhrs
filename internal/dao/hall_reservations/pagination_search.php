<?php

// Create a database connection
include '../../common/dbconnection.php';
$objDBConnection = new dbconnection();
$connection = $objDBConnection->connection();

$year = $_REQUEST['searchYear'];

$sql = "SELECT COUNT(*) AS count FROM hall_reservation WHERE YEAR(reservation_date)='$year';";

$result = $connection->query($sql);

if ($result) {
    while ($row = $result->fetch_assoc()) {
        echo $row['count'];
    }
}
