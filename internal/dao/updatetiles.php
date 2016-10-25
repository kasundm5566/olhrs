<?php

// Create a database connection
include '../common/dbconnection.php';
$objDBConnection = new dbconnection();
$connection = $objDBConnection->connection();

// What kind of operation ajax need to do. According to the parameter
// 'operation', suitable switch case will execute.
$operation = $_REQUEST['operation'];

switch ($operation) {
    case "staffTileUpdate":
        $sql = "SELECT COUNT(*) AS count FROM user;";
        $result = $connection->query($sql);
        while ($row = $result->fetch_assoc()) {
            echo $row['count'];
        }
        break;
    case "customerTileUpdate":
        $sql = "SELECT COUNT(*) AS count FROM customer;";
        $result = $connection->query($sql);
        while ($row = $result->fetch_assoc()) {
            echo $row['count'];
        }
        break;
    case "eventTileUpdate":
        $sql = "SELECT reservation_date, hall_name, pax FROM reservation rv, "
                . "hall_reservation hr, hall h WHERE rv.reservation_id=hr.reservation_id "
                . "AND hr.hall_id=h.hall_id AND reservation_date>NOW() "
                . "ORDER BY reservation_date ASC LIMIT 1;";
        $result = $connection->query($sql);
        while ($row = $result->fetch_assoc()) {
            echo $row['reservation_date'] . " " . $row['hall_name'] . " Pax " . $row['pax'];
        }
        break;
    default :
        echo 'wrong operation...';
}
