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
        <title>Yearly Reports</title>
        <link rel="stylesheet" type="text/css" href="../../css/styles.css" />
        <link rel="stylesheet" type="text/css" href="../../css/report-table.css" />
        <link rel="stylesheet" type="text/css" 
              href="../../bootstrap-3.3.7/css/bootstrap.min_1.css" />
        <script type="text/javascript" src="../../js/jquery-1.12.2.min.js">
        </script><script type="text/javascript" src="../../bootstrap-3.3.7/js/bootstrap.min.js">
        </script>
        <script type="text/javascript" src="../../js/common.js">
        </script>
        <script type="text/javascript" src="../../js/reports/yearly-reports.js">
        </script>
        <script type="text/javascript" src="../../js/reports/fusioncharts/js/fusioncharts.js">
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
                        <h3 class="header-panel">&nbsp;Yearly Reports</h3>
                    </div>
                    <div class="panel-body">
                        <div class="container" style="width: 900px; height: 400px;">
                            <div style="float: left;">
                                <?php include './reports_navbar.php'; ?>
                            </div>
                            <div class="tab-content">
                                <div id="all-hall" class="tab-pane fade in active">                                    
                                    <form id="allhall-form">
                                        <div class="row" style="float: right;">
                                            <div class="col-md-2" style="display: inline-block; padding-left: 30px;">
                                                <label>Year:</label>
                                            </div>
                                            <div class="form-group col-md-5 form-group-sm" style="display: inline-block;">
                                                <select class="form-control" id="seli" name="year">
                                                    <?php
                                                    $currentYear = date("Y")+2;
                                                    for ($i = 0; $i <= 4; $i++) {
                                                        ?>
                                                        <option value="<?php echo $currentYear - $i; ?>">
                                                            <?php echo $currentYear - $i; ?>
                                                        </option>
                                                    <?php }
                                                    ?>
                                                </select>
                                            </div>  
                                            <div class="col-md-2" style="display: inline-block;">
                                                <input type="button" class="btn btn-success btn-sm" id="all-hall-submitYearly" value="Generate">
                                            </div>
                                        </div>                                       
                                    </form>
                                    
                                    <div id="all-hall-reportYearly"></div>
                                </div>   

                                <div id="kings-hall" class="tab-pane fade">
                                    <form id="kingshall-form">
                                        <div class="row" style="float: right;">
                                            <div class="col-md-1" style="display: inline-block; padding-left: 30px;">
                                                <label>Year:</label>
                                            </div>
                                            <div class="form-group col-md-5 form-group-sm" style="display: inline-block;">
                                                <select class="form-control" name="year">
                                                    <?php
                                                    $currentYear = date("Y")+2;
                                                    for ($i = 0; $i <= 4; $i++) {
                                                        ?>
                                                        <option value="<?php echo $currentYear - $i; ?>">
                                                            <?php echo $currentYear - $i; ?>
                                                        </option>
                                                    <?php }
                                                    ?>
                                                </select>
                                            </div>  
                                            <div class="col-md-2" style="display: inline-block;">
                                                <input type="button" class="btn btn-success btn-sm" id="kings-hall-submitYearly" value="Generate">
                                            </div>
                                        </div>                                       
                                    </form>
                                    <div id="kings-hall-reportYearly"></div>
                                </div> 

                                <div id="queena-hall" class="tab-pane fade">
                                    <form id="quennahall-form">
                                        <div class="row" style="float: right;">
                                            <div class="col-md-1" style="display: inline-block; padding-left: 30px;">
                                                <label>Year:</label>
                                            </div>
                                            <div class="form-group col-md-5 form-group-sm" style="display: inline-block;">
                                                <select class="form-control" name="year">
                                                    <?php
                                                    $currentYear = date("Y")+2;
                                                    for ($i = 0; $i <= 4; $i++) {
                                                        ?>
                                                        <option value="<?php echo $currentYear - $i; ?>">
                                                            <?php echo $currentYear - $i; ?>
                                                        </option>
                                                    <?php }
                                                    ?>
                                                </select>
                                            </div>  
                                            <div class="col-md-2" style="display: inline-block;">
                                                <input type="button" class="btn btn-success btn-sm" id="queena-hall-submitYearly" value="Generate">
                                            </div>
                                        </div>                                       
                                    </form>
                                    <div id="queena-hall-reportYearly"></div>
                                </div> 

                                <div id="queenb-hall" class="tab-pane fade">
                                    <form id="queenbhall-form">
                                        <div class="row" style="float: right;">
                                            <div class="col-md-1" style="display: inline-block; padding-left: 30px;">
                                                <label>Year:</label>
                                            </div>
                                            <div class="form-group col-md-5 form-group-sm" style="display: inline-block;">
                                                <select class="form-control" name="year">
                                                    <?php
                                                    $currentYear = date("Y")+2;
                                                    for ($i = 0; $i <= 4; $i++) {
                                                        ?>
                                                        <option value="<?php echo $currentYear - $i; ?>">
                                                            <?php echo $currentYear - $i; ?>
                                                        </option>
                                                    <?php }
                                                    ?>
                                                </select>
                                            </div>  
                                            <div class="col-md-2" style="display: inline-block;">
                                                <input type="button" class="btn btn-success btn-sm" id="queenb-hall-submitYearly" value="Generate">
                                            </div>
                                        </div>                                       
                                    </form>
                                    <div id="queenb-hall-reportYearly"></div>
                                </div>  

                                <div id="room-all" class="tab-pane fade"> 
                                    <form id="roomall-form">
                                        <div class="row" style="float: right;">
                                            <div class="col-md-1" style="display: inline-block; padding-left: 30px;">
                                                <label>Year:</label>
                                            </div>
                                            <div class="form-group col-md-5 form-group-sm" style="display: inline-block;">
                                                <select class="form-control" name="year">
                                                    <?php
                                                    $currentYear = date("Y")+2;
                                                    for ($i = 0; $i <= 4; $i++) {
                                                        ?>
                                                        <option value="<?php echo $currentYear - $i; ?>">
                                                            <?php echo $currentYear - $i; ?>
                                                        </option>
                                                    <?php }
                                                    ?>
                                                </select>
                                            </div>  
                                            <div class="col-md-2" style="display: inline-block;">
                                                <input type="button" class="btn btn-success btn-sm" id="room-all-submitYearly" value="Generate">
                                            </div>
                                        </div>                                       
                                    </form>
                                    <div id="room-all-reportYearly"></div>
                                </div> 

                                <div id="single-room" class="tab-pane fade">
                                    <form id="single-room-form">
                                        <div class="row" style="float: right;">
                                            <div class="col-md-1" style="display: inline-block; padding-left: 30px;">
                                                <label>Year:</label>
                                            </div>
                                            <div class="form-group col-md-5 form-group-sm" style="display: inline-block;">
                                                <select class="form-control" name="year">
                                                    <?php
                                                    $currentYear = date("Y")+2;
                                                    for ($i = 0; $i <= 4; $i++) {
                                                        ?>
                                                        <option value="<?php echo $currentYear - $i; ?>">
                                                            <?php echo $currentYear - $i; ?>
                                                        </option>
                                                    <?php }
                                                    ?>
                                                </select>
                                            </div>  
                                            <div class="col-md-2" style="display: inline-block;">
                                                <input type="button" class="btn btn-success btn-sm" id="single-room-submitYearly" value="Generate">
                                            </div>
                                        </div>                                       
                                    </form>
                                    <div id="single-room-reportYearly"></div>
                                </div>  

                                <div id="double-room" class="tab-pane fade">
                                    <form id="double-room-form">
                                        <div class="row" style="float: right;">
                                            <div class="col-md-1" style="display: inline-block; padding-left: 30px;">
                                                <label>Year:</label>
                                            </div>
                                            <div class="form-group col-md-5 form-group-sm" style="display: inline-block;">
                                                <select class="form-control" name="year">
                                                    <?php
                                                    $currentYear = date("Y")+2;
                                                    for ($i = 0; $i <= 4; $i++) {
                                                        ?>
                                                        <option value="<?php echo $currentYear - $i; ?>">
                                                            <?php echo $currentYear - $i; ?>
                                                        </option>
                                                    <?php }
                                                    ?>
                                                </select>
                                            </div>  
                                            <div class="col-md-2" style="display: inline-block;">
                                                <input type="button" class="btn btn-success btn-sm" id="double-room-submitYearly" value="Generate">
                                            </div>
                                        </div>                                       
                                    </form>
                                    <div id="double-room-reportYearly"></div>
                                </div>  

                                <div id="family-room" class="tab-pane fade">
                                    <form id="family-room-form">
                                        <div class="row" style="float: right;">
                                            <div class="col-md-1" style="display: inline-block; padding-left: 30px;">
                                                <label>Year:</label>
                                            </div>
                                            <div class="form-group col-md-5 form-group-sm" style="display: inline-block;">
                                                <select class="form-control" name="year">
                                                    <?php
                                                    $currentYear = date("Y")+2;
                                                    for ($i = 0; $i <= 4; $i++) {
                                                        ?>
                                                        <option value="<?php echo $currentYear - $i; ?>">
                                                            <?php echo $currentYear - $i; ?>
                                                        </option>
                                                    <?php }
                                                    ?>
                                                </select>
                                            </div>  
                                            <div class="col-md-2" style="display: inline-block;">
                                                <input type="button" class="btn btn-success btn-sm" id="family-room-submitYearly" value="Generate">
                                            </div>
                                        </div>                                       
                                    </form>
                                    <div id="family-room-reportYearly"></div>
                                </div>  

                                <div id="cottage" class="tab-pane fade">
                                    <form id="cottage-form">
                                        <div class="row" style="float: right;">
                                            <div class="col-md-1" style="display: inline-block; padding-left: 30px;">
                                                <label>Year:</label>
                                            </div>
                                            <div class="form-group col-md-5 form-group-sm" style="display: inline-block;">
                                                <select class="form-control" name="year">
                                                    <?php
                                                    $currentYear = date("Y")+2;
                                                    for ($i = 0; $i <= 4; $i++) {
                                                        ?>
                                                        <option value="<?php echo $currentYear - $i; ?>">
                                                            <?php echo $currentYear - $i; ?>
                                                        </option>
                                                    <?php }
                                                    ?>
                                                </select>
                                            </div>  
                                            <div class="col-md-2" style="display: inline-block;">
                                                <input type="button" class="btn btn-success btn-sm" id="cottage-submitYearly" value="Generate">
                                            </div>
                                        </div>                                       
                                    </form>
                                    <div id="cottage-reportYearly"></div>
                                </div>  
                                
                                <div id="payment" class="tab-pane fade">
                                    <form id="payment-form">
                                        <div class="row" style="float: right;">
                                            <div class="col-md-1" style="display: inline-block; padding-left: 30px;">
                                                <label>Year:</label>
                                            </div>
                                            <div class="form-group col-md-5 form-group-sm" style="display: inline-block;">
                                                <select class="form-control" name="year">
                                                    <?php
                                                    $currentYear = date("Y");
                                                    for ($i = 0; $i <= 3; $i++) {
                                                        ?>
                                                        <option value="<?php echo $currentYear - $i; ?>">
                                                            <?php echo $currentYear - $i; ?>
                                                        </option>
                                                    <?php }
                                                    ?>
                                                </select>
                                            </div>  
                                            <div class="col-md-2" style="display: inline-block;">
                                                <input type="button" class="btn btn-success btn-sm" id="payment-submitYearly" value="Generate">
                                            </div>
                                        </div>                                       
                                    </form>
                                    <div id="payment-reportYearly"></div>
                                </div> 

                                <div id="feedback" class="tab-pane fade">
                                    <form id="feedback-form">
                                        <div class="row" style="float: right;">
                                            <div class="col-md-1" style="display: inline-block; padding-left: 30px;">
                                                <label>Year:</label>
                                            </div>
                                            <div class="form-group col-md-5 form-group-sm" style="display: inline-block;">
                                                <select class="form-control" name="year">
                                                    <?php
                                                    $currentYear = date("Y");
                                                    for ($i = 0; $i <= 3; $i++) {
                                                        ?>
                                                        <option value="<?php echo $currentYear - $i; ?>">
                                                            <?php echo $currentYear - $i; ?>
                                                        </option>
                                                    <?php }
                                                    ?>
                                                </select>
                                            </div>  
                                            <div class="col-md-2" style="display: inline-block;">
                                                <input type="button" class="btn btn-success btn-sm" id="feedback-submitYearly" value="Generate">
                                            </div>
                                        </div>                                       
                                    </form>
                                    <div id="feedback-reportYearly"></div>
                                </div>                                                               

                            </div>
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
        <?php include '../../common/common_modals.php'; ?>
    </body>
</html>