<?php

if (!isset($_SESSION)) {
    session_start();
}
if ($_SESSION['username'] == "" || $_SESSION['group'] == "") {
    header("Location:../login/index.php");
    exit;
}
?>

<?php

include '../../common/dbconnection.php';
$objDBConnection = new dbconnection();
$connection = $objDBConnection->connection();

$year = $_REQUEST['year'];
$room = $_REQUEST['room'];

$html = "<style>"
        . "th,td{border:1px solid #D9D5BE;}"
        . "table{border:1px solid #D9D5BE; margin:10px; width: 100%;}"
        . "</style>";

$html.="<img src='../../images/icons/logo.png'><br><br>";
$html.="<h2 align='center'>$room Yearly Report-$year</h2>";
$html.="<h4 align='center'>Aqua Pearl Lake Resort-Moratuwa</h4>";

$html.="<table style='border:1px solid #D9D5BE; margin:10px; width: 100%;'>
    <tr>
        <th>Customer first name</th>
        <th>Customer last name</th>
        <th>Check in</th>
        <th>Check out</th>
        <th>Total</th>
        <th>Status</th>
    </tr>";

$sql = "SELECT * FROM reservation r,room_reservation rr, customer c, room_type rt "
        . "WHERE r.reservation_id=rr.reservation_id AND rr.room_type_id=rt.room_type_id "
        . "AND r.customer_id=c.customer_id AND year(check_in)='$year' AND "
        . "room_type_name='Family';";

$result = $connection->query($sql);
if ($result) {
    while ($row = $result->fetch_assoc()) {

        $html.="<tr>
                <td>" . $row['first_name'] . "</td>
                <td>" . $row['last_name'] . "</td>
                <td>" . $row['check_in'] . "</td>
                <td>" . $row['check_out'] . "</td>
                <td>" . $row['total'] . "</td>
                <td>" . $row['reservation_status'] . "</td>
            </tr>";
    }
}

$html .= "</table>";

$total = 0;
$sql2 = "SELECT sum(total) as total FROM reservation r,room_reservation rr, customer c, room_type rt "
        . "WHERE r.reservation_id=rr.reservation_id AND rr.room_type_id=rt.room_type_id "
        . "AND r.customer_id=c.customer_id AND year(check_in)='$year' AND "
        . "room_type_name='Family';";
$result2 = $connection->query($sql2);
while ($row2 = $result2->fetch_assoc()) {
    $total = $row2['total'];
}
$html.="<div style='text-align:right;margin-right:15px;'>";
$html.= "<h4>Total (Rs.): " . $total . "</h4>";
$html.="</div>";
?>

<?php

include_once '../../dompdf/dompdf_config.inc.php';

$dompdf = new DOMPDF();

$dompdf->load_html($html);
$dompdf->set_paper('A4', 'landscape');
$dompdf->render();
$dompdf->stream("Family_Rooms_Annual_Report.pdf", array("Attachment" => false));
?>