<?php
if (!isset($_SESSION)) {
    session_start();
}
if ($_SESSION['username'] == "") {
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
        <script type="text/javascript" src="../../js/jquery-1.10.2.min.js">
        </script>
        <script type="text/javascript" src="../../js/dashboard.js">
        </script>
        <script type="text/javascript" src="../../bootstrap-3.3.7/js/bootstrap.min.js">
        </script>
        <script type="text/javascript" src="../../js/pace.js">
        </script>
    </head>
    <body>

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


        <!--            <div>
                        <ol class="breadcrumb">
                            <li class="active">Dashboard</li>                        
                        </ol>
                    </div>-->

        <div class="center-div">
            <div class="section">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <img class="icons" src="../../images/icons/home.png">
                        <h3 class="header-panel">&nbsp;Dashboard</h3>
                    </div>
                    <div class="panel-body">
                        <div class="container dynamicTile" id="tile-block">
                            <div class="row">
                                <div class="col-sm-4 col-xs-8">
                                    <a href="../booking/booking.php" data-toggle="tooltip" data-placement="bottom" title="Manage reservations related things.">
                                        <!-- Reservation tile -->
                                        <div id="tile7" class="tile">
                                            <div class="carousel slide" data-ride="carousel">
                                                <div class="carousel-inner">
                                                    <div class="item active">
                                                        <img src="http://www.prepbootstrap.com/Content/images/template/metrotiles/1.png" class="img-responsive"/>
                                                        <h1 class="tilecaption">Reservations</h1>
                                                    </div>
                                                    <div class="item">
                                                        <img src="http://www.prepbootstrap.com/Content/images/template/metrotiles/2.jpg" class="img-responsive" />
                                                        <h1 class="tilecaption">New reservations: <label id="lblNewReservations"></label></h1>
                                                    </div>
                                                    <div class="item">
                                                        <img src="http://www.prepbootstrap.com/Content/images/template/metrotiles/3.png" class="img-responsive" />
                                                        <h1 class="tilecaption">Upcoming reservations: <label id="lblUpcomingReservations"></label></h1>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-sm-2 col-xs-4">
                                    <a href="" data-toggle="tooltip" data-placement="bottom" title="Manage events related things.">
                                        <!-- Events tile -->
                                        <div id="tile8" class="tile">
                                            <div class="carousel slide" data-ride="carousel">
                                                <div class="carousel-inner">                                            
                                                    <div class="item active text-center">
                                                        <img src="../../images/tiles/events.jpg" style="height: 100%;"/>
                                                        <h1 class="tilecaption">Events</h1>
                                                    </div>
                                                    <div class="item text-center">
                                                        <div>
                                                            <span class="fa fa-spinner bigicon"></span>
                                                        </div>
                                                        <div class="icontext">
                                                            Upcoming event
                                                        </div>
                                                        <div class="icontext">
                                                            2015 June 20-Get-together
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a> 
                                </div>
                                <div class="col-sm-2 col-xs-4">
                                    <a href="" data-toggle="tooltip" data-placement="bottom" title="Manage payments related things.">    
                                        <!-- Payments tile -->
                                        <div id="tile9" class="tile">
                                            <div class="carousel slide" data-ride="carousel">
                                                <div class="carousel-inner">
                                                    <div class="item active text-center">
                                                        <div class="item active text-center">
                                                            <img src="../../images/tiles/payments.jpg" style="height: 100%;"/>
                                                            <h1 class="tilecaption">Payments</h1>
                                                        </div>
                                                    </div>
                                                    <div class="item text-center">
                                                        <div>
                                                            <span class="fa fa-book bigicon"></span>
                                                        </div>
                                                        <div class="icontext">
                                                            Recent payments
                                                        </div>
                                                        <div class="icontext">
                                                            20000
                                                        </div>
                                                    </div>                              
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-sm-4 col-xs-8">
                                    <a href="" data-toggle="tooltip" data-placement="bottom" title="Generate reports from here.">    
                                        <!-- Reports tile -->
                                        <div id="tile9" class="tile">
                                            <div class="carousel slide" data-ride="carousel">
                                                <div class="carousel-inner">
                                                    <div class="item active">
                                                        <img src="../../images/tiles/reports.jpg" class="img-responsive"/>
                                                        <h1 class="tilecaption">Reports</h1>
                                                    </div>
                                                    <div class="item">
                                                        <img src="../../images/tiles/reports2.jpg" class="img-responsive" />
                                                        <h1 class="tilecaption">Generate reports</h1>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="row ">                       
                                <div class="col-sm-4 col-xs-8">
                                    <a href="../customer-mgt/customer.php" data-toggle="tooltip" data-placement="bottom" title="Manage customer related things.">    
                                        <!-- Customer tile -->
                                        <div id="tile3" class="tile">
                                            <div class="carousel slide" data-ride="carousel">
                                                <div class="carousel-inner">
                                                    <div class="item active">
                                                        <img src="../../images/tiles/customer.jpg" class="img-responsive"/>
                                                        <h1 class="tilecaption">Manage Customers</h1>
                                                    </div>
                                                    <div class="item">
                                                        <img src="../../images/tiles/customer2.jpg" class="img-responsive" />
                                                        <h1 class="tilecaption">Registered customers</h1>
                                                    </div>
                                                    <div class="item">
                                                        <img src="../../images/tiles/customer3.jpg" class="img-responsive" />
                                                        <h1 class="tilecaption">Recently registered</h1>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>

                                <div class="col-sm-2 col-xs-4">
                                    <a href="" data-toggle="tooltip" data-placement="bottom" title="Manage staff related things.">    
                                        <!-- User tile -->
                                        <div id="tile1" class="tile">
                                            <div class="carousel slide" data-ride="carousel">
                                                <div class="carousel-inner">
                                                    <div class="item active text-center">
                                                        <div class="item active text-center">
                                                            <img src="../../images/tiles/users.jpg" style="height: 100%;"/>
                                                            <h1 class="tilecaption">Users</h1>
                                                        </div>
                                                    </div>
                                                    <div class="item text-center">
                                                        <div>
                                                            <span class="fa fa-bank bigicon"></span>
                                                        </div>
                                                        <div class="icontext">
                                                            User count
                                                        </div>
                                                        <div class="icontext">
                                                            <label id="lblUserCount"></label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>

                                <div class="col-sm-2 col-xs-4">
                                    <a href="" data-toggle="tooltip" data-placement="bottom" title="Manage system contents.">    
                                        <!-- Content tile -->
                                        <div id="tile4" class="tile">
                                            <div class="carousel slide" data-ride="carousel">                                        
                                                <div class="carousel-inner">
                                                    <div class="item active text-center">
                                                        <div class="item active text-center">
                                                            <img src="../../images/tiles/content.jpg" style="height: 100%;"/>
                                                            <h1 class="tilecaption">Content</h1>
                                                        </div>
                                                    </div>
                                                    <div class="item text-center">
                                                        <div>
                                                            <span class="fa fa-cab bigicon"></span>
                                                        </div>
                                                        <div class="icontext">
                                                            Cab
                                                        </div>
                                                        <div class="icontext">
                                                            <span class="fa fa-close"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-sm-4 col-xs-8">
                                    <a href="" data-toggle="tooltip" data-placement="bottom" title="Manage customer feedbacks.">    
                                        <!-- Feedback tile -->
                                        <div id="tile10" class="tile">
                                            <div class="carousel slide" data-ride="carousel">
                                                <div class="carousel-inner">
                                                    <div class="item active">
                                                        <img src="../../images/tiles/feedback.jpg" class="img-responsive"/>
                                                        <h1 class="tilecaption">Feedbacks</h1>
                                                    </div>
                                                    <div class="item">
                                                        <img src="../../images/tiles/feedback2.jpg" class="img-responsive" />
                                                        <h1 class="tilecaption">Latest feedbacks</h1>
                                                    </div>
                                                    <div class="item">
                                                        <img src="../../images/tiles/feedback3.jpg" class="img-responsive" />
                                                        <h1 class="tilecaption">Total feedbacks</h1>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>

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
<?php

