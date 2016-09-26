<?php
if (!isset($_SESSION)) {
    session_start();
}
if ($_SESSION['username'] == "") {
    header("Location:index.php");
    exit;
}
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
        <script src="../js/jquery-1.12.2.min.js"></script>
        <script src="../bootstrap-3.3.7/js/bootstrap.min.js"></script>  
        <script src="../js/loader.js"></script>
        <script src="../js/modernizr.min.js"></script>
        <script src="../js/jquery.easing.1.3.min.js"></script>  
        <script src="../js/anchorHoverEffect.js"></script>
        <script src="../js/effects.js"></script>  
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
                            <li class="completed"><span class="bubble"></span> Payment</li>
                            <li class="completed"><span class="bubble"></span> Success</li>
                        </ul>                        
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
                            <input type="button" class="btn btn-success btn-sm" value="Print receipt">
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