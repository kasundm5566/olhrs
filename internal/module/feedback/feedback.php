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
        <title>Feedback Management</title>        
        <link rel="stylesheet" type="text/css" 
              href="../../bootstrap-3.3.7/css/bootstrap.min_1.css" />
        <link rel="stylesheet" href="../../css/bootstrap-table.min.css"/>
        <link rel="stylesheet" type="text/css" href="../../css/styles.css" />
        <link rel="stylesheet" type="text/css" href="../../css/pace-theme-center-simple.css" /> 
        <script type="text/javascript" src="../../js/jquery-1.12.2.min.js">
        </script>       
        <script type="text/javascript" src="../../bootstrap-3.3.7/js/bootstrap.min.js">
        </script>        
        <script src="../../js/bootstrap-table.min.js"></script>
        <script src="../../js/simple-bootstrap-paginator.js"></script>
        <script src="../../js/bootstrap3-typeahead.min.js"></script>
        <script type="text/javascript" src="../../js/pace.js">
        </script>
        <script type="text/javascript" src="../../js/common.js">
        </script>
        <script type="text/javascript" src="../../js/feedback.js">
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
                        <img class="icons" src="../../images/icons/feedback.png">
                        <h3 class="header-panel">&nbsp;Feedbacks</h3>
                    </div>
                    <div class="panel-body">
                        <div class="container" style="min-width: 800px;">
                            <div><table id="table-feedbacks"></table></div>
                            <div class="input-group pull-right" style="margin-top:21px; margin-left:5px;">
                                <label class="pagiTexts" style="display: inline;">Go to page: </label>
                                <select id="comboPages" style="height: 32px; border-radius:4px; background-color: transparent;">
                                </select>
                                &nbsp;&nbsp;
                                <label class="pagiTexts" style="display: inline;">Records per page: </label>
                                <select id="comboRecCount" style="height: 32px; border-radius:4px; background-color: transparent;">
                                    <option value="10" selected>10</option>
                                    <option value="20">20</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                    <option value="1000">1000</option>
                                </select>
                            </div>
                            <div id="pagination" class="text-right"></div>
                        </div>
                    </div>
                </div>
            </div> 
        </div> 

        <?php include '../../common/common_modals.php'; ?>
        <div id="footer">
            <?php include '../../common/footer.php'; ?> 
        </div>

    </body>
</html>
