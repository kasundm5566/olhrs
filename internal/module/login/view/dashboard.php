<html>
    <head>
        <title>Hotel Reservation System-Dashboard</title>
        <link rel="icon" href="../../../images/bi.png" />
        <link rel="stylesheet" type="text/css" href="../../../css/dashboard.css" /> 
        <link rel="stylesheet" type="text/css" href="../../../css/mainlayout.css" />
        <link rel="stylesheet" type="text/css" 
              href="../../../bootstrap/css/bootstrap.min.css" />
        <script type="text/javascript" src="../../../js/jquery-1.10.2.min.js">
        </script>
        <script type="text/javascript" src="../../../bootstrap/js/bootstrap.min.js">
        </script>
        <script type="text/javascript" src="../../../js/dashboard.js">
        </script>
    </head>
    <body>

        <div id="header">
            <?php include '../../../common/header.php'; ?>      

        </div>

        <div id="navi">
            <?php include '../../../common/navi.php'; ?>
            &nbsp;
        </div>

        <div id="contents">

            <div>
                <ol class="breadcrumb">
                    <li class="active">Dashboard</li>                        
                </ol>
            </div>

            <center>
                <div id="box">
                    <div class="container dynamicTile" id="tile-block">
                        <div class="row">
                            <div class="col-sm-4 col-xs-8">
                                <a href="">
                                    <div id="tile7" class="tile">
                                        <div class="carousel slide" data-ride="carousel">
                                            <!-- Wrapper for slides -->
                                            <div class="carousel-inner">
                                                <div class="item active">
                                                    <img src="http://www.prepbootstrap.com/Content/images/template/metrotiles/1.png" class="img-responsive"/>
                                                    <h1 class="tilecaption">Reservations</h1>
                                                </div>
                                                <div class="item">
                                                    <img src="http://www.prepbootstrap.com/Content/images/template/metrotiles/2.jpg" class="img-responsive" />
                                                    <h1 class="tilecaption">New reservations</h1>
                                                </div>
                                                <div class="item">
                                                    <img src="http://www.prepbootstrap.com/Content/images/template/metrotiles/3.png" class="img-responsive" />
                                                    <h1 class="tilecaption">upcoming reservations</h1>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-sm-2 col-xs-4">
                                <div id="tile8" class="tile">
                                    <div class="carousel slide" data-ride="carousel">
                                        <!-- Wrapper for slides -->
                                        <div class="carousel-inner">                                            
                                            <div class="item active text-center">
                                                <img src="../../../images/events.jpg" style="height: 100%;"/>
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
                            </div>
                            <div class="col-sm-2 col-xs-4">
                                <div id="tile9" class="tile">
                                    <div class="carousel slide" data-ride="carousel">
                                        <!-- Wrapper for slides -->
                                        <div class="carousel-inner">
                                            <div class="item active text-center">
                                                <div class="item active text-center">
                                                    <img src="../../../images/payments.jpg" style="height: 100%;"/>
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
                            </div>
                            <div class="col-sm-4 col-xs-8">
                                <div id="tile9" class="tile">
                                    <div class="carousel slide" data-ride="carousel">
                                        <!-- Wrapper for slides -->
                                        <div class="carousel-inner">
                                            <div class="item active">
                                                <img src="../../../images/reports.jpg" class="img-responsive"/>
                                                <h1 class="tilecaption">Reports</h1>
                                            </div>
                                            <div class="item">
                                                <img src="../../../images/reports2.jpg" class="img-responsive" />
                                                <h1 class="tilecaption">Generate reports</h1>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row ">                       
                            <div class="col-sm-4 col-xs-8">
                                <div id="tile3" class="tile">
                                    <div class="carousel slide" data-ride="carousel">
                                        <!-- Wrapper for slides -->
                                        <div class="carousel-inner">
                                            <div class="item active">
                                                <img src="../../../images/customer.jpg" class="img-responsive"/>
                                                <h1 class="tilecaption">Manage Customers</h1>
                                            </div>
                                            <div class="item">
                                                <img src="../../../images/customer2.jpg" class="img-responsive" />
                                                <h1 class="tilecaption">Registered customers</h1>
                                            </div>
                                            <div class="item">
                                                <img src="../../../images/customer3.jpg" class="img-responsive" />
                                                <h1 class="tilecaption">Recently registered</h1>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-2 col-xs-4">
                                <div id="tile1" class="tile">
                                    <div class="carousel slide" data-ride="carousel">
                                        <!-- Wrapper for slides -->
                                        <div class="carousel-inner">
                                            <div class="item active text-center">
                                                <div class="item active text-center">
                                                    <img src="../../../images/users.jpg" style="height: 100%;"/>
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
                                                    2
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-2 col-xs-4">
                                <div id="tile4" class="tile">
                                    <div class="carousel slide" data-ride="carousel">
                                        <!-- Wrapper for slides -->
                                        <div class="carousel-inner">
                                            <div class="item active text-center">
                                                <div class="item active text-center">
                                                    <img src="../../../images/content.jpg" style="height: 100%;"/>
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
                            </div>
                            <div class="col-sm-4 col-xs-8">
                                <div id="tile10" class="tile">
                                    <div class="carousel slide" data-ride="carousel">
                                        <!-- Wrapper for slides -->
                                        <div class="carousel-inner">
                                            <div class="item active">
                                                <img src="../../../images/feedback.jpg" class="img-responsive"/>
                                                <h1 class="tilecaption">Feedbacks</h1>
                                            </div>
                                            <div class="item">
                                                <img src="../../../images/feedback2.jpg" class="img-responsive" />
                                                <h1 class="tilecaption">Latest feedbacks</h1>
                                            </div>
                                            <div class="item">
                                                <img src="../../../images/feedback3.jpg" class="img-responsive" />
                                                <h1 class="tilecaption">Total feedbacks</h1>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </center>
    </body>
</html>

<?php

