<?php

include '../../common/dbconnection.php';
$objDBConnection = new dbconnection();
$connection = $objDBConnection->connection();

$hallName = $_REQUEST['hall-name'];

$sql = "select max_pax FROM hall WHERE hall_name='$hallName';";

$result = $connection->query($sql);
$maxPax = 0;
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $maxPax = $row['max_pax'];
    }
}
echo $maxPax;
