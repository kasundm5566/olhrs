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
        <title>Hall Reservations</title>        
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
        <script type="text/javascript" src="../../js/hall-reservations.js">
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
                        <img class="icons" src="../../images/icons/hall-res.png">
                        <h3 class="header-panel">&nbsp;Hall Reservations</h3>
                    </div>
                    <div class="panel-body">
                        <div class="container" style="min-width: 800px;">
                            <div class="input-group pull-right" style="margin-bottom: 5px;">
                                <div class="input-group">
                                    <select class="form-control" id="sel-search-reserv" style="height: 33px; font-size:12px;">
                                        <option value="select-year" selected="true">Select year</option>
                                        <?php
                                        $currentYear = date("Y") + 2;
                                        for ($i = 0; $i <= 4; $i++) {
                                            ?>
                                            <option value="<?php echo $currentYear - $i; ?>">
                                                <?php echo $currentYear - $i; ?>
                                            </option>
                                        <?php }
                                        ?>
                                    </select>

                                    <div class="input-group-btn">
                                        <button class="btn btn-default" id="btnSearchReservs" type="submit"><i class="glyphicon glyphicon-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div><table id="table-hall-reservations"></table></div>
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
                            <div id="pagination2" class="text-right"></div>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <div style="text-align: right;">
                            <a href="../reservations/reservations-home.php" class="btn btn-primary btn-xs">Reservations home</a>
                        </div>
                    </div>
                </div>
            </div> 
        </div>

        <?php include '../../common/common_modals.php'; ?>
        <?php include './modal.php'; ?>
        <div id="footer">
            <?php include '../../common/footer.php'; ?> 
        </div>

    </body>
</html>
