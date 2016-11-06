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
        <title>Payments</title>        
        <link rel="stylesheet" type="text/css" 
              href="../../bootstrap-3.3.7/css/bootstrap.min_1.css" />
        <link rel="stylesheet" href="../../css/bootstrap-table.min.css"/>
        <link rel="stylesheet" href="../../css/bootstrap-datepicker3.css"/>
        <link rel="stylesheet" type="text/css" href="../../css/styles.css" />
        <link rel="stylesheet" type="text/css" href="../../css/pace-theme-center-simple.css" /> 
        <script type="text/javascript" src="../../js/jquery-1.12.2.min.js">
        </script>       
        <script type="text/javascript" src="../../bootstrap-3.3.7/js/bootstrap.min.js">
        </script>        
        <script src="../../js/bootstrap-table.min.js"></script>
        <script src="../../js/simple-bootstrap-paginator.js"></script>
        <script src="../../js/bootstrap3-typeahead.min.js"></script>
        <script src="../../js/bootstrap-datepicker.min.js"></script>
        <script src="../../js/datepicker.js"></script>
        <script type="text/javascript" src="../../js/pace.js">
        </script>
        <script type="text/javascript" src="../../js/common.js">
        </script>
        <script type="text/javascript" src="../../js/payment.js">
        </script>
        <script type="text/javascript" src="../../js/validations/reservation-rec.js">
        </script>
        <script type="text/javascript" src="../../js/validations/payment-rec.js">
        </script>
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
                            <img class="icons" src="../../images/icons/payment.png">
                            <h3 class="header-panel">&nbsp;Payments</h3>
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
                                <div id="check-hall-balance">
                                    <h4>Check balance of a hall reservation</h4>
                                    <div class="row">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-4">
                                            <form>
                                                <div>
                                                    <label>Date:</label>
                                                    <label style="color: red;" class="lbl-errors" id="hall-reserv-date-error"></label>
                                                    <input type="text" class="form-control" id="hall-date" name="hall-date"
                                                           placeholder="Select a date" readonly/>
                                                </div>
                                                <div class="form-group" style="margin-top: 10px;">
                                                    <label>Hall:</label>
                                                    <select class="form-control" name="sel-hall" id="sel-hall">
                                                        <option value="Kings Hall">Kings Hall</option>
                                                        <option value="Queens Hall A">Queens Hall A</option>
                                                        <option value="Queens Hall B">Queens Hall B</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Session:</label>
                                                    <select class="form-control" name="sel-session" id="sel-session">
                                                        <option value="Morning">Morning</option>
                                                        <option value="Evening">Evening</option>
                                                        <option value="Full day">Full day</option>
                                                    </select>
                                                </div>
                                                <div style="padding-top: 15px; float: right;">
                                                    <button class="btn btn-success" id="btn-check-hallBalance">Check balance</button>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="col-md-1"></div>
                                        <div class="col-md-5" id="div-hall-payment-balance">

                                        </div>
                                        <div class="col-md-1"></div>
                                    </div>
                                </div>
                                <div id="check-room-balance">
                                    <h4>Check balance of a room reservation</h4>
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
                                                <div class="form-group">
                                                    <label>Session:</label>
                                                    <select class="form-control" name="sel-room-type" id="sel-room-type">
                                                        <option value="Single">Single Room</option>
                                                        <option value="Double">Double Room</option>
                                                        <option value="Family">Family Room</option>
                                                        <option value="Cottage">Cottage</option>
                                                    </select>
                                                </div>
                                                <div style="padding-top: 15px; float: right;">
                                                    <button type="submit" class="btn btn-success" id="btn-check-roomBalance">Check balance</button>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="col-md-1"></div>
                                        <div class="col-md-5" id="div-room-payment-balance">

                                        </div>
                                        <div class="col-md-1"></div>
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
                                <img class="icons" src="../../images/icons/payment.png">
                                <h3 class="header-panel">&nbsp;Payments</h3>
                            </div>
                            <div class="panel-body">
                                <div class="container" style="min-width: 800px;">
                                    <div><table id="table-payments"></table></div>
                                    <div class="input-group pull-right" style="margin-top:21px; margin-left:5px;">
                                        <label class="pagiTexts" style="display: inline;">Go to page: </label>
                                        <select id="comboPages" style="height: 32px; border-radius:4px; background-color: transparent;">
                                        </select>
                                        &nbsp;&nbsp;
                                        <label class="pagiTexts" style="display: inline;">Records per page: </label>
                                        <select id="comboRecCount" style="height: 32px; border-radius:4px; background-color: transparent;">
                                            <option value="10" selected>10</option>
                                            <option value="20">20</option>
                                            <option value="50">50</option>
                                            <option value="100">100</option>
                                            <option value="1000">1000</option>
                                        </select>
                                    </div>
                                    <div id="pagination" class="text-right"></div>
                                </div>
                            </div>
                        </div>
                    </div> 
                </div>
            <?php } ?>        

            <?php include '../../common/common_modals.php'; ?>
            <div id="footer">
                <?php include '../../common/footer.php'; ?> 
            </div>

    </body>
</html>
