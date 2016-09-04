<?php ?>
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
        <script src="../js/jquery-1.12.2.min.js"></script>
        <script src="../bootstrap-3.3.7/js/bootstrap.min.js"></script>  
        <script src="../js/scroll-nav.js"></script>
        <script src="../js/loader.js"></script>
        <script src="../js/modernizr.min.js"></script>
        <script src="../js/jquery.easing.1.3.min.js"></script>
        <script src="../js/anchorHoverEffect.js"></script>
        <script src="../js/login.js"></script>
    </head>
    <body data-spy="scroll" data-target=".navbar" data-offset="50">
        <div class="loader-anim"></div>
        <?php include './header.php'; ?>

        <div id="welcome-section" class="container-fluid" style="overflow: hidden;">
            <h1 style="margin-top: 60px;">Welcome</h1>
            <?php include './welcome-carousel.php'; ?>
        </div>

        <div id="overview-section" class="container-fluid">
            <h1>Overview</h1>
            <div class="row">
                <div class="col-sm-4">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    <img src="birds1.jpg" class="img-responsive margin" style="width:100%" alt="Image">
                </div>
                <div class="col-sm-4">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    <img src="birds2.jpg" class="img-responsive margin" style="width:100%" alt="Image">
                </div>
                <div class="col-sm-4">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    <img src="birds3.jpg" class="img-responsive margin" style="width:100%" alt="Image">
                </div>
            </div>
        </div>

        <div id="gallery-section" class="container-fluid dynamic-section">
            <h1>Gallery</h1>
            <p>sfsdfsdfsd dfs fs sdfsd fssdfssdfsd<br>dfsdf dfs d.</p>
        </div>

        <div id="reservation-section" class="container-fluid dynamic-section">
            <h1>Reservations</h1>
        </div>

        <div id="contact-section" class="container-fluid dynamic-section">
            <h1>Contact us</h1>
            <?php include './contact.php'; ?>
        </div>

        <div id="login-section" class="container-fluid dynamic-section">            
            <h1>Login/Sign up</h1>
            <?php include './login.php'; ?>
        </div>       

        <div id="site-footer">
            <?php include './footer.php'; ?>
        </div>
        
    </body>
</html>

