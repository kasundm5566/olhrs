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
$hall = $_REQUEST['hall'];

$html="<style>"
        . "th,td{border:1px solid #D9D5BE;}"
        ."table{border:1px solid #D9D5BE; margin:10px; width: 100%;}"
        . "</style>";

$html.="<h2 align='center'>$hall Yearly Report-$year</h2>";
$html.="<h4 align='center'>Aqua Pearl Lake Resort-Moratuwa</h4>";
//$html.="<img src='/var/www/html/olhrs/internal/images/icons/logo.png'><br><br>";
$html.="<table style='border:1px solid #D9D5BE; margin:10px; width: 100%;'>
    <tr>
        <th>Customer first name</th>
        <th>Customer last name</th>
        <th>Reservation date</th>
        <th>Session</th>
        <th>Pax</th>
        <th>Total</th>
        <th>Status</th>
    </tr>";

    $sql = "SELECT * FROM reservation r,hall_reservation hr, customer c, hall h "
            . "WHERE r.reservation_id=hr.reservation_id AND hr.hall_id=h.hall_id AND"
            . " r.customer_id=c.customer_id AND year(reservation_date)='$year' AND "
            . "hall_name='Queens Hall B';";

$result = $connection->query($sql);
if ($result) {
    while ($row = $result->fetch_assoc()) {

        $html.="<tr>
                <td>" . $row['first_name'] . "</td>
                <td>" . $row['last_name'] . "</td>
                <td>" . $row['reservation_date'] . "</td>
                <td>" . $row['time'] . "</td>
                <td>" . $row['pax'] . "</td>
                <td>" . $row['total'] . "</td>
                <td>" . $row['reservation_status'] . "</td>
            </tr>";
    }
} else {
    
}

$html .= "</table>";
?>

<?php

include_once '../../dompdf/dompdf_config.inc.php';

$dompdf = new DOMPDF();

$dompdf->load_html($html);
$dompdf->set_paper('A4', 'landscape');
$dompdf->render();
$dompdf->stream("Queens_Hall_B_Yearly_Report.pdf", array("Attachment" => false));
?>