<?php
if (!isset($_SESSION)) {
    session_start();
}
if ($_SESSION['username'] == "" || $_SESSION['group'] == "") {
    header("Location:../login/index.php");
    exit;
}
?>

<table class="table-bordered" style="width: 100%;">
    <tr>
        <th>Customer first name</th>
        <th>Customer last name</th>
        <th>Check in</th>
        <th>Check out</th>
        <th>Total</th>
        <th>Status</th>
    </tr>
    <?php
    include '../../common/dbconnection.php';
    $objDBConnection = new dbconnection();
    $connection = $objDBConnection->connection();

    $year = $_REQUEST['year'];

    $sql = "SELECT * FROM reservation r,room_reservation rr, customer c, room_type rt "
            . "WHERE r.reservation_id=rr.reservation_id AND rr.room_type_id=rt.room_type_id "
            . "AND r.customer_id=c.customer_id AND year(check_in)='$year' AND "
            . "room_type_name='Cottage';";

    $result = $connection->query($sql);
    if ($result) {
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
    } else {
        
    }
    ?>
</table>

<div style="padding-top: 10px;">
    <a href="cottage-report-print.php?year=<?php echo $year; ?>&room=Cottages" target="_blank" class="btn btn-success btn-xs">Print PDF</a>
</div>