<?php
if (!isset($_SESSION)) {
    session_start();
}
if ($_SESSION['username'] == "" || $_SESSION['group'] == "Receptionist") {
    header("Location:../login/index.php");
    exit;
}
?>

<html>
    <head>
        <title>Daily Reports</title>
        <link rel="stylesheet" type="text/css" href="../../css/styles.css" />
        <link rel="stylesheet" type="text/css" href="../../css/report-daily-table.css" />
        <link rel="stylesheet" type="text/css" href="../../css/bootstrap-datepicker3.css" />
        <link rel="stylesheet" type="text/css" 
              href="../../bootstrap-3.3.7/css/bootstrap.min_1.css" />
        <script type="text/javascript" src="../../js/jquery-1.12.2.min.js">
        </script><script type="text/javascript" src="../../bootstrap-3.3.7/js/bootstrap.min.js">
        </script>
        <script type="text/javascript" src="../../js/bootstrap-datepicker.min.js">
        </script>
        <script type="text/javascript" src="../../js/common.js">
        </script>
        <script type="text/javascript" src="../../js/datepicker.js">
        </script>
        <script type="text/javascript" src="../../js/reports/daily-reports.js">
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
                        <img class="icons" src="../../images/icons/reports_panel.png">
                        <h3 class="header-panel">&nbsp;Daily Reports</h3>
                    </div>
                    <div class="panel-body">
                        <div class="container" style="width: 800px; height: 400px;">
                            <div style="float: left;">
                                <?php include './reports_navbar.php'; ?>
                            </div>
                            <div class="tab-content">
                                <div id="all-halls" class="tab-pane fade in active">
                                    <form id="allhall-form">
                                        <div class="row" style="float: right;">
                                            <div class="col-md-1" style="display: inline-block; padding-left: 20px;">
                                                <label>Date:</label>
                                            </div>
                                            <div class="form-group col-md-8 form-group-sm" style="display: inline-block;">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="hall-date" name="date"
                                                           placeholder="Select a date" readonly/>
                                                </div>
                                            </div>
                                            <div class="col-md-2" style="display: inline-block;">
                                                <input type="button" class="btn btn-success btn-sm" id="all-hall-submitDaily" value="Generate">
                                            </div>
                                        </div>
                                    </form>
                                    <div id="all-hall-reportDaily"></div>
                                </div> 
                                <div id="all-rooms" class="tab-pane fade">
                                    <form id="allroom-form">
                                        <div class="row" style="float: right;">
                                            <div class="col-md-1" style="display: inline-block; padding-left: 20px;">
                                                <label>Date:</label>
                                            </div>
                                            <div class="form-group col-md-8 form-group-sm" style="display: inline-block;">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="hall-date" name="date"
                                                           placeholder="Select a date" readonly/>
                                                </div>
                                            </div>
                                            <div class="col-md-2" style="display: inline-block;">
                                                <input type="button" class="btn btn-success btn-sm" id="all-rooms-submitDaily" value="Generate">
                                            </div>
                                        </div>
                                    </form>
                                    <div id="all-rooms-reportDaily"></div>
                                </div> 
                                <div id="payment" class="tab-pane fade">
                                    <form id="payment-form">
                                        <div class="row" style="float: right;">
                                            <div class="col-md-1" style="display: inline-block; padding-left: 20px;">
                                                <label>Date:</label>
                                            </div>
                                            <div class="form-group col-md-8 form-group-sm" style="display: inline-block;">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="hall-date" name="date"
                                                           placeholder="Select a date" readonly/>
                                                </div>
                                            </div>
                                            <div class="col-md-2" style="display: inline-block;">
                                                <input type="button" class="btn btn-success btn-sm" id="payment-submitDaily" value="Generate">
                                            </div>
                                        </div>
                                    </form>
                                    <div id="payment-reportDaily"></div>
                                </div> 
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <div style="text-align: right;">
                            <a href="../reports/reports.php" class="btn btn-primary btn-xs">Reports home</a>
                        </div>
                    </div>
                </div>
            </div> 
        </div> 

        <div id="footer">
            <?php include '../../common/footer.php'; ?> 
        </div>
        <?php include '../../common/common_modals.php'; ?>
    </body>
</html>