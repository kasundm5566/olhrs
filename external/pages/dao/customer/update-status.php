<?php

include '../../common/dbconnection.php';
$objDBConnection = new dbconnection();
$connection = $objDBConnection->connection();

$username = $_REQUEST['veri-username'];

// Change the status upon the successfull verification
$sql = "UPDATE customer SET status='Verified' WHERE username='$username';";
$result = $connection->query($sql);

if ($result) {
    echo '1';
}
