<html>
    <head> 
        <title>Login-Hotel Reservation System</title>
        <link rel="icon" href="../../../images/bi.png" />
        <link rel="stylesheet" type="text/css" 
              href="../../../bootstrap/css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="../../../css/mainlayout.css" />
        <link rel="stylesheet" type="text/css" href="../../../css/style.css" /> 
        <script type="text/javascript" src="../../../js/jquery-1.8.3.min.js">
        </script>
        <script type="text/javascript" src="../../../js/loginvalidate.js">
        </script>
    </head>
    <body>
        <div id="main">
            <div id="header">
                <?php include '../../../common/header.php'; ?>      
            </div>

            <div id="navi">&nbsp;</div>

            <div id="contents">                
                <div class="login-card">
                    <div id="login-title">
                        <h1>Log-in</h1>
                    </div>
                    <div id="login-form">

                        <?php
                        // To display invalid user name or password
                        if (isset($_REQUEST['msg'])) {
                            echo '<p class="alert-danger" id="msg" style="font-size: medium;">'
                            . '<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>';
                            $msg = $_REQUEST['msg'];
                            $msg1 = base64_decode($msg);
                            echo " " . $msg1 . '</p>';
                        }
                        ?>

                        <form method="post" action="../controller/logincontroller.php">
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

                            <button type="submit" class="login login-submit btn btn-info" name="login" id="loginButton">
                                <span>Login</span>
                            </button>

                        </form>
                    </div>

                </div>

            </div>  
            
            <div id="footer">
                <?php include '../../../common/footer.php'; ?> 
            </div>            
        </div>
    </body>
</html>
