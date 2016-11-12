<?php
if (!isset($_SESSION)) {
    session_start();
}
if ($_SESSION['username'] == "") {
    header("Location:index.php");
    exit;
}
include './common/dbconnection.php';
$objDBConnection = new dbconnection();
$connection = $objDBConnection->connection();
$GLOBALS['connection'] = $connection;
?>
<html>
    <head>
        <title>Payment Success</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../bootstrap-3.3.7/css/bootstrap.min_1.css"/>
        <link rel="stylesheet" href="../css/site-layout.css"/>
        <link rel="stylesheet" href="../css/styles.css"/>
        <link rel="stylesheet" href="../css/anchorHoverEffect.css"/>
        <link rel="stylesheet" href="../css/progress-wizard.min.css"/>
        <link rel="stylesheet" href="../css/animate.css"/>
        <script src="../js/jquery-1.12.2.min.js"></script>
        <script src="../bootstrap-3.3.7/js/bootstrap.min.js"></script>  
        <script src="../js/jquery.cycleText.js"></script>
        <script src="../js/loader.js"></script>
        <script src="../js/modernizr.min.js"></script>
        <script src="../js/jquery.easing.1.3.min.js"></script>  
        <script src="../js/anchorHoverEffect.js"></script>
        <script src="../js/effects.js"></script>  
        <style>
            #site-footer{
                position: fixed;
                bottom: 0;
            }
        </style>
    </head>

    <body>
        <div class="loader-anim"></div>
        <?php include './common/minimum-header.php'; ?>

        <?php
        // Update reservation data after making a successful payment
        $amount = $_SESSION['amount'];
        $resId = $_SESSION['resId'];

        $paymentSql = "INSERT INTO payment"
                . " (amount,payment_date,reservation_id,payment_method_id) VALUES"
                . " ('$amount',CURDATE(),'$resId',"
                . " (SELECT payment_method_id FROM payment_method WHERE payment_method_name='Online'));";
        $res1 = $connection->query($paymentSql);

        if ($res1) {
            $balance = 100;
            $checkBalanceSql = "SELECT((SELECT total FROM reservation WHERE reservation_id='$resId')"
                    . "-(SELECT sum(amount) FROM payment WHERE reservation_id='$resId')) AS balance;";
            $res2 = $connection->query($checkBalanceSql);
            if ($res2) {
                while ($row = $res2->fetch_assoc()) {
                    $balance = $row['balance'];
                }
            }
        }
        if ($balance === "0.00") {
            $updateReservTblSql = "UPDATE reservation SET reservation_status='Completed' WHERE reservation_id='$resId';";
            $connection->query($updateReservTblSql);
        }
        if ($res1 && $res2) {
            ?>
            <div> 
                <div style="margin-top: 80px;">
                    <div class="row">

                        <div class="col-md-2">

                        </div>

                        <div class="col-md-8" id="div-rightPane">                      
                            <div style="text-align: center;">
                                <img src="../images/icons/success-icon.png" width="150px" height="150px"/>
                                <div style="margin-top: 30px;">
                                    <h3>Payment success</h3>
                                    <h1>Thank you!</h1>
                                </div>
                                <div style="margin-top: 30px;">                
                                    <h4>Your payment processed successfully...</h4>
                                    <h5>You may print the summary of the payment for future reference.<br>
                                        Click the button below to print the receipt.</h5>
                                </div>
                                <div>
                                    <a id="anchor-backtohome" href="customer-home.php">Back to homepage</a>
                                    <a class="btn btn-success btn-sm" href="./operations/print-hall-payment-receipt.php">Print receipt</a>
                                </div>
                            </div>
                        </div>                    
                    </div>
                </div>
            </div>
            <?php
        } else {
            ?>
            <div> 
                <div style="margin-top: 80px;">
                    <div class="row">

                        <div class="col-md-2">

                        </div>

                        <div class="col-md-8" id="div-rightPane">                      
                            <div style="text-align: center;">
                                <img src="../images/icons/error.png" width="150px" height="150px"/>
                                <div style="margin-top: 30px;">
                                    <h3>Payment failed</h3>
                                </div>
                                <div style="margin-top: 30px;">                
                                    <h4>Error processing the payment</h4>
                                    <h5>Something went wrong whilte processing thr payment.<br>
                                        Please try again later.</h5>
                                </div>
                                <div>
                                    <a id="anchor-backtohome" href="customer-home.php">Back to homepage</a>
                                </div>
                            </div>
                        </div>                    
                    </div>
                </div>
            </div>
            <?php
        }
        ?>


        <div id="site-footer">
            <?php include './common/footer.php'; ?>
        </div>
</html>