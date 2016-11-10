<?php
if (!isset($_SESSION)) {
    session_start();
    $_SESSION['username'] = "";
} else {
    unset($_SESSION['username']); //Remove session
    unset($_SESSION['userinfo']); //Remove session
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Welcome-Aqua Pearl Lake Resort</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../bootstrap-3.3.7/css/bootstrap.min_1.css"/>
        <link rel="stylesheet" href="../css/scrollspy.css"/>
        <link rel="stylesheet" href="../css/site-layout.css"/>
        <link rel="stylesheet" href="../css/styles.css"/>
        <link rel="stylesheet" href="../css/anchorHoverEffect.css"/>
        <link rel="stylesheet" href="../css/bootstrap-datepicker3.css"/>
        <link rel="stylesheet" href="../css/lightgallery.css"/>
        <link rel="stylesheet" href="../css/gallery.css"/>
        <link rel="stylesheet" href="../css/lg-transitions.min.css"/>
        <script src="../js/jquery-1.12.2.min.js"></script>
        <script src="../bootstrap-3.3.7/js/bootstrap.min.js"></script>  
        <script src="https://www.google.com/recaptcha/api.js"></script>
        <script src="../js/bootstrap-datepicker.min.js"></script>
        <script src="../js/datepicker.js"></script>
        <script src="../js/scroll-nav.js"></script>
        <script src="../js/loader.js"></script>
        <script src="../js/modernizr.min.js"></script>
        <script src="../js/jquery.easing.1.3.min.js"></script>
        <script src="../js/anchorHoverEffect.js"></script>
        <script src="../js/validations/signup-validate.js"></script>
        <script src="../js/validations/contactus-validate.js"></script>             
        <script src="../js/common.js"></script>        
        <script src="../js/effects.js"></script>        
        <script src="../js/lightgallery.min.js"></script>        
        <script src="../js/lg-thumbnail.min.js"></script>        
        <script src="../js/lg-fullscreen.min.js"></script>        
    </head>
    <body data-spy="scroll" data-target=".navbar" data-offset="50">
        <div class="loader-anim"></div>
        <?php include './common/header.php'; ?>

        <?php include './common/scrollspy-common.php'; ?>

        <div id="login-section" class="container-fluid dynamic-section">            
            <h1>Login/Sign up</h1>
            <?php include './login.php'; ?>
        </div>       

        <div id="site-footer">
            <?php include './common/footer.php'; ?>
        </div>

        <!-- Forgot username modal -->
        <div class="modal fade" id="modal-forgotpass">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form class="form-horizontal" role="form" action="./operations/forgot-password.php" method="post" onsubmit="return validateForgotPassForm();">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h4 class="modal-title">Forgot Password</h4>
                        </div>
                        <div class="modal-body">

                            <div class="form-group">
                                <div class="col-sm-2">
                                    <label>Username</label>
                                </div>

                                <div class="col-sm-10">
                                    <label class="lbl-signup-errors" id="lbl-username-error"></label>
                                    <input type="text" class="form-control" name="forgotpass-username" id="forgotpass-username" placeholder="Enter username">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-2">
                                    <label>Email</label>
                                </div>
                                <div class="col-sm-10">
                                    <label class="lbl-signup-errors" id="lbl-email-error"></label>
                                    <input type="text" class="form-control" name="forgotpass-email" id="forgotpass-email" placeholder="Enter email used to register">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <a class="btn btn-default" data-dismiss="modal">Close</a>
                            <button type="submit" class="btn btn-primary" id="btn-submit-forgotpass">Submit</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </body>
</html>