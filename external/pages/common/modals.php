<!-- Start Sign up modal -->
<div class="modal fade" id="modal-signup">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <img class="header-icons" src="../images/icons/signup-header-icon.png"/>
                <h3 class="modal-title header-modals">&nbsp;Sign up</h3>
            </div>
            <div class="modal-body">
                <form id="customer-signup-form" method="post" action="">
                    <div class="panel-group" id="accordion">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">Personal Details</a>
                                </h4>
                            </div>
                            <div id="collapse1" class="panel-collapse collapse in">
                                <div class="panel-body">
                                    <label>First name </label>
                                    <label class="lbl-signup-errors" id="lbl-signup-fname-error"></label>
                                    <input type="text" class="form-control cust-signup-fields" id="signup-firstname" name="signup-firstname" placeholder="Enter your first name">

                                    <label>Last name </label>
                                    <label class="lbl-signup-errors" id="lbl-signup-lname-error"></label>
                                    <input type="text" class="form-control cust-signup-fields" id="signup-lastname" name="signup-lastname" placeholder="Enter your last name">

                                    <label>Email </label>
                                    <label class="lbl-signup-errors" id="lbl-signup-email-error"></label>
                                    <input type="email" class="form-control cust-signup-fields" id="signup-email" name="signup-email" placeholder="Enter your email">

                                    <label>Contact no </label>
                                    <label class="lbl-signup-errors" id="lbl-signup-contactno-error"></label>
                                    <input type="text" class="form-control cust-signup-fields" id="signup-contactno" name="signup-contactno" placeholder="Enter your contact no. Eg: ">
                                </div>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">Account Details</a>
                                </h4>
                            </div>
                            <div id="collapse2" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <div class="panel-body">
                                        <label>User name </label>
                                        <label class="lbl-signup-errors" id="lbl-signup-username-error"></label>
                                        <input type="text" class="form-control cust-signup-fields" id="signup-username" name="signup-username" placeholder="Enter a user name">

                                        <label>Password </label>
                                        <label class="lbl-signup-errors" id="lbl-signup-password-error"></label>
                                        <input type="password" class="form-control cust-signup-fields" id="signup-password" name="signup-password" placeholder="Enter a password">

                                        <label>Re-type password </label>
                                        <label class="lbl-signup-errors" id="lbl-signup-repassword-error"></label>
                                        <input type="password" class="form-control cust-signup-fields" id="signup-repassword" placeholder="Re enter your password">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <a class="btn btn-default btn-signupfrm" data-dismiss="modal">Cancel</a>
                <button class="btn btn-success btn-signupfrm" id="btn-signup-ok">Sign up</button>
            </div>
        </div>
    </div>
</div>
<!-- End Sign up modal -->

<!-- Validation error popup -->
<div id="modal-validation-error-popup" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><img src="../images/icons/error.png" class="popup-icons">&nbsp;&nbsp;Validation Error</h4>
            </div>
            <div class="modal-body">
                <p>Can not submit your message since the There are <strong>validation errors</strong>.
                    <br>Please go through the highlighted fields, correct them.<br>
                    Please try again once you are done.
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- Validation error popup -->

<!-- Signup verify modal-start -->
<div class="modal fade" id="modal-signup-verification">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Complete Registration</h4>
            </div>
            <div class="modal-body">
                <lable style="float:left;">Dear&nbsp;</lable>
                <p>
                <p id="regd-username"></p>
                We have sent a verification to your email. Please enter it below to activate
                your account.
                <strong>Please note: you will not be able to login to the system until you verify
                    the code.</strong>
                </p>
                <div style="text-align:center">
                    <form>
                        <lable>Code:</lable>
                        <input type="text" id="regd-code">
                        <div style="margin-left:40px; margin-top:5px;margin-bottom: 10px;">
                            <button class="btn btn-primary btn-sm" id="btn-regResend">Resend code</button>
                            <button class="btn btn-success btn-sm" id="btn-regVerify">Verify</button>
                        </div>
                    </form>
                </div>
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
            <div class="modal-footer">
                <a class="btn btn-default" data-dismiss="modal">Close</a>
            </div>
        </div>
    </div>
</div>
<!-- Signup verify modal-end -->

<!-- Start-Signup customer failed message popup -->
<div id="modal-customerSignupFail" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <img class="header-icons" src="../images/icons/error.png"/>
                <h3 class="modal-title header-panel">&nbsp;Error Occurred</h3>
            </div>
            <div class="modal-body">
                <p>
                    <strong>Some error occurred during the registration process.</strong>
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
</div>
<!-- End-Signup customer failed message popup -->