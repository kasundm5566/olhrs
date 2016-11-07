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
        <title>Reservation Success</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../bootstrap-3.3.7/css/bootstrap.min_1.css"/>
        <link rel="stylesheet" href="../css/site-layout.css"/>
        <link rel="stylesheet" href="../css/styles.css"/>
        <link rel="stylesheet" href="../css/animate.css"/>
        <link rel="stylesheet" href="../css/anchorHoverEffect.css"/>
        <link rel="stylesheet" href="../css/progress-wizard.min.css"/>
        <script src="../js/jquery-1.12.2.min.js"></script>
        <script src="../js/jquery.cycleText.js"></script>
        <script src="../bootstrap-3.3.7/js/bootstrap.min.js"></script>  
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
        // Adding reservation data after making a successful payment
        $reserv_date = $_SESSION['reservation-date'];
        $hall_name = $_SESSION['hall-name'];
        $time = $_SESSION['time'];
        $pax = $_SESSION['pax'];
        $total = $_SESSION['hall-total'];
        $advance_payment = $_SESSION['advance-payment'];
        $cust_id = $_SESSION['userinfo']['customer_id'];

        $status = "Pending";
        if (($total + 0) == $advance_payment) {
            $status = "Completed";
        }
        

        $reservationSql = "INSERT INTO reservation"
                . " (placed_date,reservation_status,type,total,customer_id) VALUES"
                . " (CURDATE(),'$status','Hall',$total,'$cust_id');";
        $connection->query($reservationSql);
        $added_resId = $connection->insert_id;

        $hallReservationSql = "INSERT INTO hall_reservation"
                . " (reservation_id,hall_id,time,reservation_date,pax) VALUES"
                . " ('$added_resId',(SELECT hall_id FROM hall WHERE hall_name='$hall_name'),"
                . "'$time','$reserv_date','$pax');";
        $connection->query($hallReservationSql);

        $paymentSql = "INSERT INTO payment"
                . " (amount,payment_date,reservation_id,payment_method_id) VALUES"
                . " ('$advance_payment',CURDATE(),'$added_resId',"
                . "(SELECT payment_method_id FROM payment_method WHERE payment_method_name='Online'));";
        $connection->query($paymentSql);
        ?>

        <div> 
            <div style="margin-top: 80px;">
                <div class="row">

                    <div class="col-md-3" id="div-leftPane">
                        <?php include './common/sidebar-hall-reservation.php'; ?>
                    </div>

                    <div class="col-md-8" id="div-rightPane">
                        <ul class="progress-indicator">
                            <li class="completed"><span class="bubble"></span> Check Availability</li>
                            <li class="completed"><span class="bubble"></span> Select Hall</li>
                            <li class="completed"><span class="bubble"></span> Payment</li>
                            <li class="completed"><span class="bubble"></span> Success</li>
                        </ul>                        
                        <div style="text-align: center;">
                            <div style="margin-top: 50px;">
                                <h3>Reservation success</h3>
                                <h1>Thank you!</h1>
                            </div>
                            <div style="margin-top: 30px;">                
                                <h4>Your reservation confirmed successfully...</h4>
                                <h5>You may print the summary of reservation for future reference.<br>
                                    Click the button below to print the receipt.</h5>
                            </div>
                            <div>
                                <a id="anchor-backtohome" href="customer-home.php">Back to homepage</a>
                                <a class="btn btn-success btn-sm" href="./operations/print-hall-receipt.php">Print receipt</a>
                            </div>
                        </div>
                    </div>                    
                </div>
            </div>
        </div>
        <div id="site-footer">
            <?php include './common/footer.php'; ?>
        </div>
    </body>
</html>