<?php

include '../../common/dbconnection.php';
$objDBConnection = new dbconnection();
$connection = $objDBConnection->connection();

$hallName = $_REQUEST['hall-name'];

$sql = "select price FROM hall WHERE hall_name='$hallName';";

$result = $connection->query($sql);
$price = 0;
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $price = $row['price'];
    }
}
echo $price;
