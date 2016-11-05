<?php

include '../../common/dbconnection.php';
$objDBConnection = new dbconnection();
$connection = $objDBConnection->connection();

$res_id = $_GET['res'];
$total = $_GET['total'];
$paid_amout = 0;

$sql = "SELECT * FROM payment p,payment_method pm WHERE p.payment_method_id=pm.payment_method_id"
        . " AND reservation_id=$res_id;";

$result = $connection->query($sql);
if ($result) {
    $table = "<table class='table table-bordered'>";
    $table.="<tr><th>Payment Date</th><th>Amount</th><th>Payment method</th></tr>";
    while ($row = $result->fetch_assoc()) {
        $table.="<tr>
                <td>" . $row['payment_date'] . "</td>
                <td>" . $row['amount'] . "</td>
                <td>" . $row['payment_method_name'] . "</td>
            </tr>";
        $paid_amout+=$row['amount'];
    }
    $table.="</table>";
    $due_amount = $total - $paid_amout;
    $table.="<input type='hidden' id='due-amount-hdn' value='$due_amount'/>";
    $table.="<lable id='lbl-due-amount' style='float:right;'>Payment due amount: " . $due_amount . "</lable>";
    echo $table;
} else {
    echo 'No payment data available.';
}
