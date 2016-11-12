<?php
if (!isset($_SESSION)) {
    session_start();
}
if ($_SESSION['username'] == "" || $_SESSION['group'] == "Receptionist") {
    header("Location:../login/index.php");
    exit;
}
?>
<table class="table-bordered table-condensed tbl-daily" style="width: 100%;">
    <caption style="font-size: medium;">Daily Payments Report</caption>
    <thead class="thd-daily">
        <tr>
            <th>Payment date</th>
            <th>Amount</th>
            <th>Username</th>
            <th>Reservation type</th>
            <th>Payment method</th>
        </tr>
    </thead>    
    <?php
    include '../../common/dbconnection.php';

    $objDBConnection = new dbconnection();
    $connection = $objDBConnection->connection();

    $date = $_REQUEST['date'];

    $sql = "SELECT payment_date,amount,username,type,payment_method_name FROM"
            . " payment p,reservation r,customer c,payment_method pm WHERE"
            . " p.payment_date='$date' AND p.reservation_id=r.reservation_id"
            . " AND r.customer_id=c.customer_id AND p.payment_method_id=pm.payment_method_id;";

    $result = $connection->query($sql);
    if ($result) {
        echo '<tbody class="tbd-daily">';
        while ($row = $result->fetch_assoc()) {
            ?>
            <tr>
                <td><?php echo $row['payment_date'] ?></td>
                <td><?php echo $row['amount'] ?></td>
                <td><?php echo $row['username'] ?></td>
                <td><?php echo $row['type'] ?></td>
                <td><?php echo $row['payment_method_name'] ?></td>
            </tr>
            <?php
        }
        echo '</tbody>';
    } else {
        
    }
    ?>
</table>

<div style="padding-top: 10px; display: inline-block;">
    <a href="payment-report-print.php?date=<?php echo $date; ?>" target="_blank" class="btn btn-success btn-xs">Print PDF</a>
</div>
<?php
$total = 0;
$sql2 = "SELECT sum(amount) AS total FROM"
        . " payment p,reservation r,customer c,payment_method pm WHERE"
        . " p.payment_date='$date' AND p.reservation_id=r.reservation_id"
        . " AND r.customer_id=c.customer_id AND p.payment_method_id=pm.payment_method_id;";
$result2 = $connection->query($sql2);
while ($row2 = $result2->fetch_assoc()) {
    $total = $row2['total'];
}
?>
<div style="padding-top: 10px; display: inline-block; float: right;">
    <h4>Total (Rs.): <?php echo $total; ?></h4>
</div>