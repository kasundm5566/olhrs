<?php
if (!isset($_SESSION)) {
    session_start();
}
if ($_SESSION['username'] == "" || $_SESSION['group'] == "") {
    header("Location:../login/index.php");
    exit;
}
?>

<html>
    <head>
        <title>Reservations</title>
        <link rel="stylesheet" type="text/css" href="../../css/styles.css" />
        <link rel="stylesheet" type="text/css" 
              href="../../bootstrap-3.3.7/css/bootstrap.min_1.css" />
        <link rel="stylesheet" type="text/css" 
              href="../../css/bootstrap-datepicker3.css" />
        <script type="text/javascript" src="../../js/jquery-1.12.2.min.js">
        </script><script type="text/javascript" src="../../bootstrap-3.3.7/js/bootstrap.min.js">
        </script>
        <script type="text/javascript" src="../../js/common.js"></script>
        <script type="text/javascript" src="../../js/bootstrap-datepicker.min.js"></script>
        <script type="text/javascript" src="../../js/datepicker.js"></script>
        <script type="text/javascript" src="../../js/validations/reservation-rec.js"></script>
        <link rel="stylesheet" type="text/css" href="../../css/m-styles.min.css" />
        <script type="text/javascript" src="../../js/m-radio.min.js"></script>
    </head>

    <body>
        <div id="header">
            <?php include '../../common/header.php'; ?>      
        </div>

        <div id="navi">
            <?php include '../../common/navi.php'; ?>
            &nbsp;
        </div>

        <?php if ($_SESSION['group'] == "Receptionist") { ?>
            <div class="center-div">
                <div class="section">          
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <img class="icons" src="../../images/icons/reservation.png">
                            <h3 class="header-panel">&nbsp;Reservations</h3>
                        </div>
                        <div class="panel-body">
                            <div class="container" style="width: 800px;">
                                <label class="radio-inline">
                                    <input type="radio" name="optradio" checked="true" value="halls">Halls
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="optradio" value="rooms">Rooms
                                </label>
                                <hr>
                                <div id="check-hall-avail-div">
                                    <h4>Get available halls</h4>
                                    <div class="row">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-4">
                                            <form method="post" action="../../dao/hall_reservations/get_available_halls.php" onsubmit="return validateHallReservationDate();">
                                                <div>
                                                    <label>Date:</label>
                                                    <label style="color: red;" class="lbl-errors" id="hall-reserv-date-error"></label>
                                                    <input type="text" class="form-control date-rec1" id="hall-date" name="hall-date"
                                                           placeholder="Select a date" readonly/>
                                                </div>
                                                <div class="form-group">
                                                    <label>Session:</label>
                                                    <select class="form-control" name="sel-session">
                                                        <option value="Morning">Morning</option>
                                                        <option value="Evening">Evening</option>
                                                        <option value="Full day">Full day</option>
                                                    </select>
                                                </div>
                                                <div style="padding-top: 15px; float: right;">
                                                    <input type="submit" class="btn btn-success" value="Get available halls"/>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="col-md-1"></div>
                                        <div class="col-md-5">
                                            <h5>Available Halls:</h5>
                                            <hr>
                                            <?php
                                            if (isset($_REQUEST['halls'])) {
                                                $hallData = [];
                                                $halls = base64_decode($_REQUEST['halls']);
                                                $hallData = explode(",", $halls);
                                                if (count($hallData) != 0) {
                                                    for ($i = 0; $i < count($hallData) - 1; $i++) {
                                                        echo "<option value='$hallData[$i]'>$hallData[$i]</option>";
                                                    }
                                                } else {
                                                    echo 'No halls available.';
                                                }
                                            }
                                            ?>
                                        </div>
                                        <div class="col-md-1"></div>
                                    </div>
                                </div>
                                <div id="check-room-avail-div">
                                    <h4>Get available rooms</h4>
                                    <div class="row">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-4">
                                            <form>
                                                <div>
                                                    <label>Check in:</label>
                                                    <label style="color: red;" class="lbl-errors" id="room-reserv-intime-error"></label>
                                                    <input type="text" class="form-control date" id="room-in-date" name="room-in-date"
                                                           placeholder="Select a date" readonly/>
                                                </div>
                                                <div style="padding-top: 10px;">
                                                    <label>Check out:</label>
                                                    <label style="color: red;" class="lbl-errors" id="room-reserv-outtime-error"></label>
                                                    <input type="text" class="form-control date" id="room-out-date" name="room-out-date"
                                                           placeholder="Select a date" readonly/>
                                                </div>
                                                <div style="padding-top: 15px; float: right;">
                                                    <button class="btn btn-success" id="rec-btn-checkroomavail">Get available halls</button>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="col-md-1"></div>
                                        <div class="col-md-5" id="div-available-room-det">
                                        </div>
                                        <div class="col-md-1"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
            </div> 
        <?php } else { ?>
            <div class="center-div">
                <div class="section">          
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <img class="icons" src="../../images/icons/reservation.png">
                            <h3 class="header-panel">&nbsp;Reservations</h3>
                        </div>
                        <div class="panel-body">
                            <div class="container" style="width: 600px;">
                                <div>
                                    <a href="../hall_reservations/hall-reservations.php" class="m-btn red-stripe big" style="width:100%; height: 80px;">Hall Reservations <i class="m-icon-big-swapright m-icon-black"></i></a>
                                </div>
                                <div style="margin-top: 20px;">
                                    <a href="../room_reservations/room-reservations.php" class="m-btn red-stripe big" style="width:100%; height: 80px;">Room Reservations <i class="m-icon-big-swapright m-icon-black"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
            </div> 
        <?php } ?>

        <div id="footer">
            <?php include '../../common/footer.php'; ?> 
        </div>   
        <?php include '../../common/common_modals.php'; ?>
    </body>
</html>
