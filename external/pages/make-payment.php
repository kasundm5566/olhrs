<?php
if (!isset($_SESSION)) {
    session_start();
}
if ($_SESSION['username'] == "") {
    header("Location:index.php");
    exit;
}

function convertCurrency($amount, $from, $to) {
    $url = "https://www.google.com/finance/converter?a=$amount&from=$from&to=$to";
    $data = file_get_contents($url);
    preg_match("/<span class=bld>(.*)<\/span>/", $data, $converted);
    $converted = preg_replace("/[^0-9.]/", "", $converted[1]);
    return round($converted, 2);
}

include './common/dbconnection.php';
$objDBConnection = new dbconnection();
$connection = $objDBConnection->connection();
$GLOBALS['connection'] = $connection;

$res_id = base64_decode($_REQUEST['res']);
$type = $_REQUEST['type'];
$payment_amount = $_REQUEST['make-payment-amount'];
$amountPaying = convertCurrency($payment_amount, "LKR", "USD");
?>
<html>
    <head>
        <title>Make Payment</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../bootstrap-3.3.7/css/bootstrap.min_1.css"/>
        <link rel="stylesheet" href="../css/site-layout.css"/>
        <link rel="stylesheet" href="../css/styles.css"/>
        <link rel="stylesheet" href="../css/progress-wizard.min.css"/>
        <link rel="stylesheet" href="../css/animate.css"/>
        <script src="../js/jquery-1.12.2.min.js"></script>
        <script src="../bootstrap-3.3.7/js/bootstrap.min.js"></script>  
        <script src="../js/jquery.cycleText.js"></script>
        <script src="../js/loader.js"></script>
        <script src="../js/modernizr.min.js"></script>
        <script src="../js/jquery.easing.1.3.min.js"></script>    
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
        $hallName = "";
        $reservTime = "";
        $reservDate = "";
        $_SESSION['type'] = $type;
        $_SESSION['amount'] = $payment_amount;
        $_SESSION['resId'] = $res_id;
        if ($type == "Hall") {
            $sql = "SELECT reservation_date,hall_name,time FROM reservation r,"
                    . " hall_reservation hr, hall h WHERE r.reservation_id='$res_id'"
                    . " AND r.reservation_id=hr.reservation_id AND hr.hall_id=h.hall_id;";
            $res = $connection->query($sql);
            if ($res) {
                while ($row = $res->fetch_assoc()) {
                    $hallName = $row['hall_name'];
                    $reservTime = $row['time'];
                    $reservDate = $row['reservation_date'];
                }
            }
            $_SESSION['hall'] = $hallName;
            $_SESSION['reservTime'] = $reservTime;
            $_SESSION['reservDate'] = $reservDate;
            
            ?>
            <div> 
                <div style="margin-top: 80px;">
                    <div class="row">

                        <div class="col-md-3" id="div-leftPane">
                            <?php include './common/sidebar-hall-reservation.php'; ?>
                        </div>

                        <div class="col-md-8" id="div-rightPane">
                            <h3>Payment Summary</h3>
                            <div style="margin-top: 25px;">
                                <div>
                                    <p>Type: <?php echo $type; ?></p>
                                </div>
                                <div>
                                    <p>Reservation date: <?php echo $reservDate; ?></p>
                                </div>                                
                                <div>
                                    <p>Hall name: <?php echo $hallName; ?></p>
                                </div>
                                <div>
                                    <p>Session: <?php echo $reservTime; ?></p>
                                </div>
                                <div>
                                    <p>Amount paying(USD): <?php echo $amountPaying; ?></p>
                                </div>
                            </div>
                            <div>
                                <strong>You will be redirect to the page to make the page now.</strong>
                            </div>
                        </div>                    
                    </div>
                </div>
            </div>
            <form id="pay-form" action='https://www.sandbox.paypal.com/cgi-bin/webscr' method='post'>
                <input type='hidden' name='business' value='kasunutube@ymail.com'>
                <input type='hidden' name='cmd' value='_xclick'>
                <input type='hidden' name='item_name' value='<?php echo $type . " reservation payment"; ?>'>
                <input type='hidden' name='amount' value='<?php echo $amountPaying; ?>'>
                <!--<input type='hidden' name='quantity' value='<?php echo '' ?>'>-->
                <input type='hidden' name='no_shipping' value='1'>
                <input type='hidden' name='currency_code' value='USD'>
                <input type='hidden' name='cancel_return' value=''>
                <input type='hidden' name='return' value='http://localhost/olhrs/external/pages/hall-payment-success.php'>
                <!--<input type="hidden" type="image" src="https://paypal.com/en_US/i/btn/btn_buynowCC_LG.gif" name="submit">-->
            </form>
            <?php
        } else if ($type == "Room") {
            $checkIn = "";
            $checkOut = "";
            $roomTypeName = "";
            $sql = "SELECT check_in,check_out,room_type_name FROM reservation r,"
                    . " room_reservation rr,room_type rt WHERE r.reservation_id='$res_id'"
                    . " AND r.reservation_id=rr.reservation_id AND rr.room_type_id=rt.room_type_id;";
            $res = $connection->query($sql);
            if ($res) {
                while ($row = $res->fetch_assoc()) {
                    $checkIn = $row['check_in'];
                    $checkOut = $row['check_out'];
                    $roomTypeName = $row['room_type_name'];
                }
                $_SESSION['checkIn']=$checkIn;
                $_SESSION['checkOut']=$checkOut;
                $_SESSION['roomType']=$roomTypeName;
                ?>
                <div> 
                    <div style="margin-top: 80px;">
                        <div class="row">

                            <div class="col-md-3" id="div-leftPane">
                                <?php include './common/sidebar-hall-reservation.php'; ?>
                            </div>

                            <div class="col-md-8" id="div-rightPane">
                                <h3>Payment Summary</h3>
                                <div style="margin-top: 25px;">
                                    <div>
                                        <p>Type: <?php echo $type; ?></p>
                                    </div>
                                    <div>
                                        <p>Check in: <?php echo $checkIn; ?></p>
                                    </div>
                                    <div>
                                        <p>Check out: <?php echo $checkOut; ?></p>
                                    </div>
                                    <div>
                                        <p>Room type: <?php echo $roomTypeName; ?></p>
                                    </div>
                                    <div>
                                        <p>Amount paying(USD): <?php echo $amountPaying; ?></p>
                                    </div>
                                </div>
                                <div>
                                    <strong>You will be redirect to the page to make the page now.</strong>
                                </div>
                            </div>                    
                        </div>
                    </div>
                </div>
                <form id="pay-form" action='https://www.sandbox.paypal.com/cgi-bin/webscr' method='post'>
                    <input type='hidden' name='business' value='kasunutube@ymail.com'>
                    <input type='hidden' name='cmd' value='_xclick'>
                    <input type='hidden' name='item_name' value='<?php echo $type . " reservation payment"; ?>'>
                    <input type='hidden' name='amount' value='<?php echo $amountPaying; ?>'>
                    <!--<input type='hidden' name='quantity' value='<?php echo '' ?>'>-->
                    <input type='hidden' name='no_shipping' value='1'>
                    <input type='hidden' name='currency_code' value='USD'>
                    <input type='hidden' name='cancel_return' value=''>
                    <input type='hidden' name='return' value='http://localhost/olhrs/external/pages/room-payment-success.php'>
                    <!--<input type="hidden" type="image" src="https://paypal.com/en_US/i/btn/btn_buynowCC_LG.gif" name="submit">-->
                </form>
                <?php
            }
        } else {
            
        }
        ?>

        <script>
            $(document).ready(function () {
                setTimeout(function () {
                    $("#pay-form").submit();
                }, 3000);
            });
        </script>       

        <div id="site-footer">
            <?php include './common/footer.php'; ?>
        </div>
    </body>
</html>

