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
                                <input type="text" class="form-control" id="signup-firstname" placeholder="Enter your first name">

                                <label>Last name </label>
                                <label class="lbl-signup-errors" id="lbl-signup-lname-error"></label>
                                <input type="text" class="form-control" id="signup-lastname" placeholder="Enter your last name">

                                <label>Email </label>
                                <label class="lbl-signup-errors" id="lbl-signup-email-error"></label>
                                <input type="email" class="form-control" id="signup-email" placeholder="Enter your email">

                                <label>Contact no </label>
                                <label class="lbl-signup-errors" id="lbl-signup-contactno-error"></label>
                                <input type="text" class="form-control" id="signup-contactno" placeholder="Enter your contact no. Eg: ">
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
                                    <input type="text" class="form-control" id="signup-username" placeholder="Enter a user name">

                                    <label>Password </label>
                                    <label class="lbl-signup-errors" id="lbl-signup-password-error"></label>
                                    <input type="password" class="form-control" id="signup-password" placeholder="Enter a password">

                                    <label>Re-type password </label>
                                    <label class="lbl-signup-errors" id="lbl-signup-repassword-error"></label>
                                    <input type="password" class="form-control" id="signup-repassword" placeholder="Re enter your password">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a class="btn btn-default btn-signupfrm" data-dismiss="modal">Cancel</a>
                <a class="btn btn-success btn-signupfrm">Sign up</a>
            </div>
        </div>
    </div>
</div>
<!-- End Sign up modal -->