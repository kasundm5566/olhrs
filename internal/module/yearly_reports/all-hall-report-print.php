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


$html.="<h2 align='center'>All Halls Yearly Report-$year</h2>";
$html.="<h4 align='center'>Aqua Pearl Lake Resort-Moratuwa</h4>";
//$html.="<img src='/var/www/html/olhrs/internal/images/icons/logo.png'><br><br>";
$html.="<table style='border:1px solid #D9D5BE; margin:10px; width: 100%;'>
    <tr>
        <th style='border:1px solid #D9D5BE;'>Customer first name</th>
        <th style='border:1px solid #D9D5BE;'>Customer last name</th>
        <th style='border:1px solid #D9D5BE;'>Reservation date</th>
        <th style='border:1px solid #D9D5BE;'>Session</th>
        <th style='border:1px solid #D9D5BE;'>Pax</th>
        <th style='border:1px solid #D9D5BE;'>Total</th>
        <th style='border:1px solid #D9D5BE;'>Status</th>
    </tr>";

$sql = "SELECT * FROM reservation r,hall_reservation hr, customer c, hall h "
        . "WHERE r.reservation_id=hr.reservation_id AND hr.hall_id=h.hall_id "
        . "AND r.customer_id=c.customer_id AND year(reservation_date)='$year';";

$result = $connection->query($sql);
if ($result) {
    while ($row = $result->fetch_assoc()) {

        $html.="<tr>
                <td style='border:1px solid #D9D5BE;'>" . $row['first_name'] . "</td>
                <td style='border:1px solid #D9D5BE;'>" . $row['last_name'] . "</td>
                <td style='border:1px solid #D9D5BE;'>" . $row['reservation_date'] . "</td>
                <td style='border:1px solid #D9D5BE;'>" . $row['time'] . "</td>
                <td style='border:1px solid #D9D5BE;'>" . $row['pax'] . "</td>
                <td style='border:1px solid #D9D5BE;'>" . $row['total'] . "</td>
                <td style='border:1px solid #D9D5BE;'>" . $row['reservation_status'] . "</td>
            </tr>";
    }
} else {
    
}

$html . "</table>";
?>

<?php

include_once './dompdf/dompdf_config.inc.php';

$dompdf = new DOMPDF();

$dompdf->load_html($html);
$dompdf->render();
$dompdf->stream("All_Halls_Yearly_Report.pdf", array("Attachment" => false));
?>