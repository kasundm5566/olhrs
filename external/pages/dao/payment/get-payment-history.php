<?php

include '../../common/dbconnection.php';
$objDBConnection = new dbconnection();
$connection = $objDBConnection->connection();

$res_id = $_GET['res'];
$total = $_GET['total'];
$type = $_GET['type'];
$paid_amout = 0;
$res_idEnc= base64_encode($res_id);

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

    $table.="<div id='make-payment-div'>";
    $table.="<form method='post' action='./make-payment.php?res=$res_idEnc&type=$type' target='_blank' onsubmit='return validateMakePaymentAmount();'>";

    $table.="<lable>Amount:</lable>";
    $table.="<label class='lbl-errors' id='make-payment-error'></label>";
    $table.="<div>";
    $table.="<input type='text' name='make-payment-amount' id='make-payment-amount'/>";
    $table.="<input class='btn btn-primary btn-xs' id='btn-makepayment-submit' style='width:70px; margin-left:10px;' type='submit' value='Pay'>";
    $table.="</div>";
    $table.="</form>";
    $table.="</div>";
    echo $table;
} else {
    echo 'No payment data available.';
}
