<?php

include '../../common/dbconnection.php';
$objDBConnection = new dbconnection();
$connection = $objDBConnection->connection();
$GLOBALS['connection'] = $connection;

$menuName = $_REQUEST['menuName'];

$sql = "SELECT COUNT(menu_id) AS count FROM menu WHERE menu_name='$menuName';";
$result = $connection->query($sql);

if ($result) {
    while ($row = $result->fetch_assoc()) {
        echo $row['count'];
    }
}
