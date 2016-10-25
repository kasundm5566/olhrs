<?php

include '../../common/dbconnection.php';
$objDBConnection = new dbconnection();
$connection = $objDBConnection->connection();

$mealplan = $_REQUEST['mealplan'];
$roomtype = $_REQUEST['roomtype'];

$sql = "SELECT price from room_type_meal_plan WHERE room_type_id IN (SELECT room_type_id FROM room_type WHERE room_type_name='$roomtype') 
AND meal_plan_id IN (SELECT meal_plan_id FROM meal_plan WHERE meal_plan_name='$mealplan');";

$result = $connection->query($sql);
$price = 0;
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $price = $row['price'];
    }
}
echo $price;
