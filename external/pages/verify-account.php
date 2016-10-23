<?php
$username = base64_decode($_REQUEST['username']);
?>

<html>
    <head>
        <title>Verify Account</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../bootstrap-3.3.7/css/bootstrap.min_1.css"/>
        <link rel="stylesheet" href="../css/site-layout.css"/>
        <link rel="stylesheet" href="../css/styles.css"/>
        <link rel="stylesheet" href="../css/animate.css"/>
        <link rel="stylesheet" href="../css/progress-wizard.min.css"/>
        <script src="../js/jquery-1.12.2.min.js"></script>
        <script src="../bootstrap-3.3.7/js/bootstrap.min.js"></script>  
        <script src="../js/loader.js"></script>
        <script src="../js/verification.js"></script>
    </head>
    <body>
        <div style="margin-top: 10px; margin-left: 250px; width: 800px;">
            <div class="panel panel-warning">
                <div class="panel-heading">Verify Account</div>
                <div class="panel-body">
                    <p>
                        Dear user <?php echo $username; ?>,<br>
                        Our system indicates that you have not verified your account. Please enter
                        the verification code we sent to your provided email address.<br>
                        If you did not receive an email containing the verification code, please click
                        resend again button to receive a new verification code to your email provided for
                        the register.
                    </p>
                    <div style="text-align:center; padding-top: 10px;">
                        <form id="veri-form">
                            <lable>Username:</lable>
                            <input type="text" id="veri-username" name="veri-username" readonly value="<?php echo $username ?>">
                            <lable>Code:</lable>
                            <input type="text" id="veri-code" name="veri-code" size="50">
                            <div style="margin-left:40px; margin-top:10px;">
                                <button id="btn-veri-resend" class="btn btn-primary btn-sm" style="width: 200px;">Resend code</button>
                                <button id="btn-veri-confirm" class="btn btn-success btn-sm" style="width: 200px;">Verify</button>
                            </div>
                        </form>

                        <div id="veri-success" class="alert alert-success" style="font-size: 15px;">
                            <strong>Success!</strong> Account verified... <strong><a href="index.php#login-section">Click here to login.</a></strong>
                        </div>

                        <div id="resend-success" class="alert alert-success" style="font-size: 15px;">
                            <strong>Success!</strong> New code sent to your email.
                        </div>
                        
                        <div id="veri-failed" class="alert alert-danger" style="font-size: 15px;">
                            <strong>Failed!</strong> Incorrect verification code...
                        </div>
                        
                        <div id="resend-failed" class="alert alert-danger" style="font-size: 15px;">
                            <strong>Failed!</strong> Error sending new verification code...
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
