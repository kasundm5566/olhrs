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
        // Adding reservation data after making a successful payment
        $checkIn = $_SESSION['check-in'];
        $checkOut = $_SESSION['check-out'];
        $roomType = $_SESSION['room-type'];
        $mealPlan = $_SESSION['meal-plan'];
        $roomCount = $_SESSION['room-count'];
        $fullTotal = $_SESSION['full-total'];
        $total = $_SESSION['total'];
        $cust_id = $_SESSION['userinfo']['customer_id'];

        $status = "Pending";
        if (($fullTotal + 0) == $total) {
            $status = "Completed";
        }

        $reservationSql = "INSERT INTO reservation"
                . " (placed_date,reservation_status,type,total,customer_id) VALUES"
                . " (CURDATE(),'$status','Room',$fullTotal,'$cust_id');";
        $res1 = $connection->query($reservationSql);
        $added_resId = $connection->insert_id;

        $roomReservationSql = "INSERT INTO room_reservation"
                . " (reservation_id,room_type_id,check_in,check_out,count,meal_plan_id) VALUES"
                . " ('$added_resId',(SELECT room_type_id FROM room_type WHERE room_type_name='$roomType'),"
                . "'$checkIn','$checkOut','$roomCount',(SELECT meal_plan_id FROM meal_plan WHERE meal_plan_name='$mealPlan'));";
        $res2 = $connection->query($roomReservationSql);

        $paymentSql = "INSERT INTO payment"
                . " (amount,payment_date,reservation_id,payment_method_id) VALUES"
                . " ('$total',CURDATE(),'$added_resId',"
                . "(SELECT payment_method_id FROM payment_method WHERE payment_method_name='Online'));";
        $res3 = $connection->query($paymentSql);
        ?>
        <?php
        if ($res1 && $res2 && $res3) {
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
                                <img src="../images/icons/success-icon.png" width="150px" height="150px"/>
                                <div style="margin-top: 30px;">
                                    <h3>Reservation success.</h3>
                                    <h1>Thank you!</h1>
                                </div>
                                <div style="margin-top: 30px;">                
                                    <h4>Your reservation confirmed successfully....</h4>
                                    <h5>You may print the summary of reservation for future reference.<br>
                                        Click the button below to print the receipt.</h5>
                                </div>
                                <div>
                                    <a id="anchor-backtohome" href="customer-home.php">Back to homepage</a>
                                    <a class="btn btn-success btn-sm" href="./operations/print-room-receipt.php">Print receipt</a>
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
                            <div style="text-align: center;margin-top: 10px;">
                                <img src="../images/icons/error.png" width="150px" height="150px"/>
                                <div style="margin-top: 30px;">
                                    <h3>Making reservation failed</h3>
                                </div>
                                <div style="margin-top: 30px;">                
                                    <h4>Error processing the room reservation.</h4>
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
    </body>
</html>