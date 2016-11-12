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
        <title>Menus</title>        
        <link rel="stylesheet" type="text/css" 
              href="../../bootstrap-3.3.7/css/bootstrap.min_1.css" />
        <link rel="stylesheet" type="text/css" href="../../css/styles.css" />
        <link rel="stylesheet" type="text/css" href="../../css/pace-theme-center-simple.css" /> 
        <script type="text/javascript" src="../../js/jquery-1.12.2.min.js">
        </script>       
        <script type="text/javascript" src="../../bootstrap-3.3.7/js/bootstrap.min.js">
        </script>        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
        <script type="text/javascript" src="../../js/pace.js">
        </script>
        <script type="text/javascript" src="../../js/common.js">
        </script>
        <script type="text/javascript" src="../../js/addel.jquery.js">
        </script>
        <script type="text/javascript" src="../../js/validations/food-menu.js">
        </script>
        <script type="text/javascript" src="../../js/event.js">
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

        <?php if ($_SESSION['group'] == "Receptionist") { ?>
            <div class="center-div">
                <div class="section">          
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <img class="icons" src="../../images/icons/food.png">
                            <h3 class="header-panel">&nbsp;Food Menu</h3>
                        </div>
                        <div class="panel-body">
                            <div class="container" style="width: 800px;">

                            </div>
                        </div>
                    </div> 
                </div>
            <?php } else { ?>
                <div class="center-div">
                    <div class="section">          
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <img class="icons" src="../../images/icons/food.png">
                                <h3 class="header-panel">&nbsp;Food Menu</h3>
                                <a href="./view-menu.php" class="btn btn-warning btn-sm" style="width: 20%; float: right;">
                                    View current menus
                                </a>
                            </div>
                            <div class="panel-body">
                                <div class="container" style="min-width: 800px;">

                                    <div class="row">
                                        <div class="col-md-4" style="text-align: center;">
                                            Category
                                        </div>
                                        <div class="col-md-4" style="text-align: center;">
                                            Food item
                                        </div>
                                        <div class="col-md-4" style="text-align: center;">
                                            Seected item
                                        </div>                                        
                                    </div>
                                    <form class="addel" id="menu-form">
                                        <div class="form-group addel-target">
                                            <div class="input-group">
                                                <div class="col-md-4">
                                                    <select class="form-control input-sm sel-menuCategories">
                                                    </select>
                                                </div>
                                                <div class="col-md-4">
                                                    <select class="form-control input-sm sel-menuFoods">
                                                    </select>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="text" name="foods[]" class="form-control input-sm txt-foodItem" readonly="true">
                                                </div>
                                                <span class="input-group-btn">                                                    
                                                    <button type="button" class="btn btn-danger addel-delete form-control input-sm">
                                                        <i class="fa fa-remove">
                                                        </i>
                                                    </button>
                                                </span>
                                            </div>

                                        </div>
                                        <div class="form-group">
                                            <input type="text" id="txt-menuName" name="menuName" class="form-control" style="margin-left: 15px; float: left; width: 20%;" placeholder="Enter menu name"/>
                                            <input type="text" id="txt-menuPrice" name="menuPrice" class="form-control" style="margin-left: 15px; float: left; width: 15%;" placeholder="Enter menu price"/>
                                            <label class="lbl-signup-errors" id="lbl-menu-errors"></label>
                                            <button type="button" class="btn btn-success btn-block addel-add" style="width: 20%; float: right;">
                                                <i class="fa fa-plus"></i> Add new
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="panel-footer">
                                <button class="btn btn-primary" id="btn-save-menu" style="margin-left: 28px;">Save created menu</button>
                            </div>
                            <div id="menu-add-success" class="alert alert-success" style="font-size: 15px;">
                                <strong>Success!</strong> New menu saved successfully.
                            </div>

                            <div id="menu-add-failed" class="alert alert-danger" style="font-size: 15px;">
                                <strong>Failed!</strong> Error while saving the new menu.
                            </div>
                        </div>
                    </div> 
                </div>
            <?php } ?>        

            <?php include '../../common/common_modals.php'; ?>
            <div id="footer">
                <?php include '../../common/footer.php'; ?> 
            </div>
    </body>
</html>
