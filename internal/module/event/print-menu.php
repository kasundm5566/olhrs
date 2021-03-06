<?php

// Create a database connection
include '../../common/dbconnection.php';
$objDBConnection = new dbconnection();
$connection = $objDBConnection->connection();


$menuName = base64_decode($_REQUEST['menu']);
$price = 0;

$priceSql = "SELECT price FROM menu WHERE menu_name='$menuName'";
$priceRes = $connection->query($priceSql);
if ($priceRes) {
    while ($priceRow = $priceRes->fetch_assoc()) {
        $price = $priceRow['price'];
    }
}

$sql = "SELECT * FROM category;";

$res = $connection->query($sql);
$data = "<img src='../../images/icons/logo.png'><br><br>";;
$data .= "<h4>Menu details for-$menuName</h4>";
$data .= "<h4>Price-$price</h4>";
if ($res) {

    $split = 1;
    while ($row = $res->fetch_assoc()) {
        $category = $row['category_name'];
        $sql2 = "SELECT price,category_name,food_name FROM menu m,menu_food mf"
                . ",food f,category cg WHERE m.menu_name='$menuName' AND"
                . " m.menu_id=mf.menu_id AND mf.food_id=f.food_id AND"
                . " f.category_id=cg.category_id AND cg.category_name='$category';";
        $res2 = $connection->query($sql2);

        $count = $res2->num_rows;
        if ($res2 && $count > 0) {
            if ($split == 1 || $split % 4 == 0) {
                $data.="<div class='row'>";
            }
            $data.="<div class='col-md-4'>";
            $data.="<h3 align='center'><u>$category</u></h3>";
            while ($row2 = $res2->fetch_assoc()) {
                $data.="<h4 align='center'>" . $row2['food_name'] . "</h4>";
            }
            $data.="</div>";
            $split++;
            if ($split % 4 == 0) {
                $data.="</div>";
                $data.="<hr>";
            }
        }
    }   
}
$data.="";
?>
<?php

include_once '../../dompdf/dompdf_config.inc.php';

$dompdf = new DOMPDF();

$dompdf->load_html($data);
$dompdf->set_paper('A4', 'landscape');
$dompdf->render();
$dompdf->stream("All_Halls_Daily_Report.pdf", array("Attachment" => false));
?>