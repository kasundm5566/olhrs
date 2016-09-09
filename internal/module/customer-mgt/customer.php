<html>
    <head>
        <title>Customer Management</title>        
        <link rel="stylesheet" type="text/css" 
              href="../../bootstrap-3.3.7/css/bootstrap.min_1.css" />
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.10.1/bootstrap-table.min.css"/>
        <link rel="stylesheet" type="text/css" href="../../css/styles.css" />
        <script type="text/javascript" src="../../bootstrap-3.3.7/js/bootstrap.min.js">
        </script>
        <script type="text/javascript" src="../../js/jquery-1.10.2.min.js">
        </script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.10.1/bootstrap-table.min.js"></script>
        <script src="../../js/bootstrap-table.js"></script>
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
                <!--                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <img class="icons" src="../../images/icons/customer.png">
                                        <h3 class="header-panel">&nbsp;Customer Management</h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="container" style="min-width: 800px;">
                                            <table id="table-javascript"></table>
                                        </div>
                                    </div>
                                </div>-->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <img class="icons" src="../../images/icons/customer.png">
                        <h3 class="header-panel">&nbsp;Customer Management</h3>
                    </div>
                    <div class="panel-body">
                        <div class="container" style="min-width: 800px;">
                            <div class="row">
                                <div class="col-md-2">
                                    <ul class="nav nav-pills nav-stacked">
                                        <li class="active"><a href="#">Home</a></li>
                                        <li><a href="#">Menu 1</a></li>
                                        <li><a href="#">Menu 2</a></li>
                                        <li><a href="#">Menu 3</a></li>
                                    </ul>
                                </div>
                                <div class="col-md-10">
                                    <table id="table-javascript"></table>
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
