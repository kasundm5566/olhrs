<?php
if (!isset($_SESSION)) {
    session_start();
}
if ($_SESSION['username'] == "" || $_SESSION['group'] == "") {
    header("Location:index.php");
    exit;
}
?>

<html>
    <head>
        <title>Dashboard-Hotel Reservation System</title>
        <link rel="icon" href="../../images/bi.png" />
        <link rel="stylesheet" type="text/css" href="../../css/dashboard.css" /> 
        <link rel="stylesheet" type="text/css" href="../../css/styles.css" />
        <link rel="stylesheet" type="text/css" 
              href="../../bootstrap-3.3.7/css/bootstrap.min_1.css" />
        <link rel="stylesheet" type="text/css" href="../../css/pace-theme-center-simple.css" />
        <script type="text/javascript" src="../../js/jquery-1.12.2.min.js">
        </script>
        <script type="text/javascript" src="../../js/dashboard.js">
        </script>
        <script type="text/javascript" src="../../bootstrap-3.3.7/js/bootstrap.min.js">
        </script>
        <script type="text/javascript" src="../../js/pace.js">
        </script>
        <script type="text/javascript" src="../../js/common.js">
        </script>
        <script type="text/javascript" src="../../js/hover.zoom.js">
        </script>
    </head>
    <body>

        <!-- Page refreshes every 60 seconds -->
        <?php
        header("Refresh:60");
        ?>

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
                        <img class="icons" src="../../images/icons/home.png">
                        <h3 class="header-panel">&nbsp;Home</h3>
                    </div>
                    <div class="panel-body">
                        <?php
                        if ($_SESSION['group'] == "Admin" || $_SESSION['group'] == "Manager") {
                            include './admin_manager_home.php';
                        } else if ($_SESSION['group'] == "Receptionist") {
                            include './receptionist_home.php';
                        }
                        ?>
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
<?php

