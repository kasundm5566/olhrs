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
        <title>Reports</title>
        <link rel="stylesheet" type="text/css" href="../../css/styles.css" />
        <link rel="stylesheet" type="text/css" 
              href="../../bootstrap-3.3.7/css/bootstrap.min_1.css" />
        <script type="text/javascript" src="../../js/jquery-1.12.2.min.js">
        </script><script type="text/javascript" src="../../bootstrap-3.3.7/js/bootstrap.min.js">
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
                        <img class="icons" src="../../images/icons/reservation.png">
                        <h3 class="header-panel">&nbsp;Reservations</h3>
                    </div>
                    <div class="panel-body">
                        <div class="container" style="width: 600px;">
                            <div>
                                <a href="../hall_reservations/hall-reservations.php" class="btn btn-success" style="width:100%;">Hall Reservations</a>
                            </div>
                            <div style="margin-top: 20px;">
                                <a href="../room_reservations/room-reservations.php" class="btn btn-success" style="width:100%;">Room Reservations</a>
                            </div>
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
