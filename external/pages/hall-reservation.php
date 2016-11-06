<?php
if (!isset($_SESSION)) {
    session_start();
}
if ($_SESSION['username'] == "") {
    header("Location:index.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Hall Reservation</title>
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
        <script src="../js/validations/hall-reservation.js"></script>   
        <script src="../js/validations/hall-reservation-calculations.js"></script>   
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
                        <h3>Reserve hall on:
                            <?php
                            $date = base64_decode($_REQUEST['date']);
                            $time = base64_decode($_REQUEST['time']);
                            echo $date . " " . $time;
                            ?>
                        </h3>
                        <ul class="progress-indicator">
                            <li class="completed"><span class="bubble"></span> Check Availability</li>
                            <li class="active"><span class="bubble"></span> Select Hall</li>
                            <li><span class="bubble"></span> Payment</li>
                            <li><span class="bubble"></span> Success</li>
                        </ul>

                        <div>
                            <form role="form" method="POST" action="hall-payment.php" target="_blank" onsubmit="return validateAll();">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group" id="hall-reserv-fname">
                                            <label class="control-label">FIrst name</label>
                                            <input class="form-control" name="fName"
                                                   type="text" readonly value="<?php echo $_SESSION['userinfo']['first_name'] ?>">
                                        </div>
                                        <div class="form-group" id="hall-reserv-lname">
                                            <label class="control-label">Last name</label>
                                            <input class="form-control" name="lName"
                                                   type="text" readonly value="<?php echo $_SESSION['userinfo']['last_name'] ?>">
                                        </div>
                                        <div class="form-group" id="hall-reserv-email">
                                            <label class="control-label">Email</label>
                                            <input class="form-control" type="email" name="email" readonly value="<?php echo $_SESSION['userinfo']['email'] ?>">
                                        </div>
                                        <div class="form-group" id="hall-reserv-contactno">
                                            <label class="control-label">Contact no</label>
                                            <label class="lbl-errors" id="hall-reserv-tel-error"></label>
                                            <input class="form-control" type="text" name="contactNo" id="hall-reserv-tel" value="<?php echo $_SESSION['userinfo']['telephone'] ?>">
                                        </div>                                
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group" id="hall-reserv-date">
                                                    <label class="control-label">Date</label>
                                                    <input class="form-control" type="text" name="date" value="<?php echo $date; ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group" id="hall-reserv-time">
                                                    <label class="control-label">Session</label>
                                                    <input class="form-control" type="text" name="time" value="<?php echo $time; ?>" readonly>
                                                </div>   
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Hall</label>
                                                    <select class="form-control" name="hall" id="hall-reserv-hall-select">
                                                        <?php
                                                        $hallData = [];
                                                        $halls = base64_decode($_REQUEST['halls']);
                                                        $hallData = explode(",", $halls);
                                                        for ($i = 0; $i < count($hallData) - 1; $i++) {
                                                            echo "<option value='$hallData[$i]'>$hallData[$i]</option>";
                                                        }
                                                        ?>
                                                    </select>
                                                </div>   
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group" id="hall-reserv-pax" style="display: inline-block;">
                                                    <label class="control-label">Pax</label>
                                                    <label class="lbl-errors" id="hall-reserv-pax-error"></label>
                                                    <input class="form-control" type="text" name="pax" id="hall-pax">
                                                </div>
                                            </div>
                                        </div>

                                        <div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group" id="hall-reserv-advance">
                                                        <label class="control-label">Total</label>
                                                        <input class="form-control" type="text" name="total-amount" id="hall-total" readonly="true">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group" id="hall-reserv-advance">
                                                        <label class="control-label">Advance</label>
                                                        <label class="lbl-errors" id="hall-reserv-advance-error"></label>
                                                        <input class="form-control" type="text" name="advance-payment" id="hall-advpay">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <label>
                                                Please note the advance payment for reservation only.<br>
                                                <strong>Your reservation will be confirmed once you make the payment.</strong>
                                            </label>
                                        </div>
                                        <div style="text-align: center;">
                                            <button type="submit" class="btn btn-success" style="width: 100%;">Proceed Payment</button>
                                        </div>
                                    </div>
                                </div> 
                            </form>
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