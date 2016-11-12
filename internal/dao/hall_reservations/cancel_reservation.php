<?php

// Create a database connection
include '../../common/dbconnection.php';
$objDBConnection = new dbconnection();
$connection = $objDBConnection->connection();

$resDate = $_REQUEST['res_date'];
$hallName = $_REQUEST['hall_name'];
$time = $_REQUEST['time'];

$sql = "SELECT r.reservation_id AS res_id FROM reservation r,hall_reservation hr,customer c"
        . ",hall h WHERE r.reservation_id=hr.reservation_id AND"
        . " r.customer_id=c.customer_id AND hr.hall_id=h.hall_id AND"
        . " reservation_date='$resDate' AND hall_name='$hallName' AND time='$time';";

$result = $connection->query($sql);

if ($result) {
    $resId = 0;
    while ($row = $result->fetch_assoc()) {
        $resId = $row['res_id'];
    }
    $sql2 = "DELETE FROM reservation WHERE reservation_id='$resId';";
    $sql2 .= "DELETE FROM hall_reservation WHERE reservation_id='$resId';";
    $sql2 .= "DELETE FROM payment WHERE reservation_id='$resId';";
    $res = $connection->multi_query($sql2);
    if($res){
        echo '1';
    }else{
        echo '0';
    }
} else {
    echo '0';
}
