<?php

include '../../common/dbconnection.php';
$objDBConnection = new dbconnection();
$connection = $objDBConnection->connection();

$res_id = $_GET['res'];

$sql = "SELECT comment FROM feedback WHERE feedback_id IN (SELECT feedback_id FROM reservation WHERE reservation_id=$res_id);";

$result = $connection->query($sql);
$data='';
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $data = $row['comment'];
    }

    echo $data;
} else {
    echo '';
}
