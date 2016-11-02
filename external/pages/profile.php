<?php
if (!isset($_SESSION)) {
    session_start();
}
if ($_SESSION['username'] == "") {
    header("Location:index.php");
    exit;
}
?>
<html>
    <head>
        <title>Profile</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../bootstrap-3.3.7/css/bootstrap.min_1.css"/>
        <link rel="stylesheet" href="../css/site-layout.css"/>
        <link rel="stylesheet" href="../css/styles.css"/>
        <script src="../js/jquery-1.12.2.min.js"></script>
        <script src="../bootstrap-3.3.7/js/bootstrap.min.js"></script> 
        <script src="../js/loader.js"></script>
        <script src="../js/modernizr.min.js"></script>
        <script src="../js/jquery.easing.1.3.min.js"></script>  
        <script src="../js/effects.js"></script>  
        <style>
            #site-footer{
                position: fixed;
                bottom: 0;
            }
        </style>
    </head>

    <body>
        <div class="loader-anim"></div>
        <?php include './common/minimum-header.php'; ?>
        <div> 
            <div style="margin-top: 120px;">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <form role="form">
                            <div class="form-group">
                                <label class="control-label" for="exampleInputEmail1">First name</label>
                                <input class="form-control" id="exampleInputEmail1"
                                       type="text">
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="exampleInputPassword1">Last name</label>
                                <input class="form-control" id="exampleInputPassword1"
                                       type="text">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Email</label>
                                <input class="form-control" type="text">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Contact no</label>
                                <input class="form-control" type="text">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Password</label>
                                <button class="btn btn-primary">Change password</button>
                            </div>
                            <button type="submit" class="btn btn-default">Submit</button>
                        </form>
                    </div>
                    <div class="col-md-2"></div>                    
                </div>
            </div>
        </div>
        <div id="site-footer">
            <?php include './common/footer.php'; ?>
        </div>
    </body>
</html>