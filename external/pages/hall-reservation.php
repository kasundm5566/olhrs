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
                            <form role="form" method="POST" action="hall-payment.php">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group" id="hall-reserv-fname">
                                            <label class="control-label">FIrst name</label>
                                            <input class="form-control" name="fName"
                                                   type="text" readonly>
                                        </div>
                                        <div class="form-group" id="hall-reserv-lname">
                                            <label class="control-label">Last name</label>
                                            <input class="form-control" name="lName"
                                                   type="text" readonly>
                                        </div>
                                        <div class="form-group" id="hall-reserv-email">
                                            <label class="control-label">Email</label>
                                            <input class="form-control" type="email" name="email" readonly>
                                        </div>
                                        <div class="form-group" id="hall-reserv-contactno">
                                            <label class="control-label">Contact no</label>
                                            <input class="form-control" type="text" name="contactNo">
                                        </div>                                
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group" id="hall-reserv-date">
                                            <label class="control-label">Date</label>
                                            <input class="form-control" type="text" name="date" value="<?php echo $date; ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Hall</label>
                                            <select class="form-control" name="hall">
                                                <option value="Kings Hall">Kings Hall</option>
                                                <option value="Queens Hall A">Queens Hall A</option>
                                                <option value="Queens Hall B">Queens Hall B</option>
                                            </select>
                                        </div>   
                                        <div class="form-group" id="hall-reserv-time">
                                            <label class="control-label">Session</label>
                                            <input class="form-control" type="text" name="time" value="<?php echo $time; ?>" readonly>
                                        </div>                                        
                                        <div>
                                            <div class="form-group" id="hall-reserv-total" style="display: inline-block;">
                                                <label class="control-label">Total</label>
                                                <input class="form-control" type="text" name="total" readonly>
                                            </div>
                                            <div class="form-group" id="hall-reserv-advance" style="display: inline-block;">
                                                <label class="control-label">Advance</label>
                                                <input class="form-control" type="text" name="advance-payment" readonly>
                                            </div>
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