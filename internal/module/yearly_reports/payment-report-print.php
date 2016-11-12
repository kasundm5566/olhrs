<?php

if (!isset($_SESSION)) {
    session_start();
}
if ($_SESSION['username'] == "" || $_SESSION['group'] == "Receptionist") {
    header("Location:../login/index.php");
    exit;
}
?>


<?php

include '../../common/dbconnection.php';
$objDBConnection = new dbconnection();
$connection = $objDBConnection->connection();

$year = $_REQUEST['year'];

$html = "<style>"
        . "th,td{border:1px solid #D9D5BE;}"
        . "table{border:1px solid #D9D5BE; margin:10px; width: 100%;}"
        . "</style>";

$html.="<img src='../../images/icons/logo.png'><br><br>";
$html.="<h2 align='center'>Payments Report-$year</h2>";
$html.="<h4 align='center'>Aqua Pearl Lake Resort-Moratuwa</h4>";
$html.="<table>
    <tr>
        <th>Payment date</th>
        <th>Amount</th>
        <th>Username</th>
        <th>Reservation type</th>
        <th>Payment method</th>
    </tr>";

$sql = "SELECT payment_date,amount,username,type,payment_method_name"
        . " FROM payment p,reservation r,customer c,payment_method pm"
        . " WHERE YEAR(p.payment_date)='$year' AND p.reservation_id=r.reservation_id"
        . " AND r.customer_id=c.customer_id AND p.payment_method_id=pm.payment_method_id;";

$result = $connection->query($sql);
if ($result) {
    while ($row = $result->fetch_assoc()) {

        $html.="<tr>
                <td>" . $row['payment_date'] . "</td>
                <td>" . $row['amount'] . "</td>
                <td>" . $row['username'] . "</td>
                <td>" . $row['type'] . "</td>
                <td>" . $row['payment_method_name'] . "</td>
            </tr>";
    }
}
$html .= "</table>";
$total = 0;
$sql2 = "SELECT sum(amount) as total"
        . " FROM payment p,reservation r,customer c,payment_method pm"
        . " WHERE YEAR(p.payment_date)='$year' AND p.reservation_id=r.reservation_id"
        . " AND r.customer_id=c.customer_id AND p.payment_method_id=pm.payment_method_id;";
$result2 = $connection->query($sql2);
while ($row2 = $result2->fetch_assoc()) {
    $total = $row2['total'];
}
$html.="<div style='text-align:right;margin-right:15px;'>";
$html.= "<h4>Total (Rs.): ".$total."</h4>";
$html.="</div>";
?>

<?php

include_once '../../dompdf/dompdf_config.inc.php';

$dompdf = new DOMPDF();

$dompdf->load_html($html);
$dompdf->set_paper('A4', 'landscape');
$dompdf->render();
$dompdf->stream("Payments_Annual_Report.pdf", array("Attachment" => false));
?>