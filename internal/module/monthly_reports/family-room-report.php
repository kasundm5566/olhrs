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
    <caption style="font-size: medium;">Monthly Reservations Report for Family Rooms</caption>
    <thead>
        <tr>
            <th>Customer first name</th>
            <th>Customer last name</th>
            <th>Check in</th>
            <th>Check out</th>
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

    $sql = "SELECT * FROM reservation r,room_reservation rr, customer c, room_type rt "
            . "WHERE r.reservation_id=rr.reservation_id AND rr.room_type_id=rt.room_type_id "
            . "AND r.customer_id=c.customer_id AND year(check_in)='$year' AND "
            . "monthname(check_in)='$month' AND room_type_name='Family';";

    $result = $connection->query($sql);
    if ($result) {
        echo '<tbody>';
        while ($row = $result->fetch_assoc()) {
            ?>
            <tr>
                <td><?php echo $row['first_name'] ?></td>
                <td><?php echo $row['last_name'] ?></td>
                <td><?php echo $row['check_in'] ?></td>
                <td><?php echo $row['check_out'] ?></td>
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
    <a href="family-room-report-print.php?year=<?php echo $year; ?>&month=<?php echo $month; ?>&room=Family Rooms" target="_blank" class="btn btn-success btn-xs">Print PDF</a>
</div>
<?php
$total = 0;
$sql2 = "SELECT sum(total) AS total FROM reservation r,room_reservation rr, customer c, room_type rt "
        . "WHERE r.reservation_id=rr.reservation_id AND rr.room_type_id=rt.room_type_id "
        . "AND r.customer_id=c.customer_id AND year(check_in)='$year' AND "
        . "monthname(check_in)='$month' AND room_type_name='Family';";
$result2 = $connection->query($sql2);
while ($row2 = $result2->fetch_assoc()) {
    $total = $row2['total'];
}
?>
<div style="padding-top: 10px; display: inline-block; float: right;">
    <h4>Total (Rs.): <?php echo $total; ?></h4>
</div>