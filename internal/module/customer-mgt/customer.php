<html>
    <head>
        <title>Customer Management</title>        
        <link rel="stylesheet" type="text/css" 
              href="../../bootstrap-3.3.7/css/bootstrap.min_1.css" />
        <link rel="stylesheet" href="../../css/bootstrap-table.min.css"/>
        <link rel="stylesheet" type="text/css" href="../../css/styles.css" />
        <script type="text/javascript" src="../../js/jquery-1.10.2.min.js">
        </script>       
        <script type="text/javascript" src="../../bootstrap-3.3.7/js/bootstrap.min.js">
        </script>        
        <script src="../../js/bootstrap-table.min.js"></script>
        <script src="../../js/customer-management.js"></script>
        <script src="../../js/validations/signup-validate.js"></script>
        <script src="../../js/simple-bootstrap-paginator.js"></script>
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
                        <img class="icons" src="../../images/icons/customer.png">
                        <h3 class="header-panel">&nbsp;Customer Management</h3>
                    </div>
                    <div class="panel-body">
                        <div class="container" style="min-width: 800px;">
                            <div class="pull-left">
                                <button class="btn btn-success btn-sm" id="btn-addcustomer"><i class="glyphicon glyphicon-plus-sign"></i> Add new customer</button>
                            </div>
                            <div class="input-group pull-right" style="margin-bottom: 5px;">
                                <div class="input-group">
                                    <input type="text" id="txtSearch" class="search form-control"
                                           placeholder="Search customer">

                                    <div class="input-group-btn">
                                        <button class="btn btn-default" id="btnSearchCustomers" type="submit"><i class="glyphicon glyphicon-search"></i>
                                        </button>
                                        <button class="btn btn-default" id="btnRefreshCustomers" type="submit"><i class="glyphicon glyphicon-refresh"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div><table id="table-customers"></table></div>
                            <div id="pagination" class="text-right"></div>

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
