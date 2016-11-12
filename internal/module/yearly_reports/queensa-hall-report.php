<?php
if (!isset($_SESSION)) {
    session_start();
}
if ($_SESSION['username'] == "" || $_SESSION['group'] == "Receptionist") {
    header("Location:../login/index.php");
    exit;
}
?>

<table class="table-bordered table-condensed" style="width: 100%;">
    <caption style="font-size: medium;">Yearly Reservations Report for Queens Hall A</caption>
    <thead>
        <tr>
            <th>Customer first name</th>
            <th>Customer last name</th>
            <th>Reservation date</th>
            <th>Session</th>
            <th>Pax</th>
            <th>Total</th>
            <th>Status</th>
        </tr>
    </thead>
    <?php
    include '../../common/dbconnection.php';
    $objDBConnection = new dbconnection();
    $connection = $objDBConnection->connection();

    $year = $_REQUEST['year'];

    $sql = "SELECT * FROM reservation r,hall_reservation hr, customer c, hall h "
            . "WHERE r.reservation_id=hr.reservation_id AND hr.hall_id=h.hall_id AND"
            . " r.customer_id=c.customer_id AND year(reservation_date)='$year' AND "
            . "hall_name='Queens Hall A';";

    $result = $connection->query($sql);
    if ($result) {
        echo '<tbody>';
        while ($row = $result->fetch_assoc()) {
            ?>
            <tr>
                <td><?php echo $row['first_name'] ?></td>
                <td><?php echo $row['last_name'] ?></td>
                <td><?php echo $row['reservation_date'] ?></td>
                <td><?php echo $row['time'] ?></td>
                <td><?php echo $row['pax'] ?></td>
                <td><?php echo $row['total'] ?></td>
                <td><?php echo $row['reservation_status'] ?></td>
            </tr>
            <?php
        }
        echo '</tbody>';
    } else {
        
    }
    ?>
</table>

<div style="padding-top: 10px;">
    <a href="queensa-hall-report-print.php?year=<?php echo $year; ?>&hall=Queens Hall A" target="_blank" class="btn btn-success btn-xs">Print PDF</a>
</div>
<?php
$total = 0;
$sql2 = "SELECT sum(total) AS total FROM reservation r,hall_reservation hr, customer c, hall h "
            . "WHERE r.reservation_id=hr.reservation_id AND hr.hall_id=h.hall_id AND"
            . " r.customer_id=c.customer_id AND year(reservation_date)='$year' AND "
            . "hall_name='Queens Hall A';";
$result2 = $connection->query($sql2);
while ($row2 = $result2->fetch_assoc()) {
    $total = $row2['total'];
}
?>
<div style="padding-top: 10px; display: inline-block; float: right;">
    <h4>Total (Rs.): <?php echo $total; ?></h4>
</div>