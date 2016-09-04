<html>
    <head>
        <title>Booking Management</title>
        <link rel="stylesheet" type="text/css" href="../../css/styles.css" />
        <link rel="stylesheet" type="text/css" 
              href="../../bootstrap-3.3.7/css/bootstrap.min_1.css" />
        <script type="text/javascript" src="../../bootstrap-3.3.7/js/bootstrap.min.js">
        </script>
        <script type="text/javascript" src="../../js/jquery-1.10.2.min.js">
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
                        <div class="container" style="width: 800px;">
                            <div class="col-md-8">
                                <div>
                                    <button class="btn btn-success" style="width:100%;">Add new booking</button>
                                </div>
                                <div style="margin-top: 5px;">
                                    <button class="btn btn-success" style="width:100%;">View all bookings</button>
                                </div>
                                <div style="margin-top: 5px;">
                                    <button class="btn btn-success" style="width:100%;">Update booking</button>
                                </div>
                                <div style="margin-top: 5px;">
                                    <button class="btn btn-success" style="width:100%;">Cancel booking</button>
                                </div>
                            </div>
                            <div class="col-md-4">
                                sdf
                            </div>
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