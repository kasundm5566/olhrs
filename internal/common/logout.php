<?php
if (!isset($_SESSION)) {
    session_start();
}
if ($_SESSION['username'] == "") {
    header("Location:../module/login/index.php");
    exit;
}

unset($_SESSION['username']); //Remove session
unset($_SESSION['session_id']);
//header('refresh:3,url=../module/login/index.php'); //Redirection
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
        <script type="text/javascript" src="../js/circular-countdown.js">
        </script>
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
                                        <img src="../images/icons/logout_2.png" width="140px" height="140px"/>
                                    </div>                                   
                                    <p style="padding-top: 20px;">You have logged out from the system successfully...<br>
                                        <strong>You will redirect to the home page in few seconds.</strong>
                                        If not redirected, please click the following link to go to the login page.
                                    </p>
                                    <div style="margin-left: 150px;" class="timer"></div>
                                    <a href="../module/login/index.php"><p style="font-size: large;"><strong>Go to login page</strong></p></a>
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
        <script>
            $('.timer').circularCountDown({
                size: 35,
                borderSize: 5,
                colorCircle: '#008cba',
                background: 'white',
                fontFamily: 'sans-serif',
                fontColor: '#333333',
                fontSize: 15,
                delayToFadeIn: 0,
                delayToFadeOut: 0,
                reverseLoading: false,
                reverseRotation: false,
                duration: {
                    hours: 0,
                    minutes: 0,
                    seconds: 5
                },
                end: function () {
                    window.location.href = "../module/login/index.php";
                }
            });
        </script>
    </body>

</html>
