<?php

if (!isset($_SESSION)) {
    session_start();
}
$checkIn = $_SESSION['checkIn'];
$checkOut = $_SESSION['checkOut'];
$roomType = $_SESSION['roomType'];
$paidAmount = $_SESSION['amount'];
$cust_id = $_SESSION['userinfo']['customer_id'];
$date = date('Y-m-d');
$printedDate = date('Y-m-d H:i:s', time());
?>

<?php

$html = "<img src='../../images/icons/logo.png'><br><br>";
$html.="<h2 align='center'>Room Reservation Receipt</h2>";
$html.="<h4 align='center'>Aqua Pearl Lake Resort-Moratuwa</h4>";
$html.="<hr>";

$html.="<p>Thank you for the payment.<br>Reservation details are shown below.</p>";

$html.="<table>";

$html.="<tr>
                <td>Room type: </td>
                <td>" . $roomType . "</td>
            </tr>";
$html.="<tr>
                <td>Check in: </td>
                <td>" . $checkIn . "</td>
            </tr>";
$html.="<tr>
                <td>Check out: </td>
                <td>" . $checkOut . "</td>
            </tr>";
$html.="<tr>
                <td>Paid amount (Rs): </td>
                <td>" . $paidAmount . "</td>
            </tr>";

$html .= "</table>";
$html.="<br><p><strong>Please bring this receipt when you are visiting hotel for the further processings.</strong></p>";
$html.="<lable>Printed on $printedDate</lable>";
$html.="<div>.................................................................................................................................................</div>";
?>

<?php

include_once '../../dompdf/dompdf_config.inc.php';

$dompdf = new DOMPDF();

$dompdf->load_html($html);
$dompdf->set_paper('A4', 'portrait');
$dompdf->render();
$dompdf->stream("Receipt.pdf", array("Attachment" => false));
?>