<?php

if (!isset($_SESSION)) {
    session_start();
}
$reserv_date = $_SESSION['reservation-date'];
$hall_name = $_SESSION['hall-name'];
$time = $_SESSION['time'];
$pax = $_SESSION['pax'];
$advance_payment = $_SESSION['advance-payment'];
$cust_id = $_SESSION['userinfo']['customer_id'];
$date = date('Y-m-d');
$printedDate = date('Y-m-d H:i:s',  time());
?>

<?php
$html="<img src='../../images/icons/logo.png'><br><br>";
$html.="<h2 align='center'>Hall Reservation Receipt</h2>";
$html.="<h4 align='center'>Aqua Pearl Lake Resort-Moratuwa</h4>";
$html.="<hr>";

$html.="<p>Thank you for the interest on Aqua Pearl Lake Resort.<br>Reservation details are shown below.</p>";

$html.="<table>";

$html.="<tr>
                <td>Reservation date: </td>
                <td>" . $reserv_date . "</td>
            </tr>";
$html.="<tr>
                <td>Hall: </td>
                <td>" . $hall_name . "</td>
            </tr>";
$html.="<tr>
                <td>Session: </td>
                <td>" . $time . "</td>
            </tr>";
$html.="<tr>
                <td>Pax: </td>
                <td>" . $pax . "</td>
            </tr>";
$html.="<tr>
                <td>Payment amount (Rs): </td>
                <td>" . $advance_payment . "</td>
            </tr>";
$html.="<tr>
                <td>Reservation placed date: </td>
                <td>" . $date . "</td>
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