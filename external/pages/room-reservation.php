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
                        <?php include './common/sidebar-room-reservation.php'; ?>
                    </div>

                    <div class="col-md-8" id="div-rightPane">                        
                        <h3>Reserve a <?php $type = base64_decode($_REQUEST['type']); ?> room on:
                            <?php
                            $indate = base64_decode($_REQUEST['indate']);
                            $outdate = base64_decode($_REQUEST['outdate']);
                            echo $indate . " to " . $outdate;
                            ?>
                        </h3>
                        <ul class="progress-indicator">
                            <li class="completed"><span class="bubble"></span> Check Availability</li>
                            <li class="active"><span class="bubble"></span> Select Hall</li>
                            <li><span class="bubble"></span> Payment</li>
                            <li><span class="bubble"></span> Success</li>
                        </ul>

                        <div>
                            <form role="form" method="POST" action="room-payment.php">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group" id="room-reserv-fname">
                                            <label class="control-label">FIrst name</label>
                                            <input class="form-control" name="fName"
                                                   type="text" readonly>
                                        </div>
                                        <div class="form-group" id="room-reserv-lname">
                                            <label class="control-label">Last name</label>
                                            <input class="form-control" name="lName"
                                                   type="text" readonly>
                                        </div>
                                        <div class="form-group" id="room-reserv-email">
                                            <label class="control-label">Email</label>
                                            <input class="form-control" type="email" name="email" readonly>
                                        </div>
                                        <div class="form-group" id="room-reserv-contactno">
                                            <label class="control-label">Contact no</label>
                                            <input class="form-control" type="text" name="contactNo">
                                        </div>                                
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group" id="room-reserv-indate">
                                            <label class="control-label">Check in date</label>
                                            <input class="form-control" type="text" name="indate" value="<?php echo $indate; ?>" readonly>
                                        </div>
                                        <div class="form-group" id="room-reserv-outdate">
                                            <label class="control-label">Check out date</label>
                                            <input class="form-control" type="text" name="outdate" value="<?php echo $outdate; ?>" readonly>
                                        </div>
                                        <div>
                                            <div class="form-group" id="room-reserv-type" style="display:inline-block; padding-right: 20px;">
                                                <label class="control-label">Room type</label>
                                                <input class="form-control" type="text" name="roomtype" value="<?php echo $type; ?>" readonly>
                                            </div>
                                            <div class="form-group" id="room-reserv-count" style="display:inline-block;">
                                                <label class="control-label">No of rooms: </label>
                                                <input class="spin" type="number" min="1"
                                                       max="3" value="1" name="roomcount">
                                            </div>
                                        </div>
                                        <div class="form-group" id="room-reserv-total">
                                            <label class="control-label">Total</label>
                                            <input class="form-control" type="text" name="total" readonly>
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
        <script>
            $("[type='number']").keypress(function (evt) {
                evt.preventDefault();
            });
        </script>
    </body>
</html>