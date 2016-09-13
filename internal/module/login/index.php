<html>
    <head> 
        <title>Login</title>
        <link rel="stylesheet" type="text/css" 
              href="../../bootstrap-3.3.7/css/bootstrap.min_1.css" />
        <link rel="stylesheet" type="text/css" href="../../css/styles.css" />
        <link rel="stylesheet" type="text/css" href="../../css/pace-theme-center-simple.css" /> 
        <script type="text/javascript" src="../../js/jquery-1.12.2.min.js">
        </script>       
        <script type="text/javascript" src="../../bootstrap-3.3.7/js/bootstrap.min.js">
        </script>        
        <link rel="stylesheet" type="text/css" href="../../css/styles.css" /> 
        <link rel="stylesheet" type="text/css" href="../../css/pace-theme-center-simple.css" /> 
        <script type="text/javascript" src="../../js/validations/loginvalidate.js">
        </script>
        <script type="text/javascript" src="../../js/pace.js">
        </script>
    </head>
    <body>
        <div id="header">
            <?php include '../../common/header.php'; ?>      
        </div>

        <div id="navi">
        </div>

        <div class="center-div">
            <div class="section">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <img class="icons" src="../../images/icons/login.png">
                        <h3 class="header-panel">&nbsp;Login</h3>
                    </div>
                    <div class="panel-body">
                        <div class="container" style="width: 550px;">
                            <?php
                            // To display invalid user name or password
                            if (isset($_REQUEST['msg'])) {
                                echo '<p class="alert-danger" id="msg" style="font-size: medium; padding-left:5px;">'
                                . '<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>';
                                $msg = $_REQUEST['msg'];
                                $msg1 = base64_decode($msg);
                                echo " " . $msg1 . '</p>';
                            }
                            ?>

                            <form method="post" action="logincontroller.php">
                                <label>User name</label>

                                <div class="input-group login-gly">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                    <input type="text" id="username" class="form-control" name="username"
                                           placeholder="Enter user name"/>
                                </div>

                                <label>Password</label>
                                <div class="input-group login-gly">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                    <input id="password" type="password" class="form-control" name="password" placeholder="Enter password"/>
                                </div>

                                <button type="submit" class="login login-submit btn btn-success" name="login" id="loginButton">
                                    <span>Login</span>
                                </button>
                            </form>
                            <div>
                                <a id="link-forgot-password">Forgot password</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="footer">
            <?php include '../../common/footer.php'; ?> 
        </div> 

        <!-- Start-Forgot password popup -->
        <div id="modal-forgotPassword" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <img class="header-icons" src="../../images/icons/Forgotten-Password.png"/>
                        <h3 class="modal-title header-panel">&nbsp;Password Reset</h3>
                    </div>
                    <div class="modal-body">
                        <p>
                            To maintain the security of the system, you will not be able to reset the password
                            by yourself.<br>Feature only available to the admin users.<br>
                            <strong>Please contact an admin user to reset your password.</strong>
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning" data-dismiss="modal">OK</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End-Forgot password popup -->      

    </body>
</html>
