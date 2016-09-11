<?php

// Create a database connection
include '../../common/dbconnection.php';
$objDBConnection = new dbconnection();
$connection = $objDBConnection->connection();

$sql = "SELECT COUNT(*) AS count FROM user u, user_group ug WHERE u.user_id=ug.user_id "
        . "AND group_id IN (SELECT group_id FROM groups WHERE group_name='customer');";

$result = $connection->query($sql);

while ($row = $result->fetch_assoc()) {
    echo $row['count'];
}
