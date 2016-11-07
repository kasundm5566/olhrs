<?php

include '../../common/dbconnection.php';
$objDBConnection = new dbconnection();
$connection = $objDBConnection->connection();

$username = $_REQUEST['username'];
// Check for a unique username. Returns 0 if the username is available.
$sql = "SELECT COUNT(customer_id) AS count FROM customer WHERE username='$username';";
$result = $connection->query($sql);

if ($result) {
    while ($row = $result->fetch_assoc()) {
        echo $row['count'];
    }
}
