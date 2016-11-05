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
$month = $_REQUEST['month'];

$html = "<style>"
        . "th,td{border:1px solid #D9D5BE;}"
        . "table{border:1px solid #D9D5BE; margin:10px; width: 100%;}"
        . "</style>";

$html.="<img src='../../images/icons/logo.png'><br><br>";
$html.="<h2 align='center'>Payments Report-$month $year</h2>";
$html.="<h4 align='center'>Aqua Pearl Lake Resort-Moratuwa</h4>";
$html.="<table>
    <tr>
        <th>Customer FName</th>
        <th>Customer LName</th>
        <th>Username</th>
        <th>Rating</th>
        <th>Comment</th>
        <th>Date</th>
    </tr>";

    $sql = "SELECT first_name,last_name,username,rating,comment,date FROM
        reservation r,feedback f,customer c WHERE r.feedback_id=f.feedback_id AND
        f.customer_id=c.customer_id AND YEAR(f.date)='$year' AND MONTHNAME(f.date)='$month';";

$result = $connection->query($sql);
if ($result) {
    while ($row = $result->fetch_assoc()) {

        $html.="<tr>
                <td>" . $row['first_name'] . "</td>
                <td>" . $row['last_name'] . "</td>
                <td>" . $row['username'] . "</td>
                <td>" . $row['rating'] . "</td>
                <td>" . $row['comment'] . "</td>
                <td>" . $row['date'] . "</td>
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
$dompdf->stream("Feedbacks_Monthly_Report.pdf", array("Attachment" => false));
?>