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

$date = $_REQUEST['date'];
$hall = $_REQUEST['hall'];

$html = "<style>"
        . "th,td{border:1px solid #D9D5BE;}"
        . "table{border:1px solid #D9D5BE; margin:10px; width: 100%;}"
        . "</style>";

$html.="<img src='../../images/icons/logo.png'><br><br>";
$html.="<h2 align='center'>$hall Daily Report-$date</h2>";
$html.="<h4 align='center'>Aqua Pearl Lake Resort-Moratuwa</h4>";

$html.="<table>
    <tr>
        <th>Customer first name</th>
        <th>Customer last name</th>
        <th>Hall name</th>
        <th>Session</th>
        <th>Pax</th>
        <th>Total</th>
    </tr>";



    $sql = "SELECT * FROM reservation r,hall_reservation hr, customer c, hall h"
            . " WHERE r.reservation_id=hr.reservation_id AND hr.hall_id=h.hall_id"
            . " AND r.customer_id=c.customer_id AND hr.reservation_date='$date';";

$result = $connection->query($sql);
if ($result) {
    while ($row = $result->fetch_assoc()) {

        $html.="<tr>
                <td>" . $row['first_name'] . "</td>
                <td>" . $row['last_name'] . "</td>
                <td>" . $row['hall_name'] . "</td>
                <td>" . $row['time'] . "</td>
                <td>" . $row['pax'] . "</td>
                <td>" . $row['total'] . "</td>
            </tr>";
    }
}
$html .= "</table>";
$total = 0;
$sql2 = "SELECT sum(total) AS total FROM reservation r,hall_reservation hr, customer c, hall h"
        . " WHERE r.reservation_id=hr.reservation_id AND hr.hall_id=h.hall_id"
        . " AND r.customer_id=c.customer_id AND hr.reservation_date='$date';";
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
$dompdf->stream("All_Halls_Daily_Report.pdf", array("Attachment" => false));
?>