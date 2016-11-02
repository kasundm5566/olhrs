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

$perRoomPrice = $_POST['total'] / $_POST['roomcount']
?>
<html>
    <head>
        <title>Payment</title>
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
                            <li class="active"><span class="bubble"></span> Payment</li>
                            <li><span class="bubble"></span> Success</li>
                        </ul>
                        <h3>Reservation Summary</h3>
                        <div style="margin-top: 25px;">
                            <div>
                                <p>Check in date: <?php echo $_POST['indate']; ?></p>
                            </div>
                            <div>
                                <p>Check out date: <?php echo $_POST['outdate']; ?></p>
                            </div>
                            <div>
                                <p>Room type: <?php echo $_POST['roomtype']; ?></p>
                            </div>
                            <div>
                                <p>Meal plan: <?php echo $_POST['meal-plan']; ?></p>
                            </div>
                            <div>
                                <p>Room count: <?php echo $_POST['roomcount']; ?></p>
                            </div>
                            <div>
                                <p>Contact no: <?php echo $_POST['contactNo']; ?></p>
                            </div>
                            <div>
                                <p>Total: $<?php echo convertCurrency($_POST['total'], "LKR", "USD"); ?> USD</p>
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
            <input type='hidden' name='business' value='kasunutube-facilitator@ymail.com'>
            <input type='hidden' name='cmd' value='_xclick'>
            <input type='hidden' name='item_name' value='<?php echo 'Room reservation-' . $_POST['roomtype'] . "-" . $_POST['meal-plan']; ?>'>
            <input type='hidden' name='amount' value='<?php echo convertCurrency($perRoomPrice, "LKR", "USD"); ?>'>
            <input type='hidden' name='quantity' value='<?php echo $_POST['roomcount'] ?>'>
            <input type='hidden' name='no_shipping' value='1'>
            <input type='hidden' name='currency_code' value='USD'>
            <input type='hidden' name='cancel_return' value=''>
            <input type='hidden' name='return' value='http://yoursite.com/success.php'>
            <!--<input type="hidden" type="image" src="https://paypal.com/en_US/i/btn/btn_buynowCC_LG.gif" name="submit">-->
        </form>

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

