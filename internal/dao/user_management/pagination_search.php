<?php

// Create a database connection
include '../../common/dbconnection.php';
$objDBConnection = new dbconnection();
$connection = $objDBConnection->connection();

$firstName = $_REQUEST['searchName'];


//$sql = "SELECT first_name, last_name, username, password, email, telephone, status FROM user LIMIT 10 OFFSET $offset;";

$sql = "SELECT COUNT(*) AS count FROM user WHERE first_name LIKE '$firstName%';";

$result = $connection->query($sql);

if ($result) {
    while ($row = $result->fetch_assoc()) {
        echo $row['count'];
    }
}
