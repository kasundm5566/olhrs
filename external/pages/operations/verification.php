<?php

include '../common/dbconnection.php';
$objDBConnection = new dbconnection();
$connection = $objDBConnection->connection();
$GLOBALS['connection'] = $connection;

$username = $_REQUEST['veri-username'];
$code = $_REQUEST['veri-code'];

$sql = "SELECT code FROM verification_code WHERE username='$username' ORDER BY code_id DESC LIMIT 1;";


$code_result = $connection->query($sql);
if ($code_result) {
    while ($row = $code_result->fetch_assoc()) {
        if ($row['code'] == $code) {
            echo '1';
        } else {
            echo '0';
        }
    }
} else {
    echo '0';
}


