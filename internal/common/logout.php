<?php
if (!isset($_SESSION)) {
    session_start();
}
unset($_SESSION['username']); //Remove session
unset($_SESSION['session_id']);
header('refresh:3,url=../module/login/index.php'); //Redirection
?>

<html>
    <head> 
        <title>Logout</title>
        <link rel="icon" href="../../../images/bi.png" />
        <link rel="stylesheet" type="text/css" 
              href="../bootstrap-3.3.7/css/bootstrap.min_1.css" />
        <link rel="stylesheet" type="text/css" 
              href="../css/mainlayout.css" />
        <script type="text/javascript" src="../js/jquery-1.12.2.min.js">
        </script>
        <link rel="stylesheet" href="../css/styles.css"/>
    </head>
    <body>
        <div id="contents" style="margin-top: 50px;">
            <div class="center-div">
                <div class="section">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <img class="icons" src="../images/icons/logout.png">
                            <h3 class="header-panel">&nbsp;Logout</h3>
                        </div>
                        <div class="panel-body">
                            <div class="container" style="width: 550px;">
                                <div>
                                    <h2 align="center">Logged out</h2>
                                    <div style="text-align: center; padding-top: 20px;">
                                        <img src="../images/icons/logout_2.png" width="160px" height="160px"/>
                                    </div>
                                    <p align="center" style="padding-top: 20px;">You have logged out from the system successfully...<br>
                                        <strong>You will redirect to the home page in few seconds.</strong>
                                        If not redirected, please click the following link to go to the login page.
                                    </p>
                                    <a href="../module/login/index.php"><p align="center" style="font-size: large;"><strong>Go to login page</strong></p></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="footer">
                <?php include '../common/footer.php'; ?> 
            </div>            
        </div>

    </body>

</html>
