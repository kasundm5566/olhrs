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
$custId=$_POST['custId'];
$resId=$_POST['resId'];

$sql1 = "INSERT INTO feedback (rating,comment,date,customer_id) VALUES ('$rating','$comment',CURDATE(),$custId);";

$res1 = $connection->query($sql1);
$added_feddbackId=$connection->insert_id;

$sql2="UPDATE reservation SET feedback_id='$added_feddbackId' WHERE reservation_id='$resId';";
$res2 = $connection->query($sql2);

if ($res1) {
    echo '1';
} else {
    echo $connection->error;
}