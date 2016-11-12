<?php

// Create a database connection
include '../../common/dbconnection.php';
$objDBConnection = new dbconnection();
$connection = $objDBConnection->connection();

$categoryName=$_REQUEST['category-name'];
if($categoryName==="1"){
    $sql = "SELECT food_name FROM food WHERE category_id="
        . " (SELECT category_id FROM category LIMIT 1);";
}else{
    $sql = "SELECT food_name FROM food WHERE category_id IN"
        . " (SELECT category_id FROM category WHERE category_name='$categoryName');";
}
$dataArray = [];

$result = $connection->query($sql);
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $dataArray[] = $row;
    }
    echo json_encode($dataArray);
}