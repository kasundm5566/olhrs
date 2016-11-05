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
        <script src="../js/profile.js"></script>
        <script src="../js/validations/signup-validate.js"></script>
        <script src="../js/validations/profile-validate.js"></script>

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
                    <div class="col-md-1"></div>
                    <div class="col-md-5">
                        <form role="form" method="post" action="dao/customer/update_customer.php" onsubmit="return validateProfileFields();">
                            <div class="form-group">
                                <label class="control-label">First name</label>
                                <label class="lbl-errors" id="profile-fname-error"></label>
                                <input class="form-control" id="profile-fname" name="profile-fname"
                                       type="text" readonly="true" value="<?php echo $_SESSION['userinfo']['first_name']; ?>">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Last name</label>
                                <label class="lbl-errors" id="profile-lname-error"></label>
                                <input class="form-control" id="profile-lname" name="profile-lname"
                                       type="text" readonly="true" value="<?php echo $_SESSION['userinfo']['last_name']; ?>">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Username</label>                                
                                <input class="form-control" id="profile-username" name="profile-username"
                                       type="text" readonly="true" value="<?php echo $_SESSION['username']; ?>">
                            </div>                           
                            <div class="form-group">
                                <label class="control-label">Email</label>
                                <label class="lbl-errors" id="profile-email-error"></label>
                                <input class="form-control" type="text" id="profile-email" name="profile-email" readonly="true" value="<?php echo $_SESSION['userinfo']['email']; ?>">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Contact no</label>
                                <label class="lbl-errors" id="profile-tel-error"></label>
                                <input class="form-control" type="text" id="profile-tel" name="profile-tel" readonly="true" value="<?php echo $_SESSION['userinfo']['telephone']; ?>">
                            </div>

                            <button type="submit" id="btn-updateProfile" class="btn btn-success" style="width: 50%; float: right;">Update Profile</button>
                        </form>
                    </div>
                    <div class="col-md-1"></div>
                    <div class="col-md-4" style="margin-top: 50px;">
                        <div style="margin-bottom: 10px;">
                            <a class="btn btn-success" id="btn-reserv-history" style="width: 100%;" href="reservation-history.php" target="_blank">View Reservations History</a>
                        </div>
                        <div style="margin-bottom: 10px;">
                            <button class="btn btn-success" id="btn-update-customer" style="width: 100%;">Update Profile</button>
                        </div>
                        <div style="margin-bottom: 10px;">
                            <button class="btn btn-success" id="btn-change-pass" style="width: 100%;">Change Password</button>
                        </div>
                        <div style="text-indent: 3px;">
                            <?php
                            // To display invalid user name or password
                            if (isset($_REQUEST['msg'])) {
                                $decoded_msg = base64_decode($_REQUEST['msg']);
                                echo '<p class="alert-warning contactus-error">';
                                echo " " . $decoded_msg . '</p>';
                            }
                            ?>
                        </div> 
                    </div>                   
                    <div class="col-md-1"></div>                    
                </div>
            </div>
        </div>
        <div id="site-footer">
            <?php include './common/footer.php'; ?>
        </div>

        <div id="modal-changepass-popup" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title"><img src="../images/icons/user_lock.png" class="popup-icons">&nbsp;&nbsp;Change Password</h4>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="changepass-username"
                               value="<?php echo $_SESSION['username']; ?>"/>
                        <form class="form-horizontal" id="changepw-form">
                            <div class="form-group">
                                <div class="col-sm-2">
                                    <label class="control-label">Current password</label>
                                </div>                                
                                <div class="col-sm-10">
                                    <label class="lbl-errors" id="profile-currentpw-error">b</label>
                                    <input type="password" class="form-control" id="txt-currentpw" name="txt-currentpw">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-2">
                                    <label class="control-label">New password</label>
                                </div>
                                <div class="col-sm-10">
                                    <label class="lbl-errors" id="profile-newpw-error">b</label>
                                    <input type="password" class="form-control" id="txt-newpw" name="txt-newpw">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-2">
                                    <label class="control-label">Re-type new passowrd</label>
                                </div>
                                <div class="col-sm-10">
                                    <label class="lbl-errors" id="profile-newpwRe-error">b</label>
                                    <input type="password" class="form-control" id="txt-newpwRe" name="txt-newpwRe">
                                </div>
                            </div>
                            <div class="alert alert-success" id="changepass-success">
                                <strong>Success!</strong>Password change applied.
                            </div>
                            <div class="alert alert-danger" id="changepass-error">
                                <strong>Error!</strong> Can not change the password. Might be the current password is wrong.
                            </div>
                        </form>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-success" id="btn-changepass-ok">Change password</button>
                    </div>
                </div>
            </div>
        </div>

    </body>
</html>