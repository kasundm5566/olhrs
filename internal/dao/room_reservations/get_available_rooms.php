<?php

// Create a database connection
include '../../common/dbconnection.php';
$objDBConnection = new dbconnection();
$connection = $objDBConnection->connection();

$checkIn = $_REQUEST['check-in'];
$checkOut = $_REQUEST['check-out'];

$data = "<h5>Available Halls:</h5><hr>";
$data.="<table class='table-bordered table-condensed'><tr><th>Room type</th><th>Available count</th></tr>";

$sql2 = "SELECT room_type_name FROM room_type;";
$result2 = $connection->query($sql2);
if ($result2) {
    while ($row2 = $result2->fetch_assoc()) {
        $roomType = $row2['room_type_name'];
        $sql = "SELECT ((SELECT room_count FROM room WHERE room_type_id IN"
                . " (SELECT room_type_id FROM room_type WHERE room_type_name='$roomType'))"
                . "-(SELECT COALESCE(sum(count), 0) FROM room_reservation WHERE"
                . " room_type_id IN (SELECT room_type_id FROM room_type WHERE"
                . " room_type_name='$roomType') AND check_in BETWEEN '$checkIn' AND"
                . " '$checkOut' OR room_type_id IN"
                . " (SELECT room_type_id FROM room_type WHERE room_type_name='$roomType') AND"
                . " check_out BETWEEN '$checkIn' AND '$checkOut')) AS available_room_count;";
        $res = $connection->query($sql);
        while ($row = $res->fetch_assoc()) {
            $data.="<tr>";
            $data.="<td>$roomType</td>";
            $data.="<td>" . $row['available_room_count'] . "</td>";
            $data.="</tr>";
        }
    }
}

//$sqlDoubleRoom = "SELECT ((SELECT room_count FROM room WHERE room_type_id IN"
//        . " (SELECT room_type_id FROM room_type WHERE room_type_name='Double'))"
//        . "-(SELECT COALESCE(sum(count), 0) FROM room_reservation WHERE"
//        . " room_type_id IN (SELECT room_type_id FROM room_type WHERE"
//        . " room_type_name='Double') AND check_in BETWEEN '$checkIn' AND"
//        . " '$checkOut' OR room_type_id IN"
//        . " (SELECT room_type_id FROM room_type WHERE room_type_name='Double') AND"
//        . " check_out BETWEEN '$checkIn' AND '$checkOut')) AS available_room_count;";
//$res2 = $connection->query($sqlDoubleRoom);
//while ($row2 = $res2->fetch_assoc()) {
//    $data.="<tr>";
//    $data.="<td>Double</td>";
//    $data.="<td>" . $row2['available_room_count'] . "</td>";
//    $data.="</tr>";
//}
//
//$sqlFamilyRoom = "SELECT ((SELECT room_count FROM room WHERE room_type_id IN"
//        . " (SELECT room_type_id FROM room_type WHERE room_type_name='Family'))"
//        . "-(SELECT COALESCE(sum(count), 0) FROM room_reservation WHERE"
//        . " room_type_id IN (SELECT room_type_id FROM room_type WHERE"
//        . " room_type_name='Family') AND check_in BETWEEN '$checkIn' AND"
//        . " '$checkOut' OR room_type_id IN"
//        . " (SELECT room_type_id FROM room_type WHERE room_type_name='Family') AND"
//        . " check_out BETWEEN '$checkIn' AND '$checkOut')) AS available_room_count;";
//$res3 = $connection->query($sqlFamilyRoom);
//while ($row3 = $res3->fetch_assoc()) {
//    $data.="<tr>";
//    $data.="<td>Family</td>";
//    $data.="<td>" . $row3['available_room_count'] . "</td>";
//    $data.="</tr>";
//}
//
//$sqlCottage = "SELECT ((SELECT room_count FROM room WHERE room_type_id IN"
//        . " (SELECT room_type_id FROM room_type WHERE room_type_name='Cottage'))"
//        . "-(SELECT COALESCE(sum(count), 0) FROM room_reservation WHERE"
//        . " room_type_id IN (SELECT room_type_id FROM room_type WHERE"
//        . " room_type_name='Cottage') AND check_in BETWEEN '$checkIn' AND"
//        . " '$checkOut' OR room_type_id IN"
//        . " (SELECT room_type_id FROM room_type WHERE room_type_name='Cottage') AND"
//        . " check_out BETWEEN '$checkIn' AND '$checkOut')) AS available_room_count;";
//$res4 = $connection->query($sqlCottage);
//while ($row4 = $res4->fetch_assoc()) {
//    $data.="<tr>";
//    $data.="<td>Cottages</td>";
//    $data.="<td>" . $row4['available_room_count'] . "</td>";
//    $data.="</tr>";
//}

echo $data;
?>
