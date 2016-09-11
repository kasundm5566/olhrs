<?php

// Create a database connection
include '../../common/dbconnection.php';
$objDBConnection = new dbconnection();
$connection = $objDBConnection->connection();

$firstName=$_REQUEST['searchName'];


//$sql = "SELECT first_name, last_name, username, password, email, telephone, status FROM user LIMIT 10 OFFSET $offset;";

$sql = "SELECT COUNT(*) AS count FROM user u, user_group ug "
        . "WHERE u.user_id=ug.user_id AND group_id IN (SELECT group_id FROM groups "
        . "WHERE group_name='customer') HAVING first_name LIKE '$firstName%';";

$result = $connection->query($sql);

while ($row = $result->fetch_assoc()) {
    echo $row['count'];
}
