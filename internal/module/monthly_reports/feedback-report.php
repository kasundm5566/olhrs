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
    <caption style="font-size: medium;">Yearly Payments Report</caption>
    <thead>
        <tr>
            <th>Customer FName</th>
            <th>Customer LName</th>
            <th>Username</th>
            <th>Rating</th>
            <th>Comment</th>
            <th>Date</th>
        </tr>
    </thead>    
    <?php
    include '../../common/dbconnection.php';

    $objDBConnection = new dbconnection();
    $connection = $objDBConnection->connection();

    $year = $_REQUEST['year'];
    $month = $_REQUEST['month'];

    $sql = "SELECT first_name,last_name,username,rating,comment,date FROM
        reservation r,feedback f,customer c WHERE r.feedback_id=f.feedback_id AND
        f.customer_id=c.customer_id AND YEAR(f.date)='$year' AND MONTHNAME(f.date)='$month';";

    $result = $connection->query($sql);
    if ($result) {
        echo '<tbody>';
        while ($row = $result->fetch_assoc()) {
            ?>
            <tr>
                <td><?php echo $row['first_name'] ?></td>
                <td><?php echo $row['last_name'] ?></td>
                <td><?php echo $row['username'] ?></td>
                <td><?php echo $row['rating'] ?></td>
                <td><?php echo $row['comment'] ?></td>
                <td><?php echo $row['date'] ?></td>
            </tr>
            <?php
        }
        echo '</tbody>';
    } else {
        
    }
    ?>
</table>

<div style="padding-top: 10px; display: inline-block;">
    <a href="feedback-report-print.php?year=<?php echo $year; ?>&month=<?php echo $month; ?>" target="_blank" class="btn btn-success btn-xs">Print PDF</a>
</div>