<?php
if (!isset($_SESSION)) {
    session_start();
}

include '../common/dbconnection.php';
$objDBConnection = new dbconnection();
$connection = $objDBConnection->connection();
$GLOBALS['connection'] = $connection;


$rating=$_POST['stars'];
$comment=$_POST['comment'];
$resId=$_POST['resId'];

$sql1 = "UPDATE feedback SET rating='$rating',comment='$comment',date=CURDATE() WHERE feedback_id IN (SELECT feedback_id FROM reservation WHERE reservation_id='$resId');";

$res1 = $connection->query($sql1);

if ($res1) {
    echo '1';
} else {
    echo $connection->error;
}