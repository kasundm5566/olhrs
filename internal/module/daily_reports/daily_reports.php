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
        <title>Daily Reports</title>
        <link rel="stylesheet" type="text/css" href="../../css/styles.css" />
        <link rel="stylesheet" type="text/css" href="../../css/bootstrap-datepicker3.css" />
        <link rel="stylesheet" type="text/css" 
              href="../../bootstrap-3.3.7/css/bootstrap.min_1.css" />
        <script type="text/javascript" src="../../js/jquery-1.12.2.min.js">
        </script><script type="text/javascript" src="../../bootstrap-3.3.7/js/bootstrap.min.js">
        </script>
        <script type="text/javascript" src="../../js/bootstrap-datepicker.min.js">
        </script>
        <script type="text/javascript" src="../../js/datepicker.js">
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
                            <?php include './reports_navbar.php'; ?>
                        </div>

                        <div id="all-halls" class="tab-pane fade in active">
                            <form id="kingshall-form">
                                <strong>Date</strong>
                                        <div class="input-group" style="width: 220px;">
                                            <input type="text" class="form-control" id="hall-date" name="hall-date"
                                                   placeholder="Select a date" readonly/>
                                        </div>
                            </form>
                            <div id="kings-hall-reportMonthly"></div>
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
    </body>
</html>