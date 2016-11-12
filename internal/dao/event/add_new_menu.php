<?php

// Create a database connection
include '../../common/dbconnection.php';
$objDBConnection = new dbconnection();
$connection = $objDBConnection->connection();

if (isset($_REQUEST['foods'])) {
    $data = $_REQUEST['foods'];
    echo count($data);
    if (count($data) == 0) {
        echo '0';
    } 
    else {
        echo count($data);
        $menuName = $_REQUEST['menuName'];
        $menuPrice = $_REQUEST['menuPrice'];

        $sql1 = "INSERT INTO menu (menu_name,price) VALUES ('$menuName','$menuPrice');";
        $res1 = $connection->query($sql1);
        if ($res1) {
            $added_menuId = $connection->insert_id;
            foreach ($data as $key => $n) {
                if ($data[$key] != "") {
                    $sql2 = "INSERT INTO menu_food VALUES ('$added_menuId', (SELECT food_id FROM food WHERE food_name='$data[$key]'));";
                    $res2 = $connection->query($sql2);
                }
            }
            echo '1';
        } else {
            echo '0';
        }
    }
} else {
    echo '0';
}
?>