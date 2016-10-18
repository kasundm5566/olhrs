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
        <title>Hall Reservations</title>        
        <link rel="stylesheet" type="text/css" 
              href="../../bootstrap-3.3.7/css/bootstrap.min_1.css" />
        <link rel="stylesheet" type="text/css" href="../../css/styles.css" />
        <link rel="stylesheet" type="text/css" href="../../css/pace-theme-center-simple.css" />
        <link rel="stylesheet" type="text/css" href="../../css/bootstrap-datepicker3.css"/>
        <script type="text/javascript" src="../../js/jquery-1.12.2.min.js">
        </script>       
        <script type="text/javascript" src="../../bootstrap-3.3.7/js/bootstrap.min.js">
        </script>
        <script type="text/javascript" src="../../js/bootstrap-datepicker.min.js"></script>
        <script type="text/javascript" src="../../js/datepicker.js"></script>
        <script type="text/javascript" src="../../js/pace.js">
        </script>
        <script type="text/javascript" src="../../js/common.js">
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

        <div class="center-div">
            <div class="section">          
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <img class="icons" src="../../images/icons/hall-res.png">
                        <h3 class="header-panel">Hall Reservations</h3>
                    </div>
                    <div class="panel-body">
                        <div class="container" style="width: 800px; height: 300px;">
                            <div class="row">
                                <div class="col-md-1"></div>
                                <div class="col-md-5" style="padding-top: 20px;">
                                    <form method="POST" action="">

                                        <strong>Date</strong>
                                        <div class="input-group" style="width: 220px;">
                                            <input type="text" class="form-control" id="hall-date" name="hall-date"
                                                   placeholder="Select a date" readonly/>
                                        </div>

                                        <div style="margin-top: 20px;">     
                                            <strong>Session</strong>
                                            <div class="form-group" style="width: 220px;">
                                                <select class="form-control" id="sel1" name="session-dropdown">
                                                    <option value="Morning">Morning</option>
                                                    <option value="Evening">Evening</option>
                                                    <option value="Full day">Full day</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div style="margin-top: 30px; text-align: center;">
                                            <input type="submit" class="btn btn-success" id="btn-checkHallAvailability" value="Check availability">
                                        </div>
                                    </form>
                                </div>
                                <div class="col-md-5">
                                    <strong>Available halls</strong>
                                </div>
                                <div class="col-md-1"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
        </div> 

        <?php include './modals.php'; ?>
        <?php include '../../common/common_modals.php'; ?>

        <div id="footer">
            <?php include '../../common/footer.php'; ?> 
        </div>

    </body>
</html>
