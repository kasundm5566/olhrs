<?php
if (!isset($_SESSION)) {
    session_start();
}
if ($_SESSION['username'] == "" || $_SESSION['group'] == "") {
    header("Location:../login/index.php");
    exit;
}
?>

<table class="table-bordered table-condensed" style="width: 100%;">
    <caption style="font-size: medium;">Monthly Reservations Report for Queens Hall B</caption>
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
    $month = $_REQUEST['month'];

    $sql = "SELECT * FROM reservation r,hall_reservation hr, customer c, hall h "
            . "WHERE r.reservation_id=hr.reservation_id AND hr.hall_id=h.hall_id "
            . "AND r.customer_id=c.customer_id AND year(reservation_date)='$year' "
            . "AND monthname(reservation_date)='$month' AND hall_name='Queens Hall B';";

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

<div style="padding-top: 10px; display: inline-block;">
    <a href="queensb-hall-report-print.php?year=<?php echo $year; ?>&month=<?php echo $month; ?>&hall=Queens Hall B" target="_blank" class="btn btn-success btn-xs">Print PDF</a>
</div>