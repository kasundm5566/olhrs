<?php
if (!isset($_SESSION)) {
    session_start();
}
if ($_SESSION['username'] == "") {
    header("Location:index.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Customer Home-Aqua Pearl Lake Resort</title>
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
        <script src="../js/validations/contactus-validate.js"></script>        
        <script src="../js/effects.js"></script>
        <script src="../js/lightgallery.min.js"></script>
        <script src="../js/lg-thumbnail.min.js"></script>
        <script src="../js/lg-fullscreen.min.js"></script>
        <script src="../js/jquery.magic.display.min.js"></script>   
    </head>
    <body data-spy="scroll" data-target=".navbar" data-offset="50">
        <div class="loader-anim"></div>
        <?php include './common/customer-header.php'; ?>

        <?php include './common/scrollspy-common.php'; ?> 

        <div id="site-footer">
            <?php include './common/footer.php'; ?>
        </div>
    </body>
</html>