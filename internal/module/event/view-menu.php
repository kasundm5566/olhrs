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
        <script type="text/javascript" src="../../js/menu-viewer.js">
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
                        <img class="icons" src="../../images/icons/food.png">
                        <h3 class="header-panel">&nbsp;Food Menu</h3>
                        <?php
                        if ($_SESSION['group'] != "Receptionist") {
                            ?>
                            <a href="./Menus.php" class="btn btn-warning btn-sm" style="width: 20%; float: right;">
                                Create a new menu
                            </a>
                            <?php
                        }
                        ?>

                    </div>
                    <div class="panel-body">
                        <div class="container" style="min-width: 800px;">
                            <div class="form-group">
                                <label>Select menu:</label>
                                <select class="form-control input-sm" id="sel-menu-select" style="width: 25%;">
                                    <?php
                                    include '../../common/dbconnection.php';
                                    $objDBConnection = new dbconnection();
                                    $connection = $objDBConnection->connection();
                                    $sql = "SELECT menu_name FROM menu;";
                                    $result = $connection->query($sql);
                                    if ($result) {
                                        while ($row = $result->fetch_assoc()) {
                                            $menuName = $row['menu_name'];
                                            echo "<option value='$menuName'>" . $menuName . "</option>";
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div id="show-menu-div">

                            </div>
                        </div>
                    </div>
                    <div class="panel-footer">
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
