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
        <title>Payment</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../bootstrap-3.3.7/css/bootstrap.min_1.css"/>
        <link rel="stylesheet" href="../css/site-layout.css"/>
        <link rel="stylesheet" href="../css/styles.css"/>
        <link rel="stylesheet" href="../css/progress-wizard.min.css"/>
        <script src="../js/jquery-1.12.2.min.js"></script>
        <script src="../bootstrap-3.3.7/js/bootstrap.min.js"></script>  
        <script src="../js/loader.js"></script>
        <script src="../js/modernizr.min.js"></script>
        <script src="../js/jquery.easing.1.3.min.js"></script>    
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
                                <p>Room count: <?php echo $_POST['roomcount']; ?></p>
                            </div>
                            <div>
                                <p>Contact no: <?php echo $_POST['contactNo']; ?></p>
                            </div>
                        </div>
                        <div style="margin-top: 30px;">
                            <h4>Waiting for the payment completion...</h4>
                        </div>
                        <div style="text-align: center;">
                            <img src="../images/Preloader_10.gif"/>
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

