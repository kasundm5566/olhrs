<!-- Start add user modal -->
<div class="modal fade" id="modal-user-add">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <img class="header-icons" src="../../images/icons/signup-header-icon.png"/>
                <h3 class="modal-title header-panel">&nbsp;Add New Staff Member</h3>
            </div>
            <div class="modal-body">
                <form id="form-adduser">
                    <div class="panel-group" id="accordion">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
                                        <span class="glyphicon glyphicon-user" style="padding-right: 5px;"></span>Personal Details</a>
                                </h4>
                            </div>
                            <div id="collapse1" class="panel-collapse collapse in">
                                <div class="panel-body">
                                    <label>First name </label>
                                    <label class="lbl-signup-errors" id="lbl-signup-fname-error"></label>
                                    <input type="text" name="user-fname" class="form-control signup-input-fields" id="signup-firstname" placeholder="Enter the first name">

                                    <label>Last name </label>
                                    <label class="lbl-signup-errors" id="lbl-signup-lname-error"></label>
                                    <input type="text" name="user-lname" class="form-control signup-input-fields" id="signup-lastname" placeholder="Enter the last name">

                                    <label>Email </label>
                                    <label class="lbl-signup-errors" id="lbl-signup-email-error"></label>
                                    <input type="email" name="user-email" class="form-control signup-input-fields" id="signup-email" placeholder="Enter the email">

                                    <label>Contact no </label>
                                    <label class="lbl-signup-errors" id="lbl-signup-contactno-error"></label>
                                    <input type="text" name="user-contactno" class="form-control signup-input-fields" id="signup-contactno" placeholder="Enter the contact no. Eg: 0771234567">
                                </div>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
                                        <span class="glyphicon glyphicon-lock" style="padding-right: 5px;"></span>Account Details</a>
                                </h4>
                            </div>
                            <div id="collapse2" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <label>User name </label>
                                    <label class="lbl-signup-errors" id="lbl-signup-username-error"></label>
                                    <input type="text" name="user-username" class="form-control signup-input-fields" id="user-username" placeholder="Enter a user name">

                                    <label>Password </label>
                                    <label class="lbl-signup-errors" id="lbl-signup-password-error"></label>
                                    <input type="password" name="user-password" class="form-control signup-input-fields" id="signup-password" placeholder="Enter a password">

                                    <label>Re-type password </label>
                                    <label class="lbl-signup-errors" id="lbl-signup-repassword-error"></label>
                                    <input type="password" name="user-repassword" class="form-control signup-input-fields" id="signup-repassword" placeholder="Re enter password">

                                    <label>Group </label>
                                    <label class="lbl-signup-errors" id="lbl-signup-repassword-error"></label>
                                    <div class="form-group">
                                        <select class="form-control" id="user-group" name="user-group">
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <a class="btn btn-primary btn-signupfrm" id="btn-adduser-cancel" data-dismiss="modal">Cancel</a>
                <a class="btn btn-success btn-signupfrm" id="btn-adduser-ok">Add user</a>
            </div></form>
        </div>
    </div>
</div>
<!-- End add user modal -->

<!-- Start-Validation error popup -->
<div id="modal-validation-error-popup" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title"><img src="../../images/icons/error.png" class="popup-icons">&nbsp;&nbsp;Validation Error</h4>
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
<!-- End-Validation error popup -->

<!-- Start-Popup for user adding confirmation -->
<div id="modal-addUser-ConfirmPopup" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <img class="header-icons" src="../../images/icons/user-add-confirm.png"/>
                <h3 class="modal-title header-panel">&nbsp;Confirm Details</h3>
            </div>
            <div class="modal-body">
                <p id="dat" style="text-align: left; display: block;">
                    Please make sure the entered details are correct. Click confirm
                    to add the new staff member or click cancel to go back.
                </p>

                <div style="text-align: left; display: block;"><label id="lblFname"></label></div>
                <div style="text-align: left; display: block;"><label id="lblLname"></label></div>               
                <div style="text-align: left; display: block;"><label id="lblEmail"></label></div>
                <div style="text-align: left; display: block;"><label id="lblTel"></label></div>
                <div style="text-align: left; display: block;"><label id="lblUsrname"></label></div>
                <div style="text-align: left; display: block;"><label id="lblGroup"></label></div>
            </div>
            <div class="modal-footer">                
                <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                <button class="btn btn-success" id="addUserOk">Confirm</button>
            </div>
        </div>
    </div>
</div>
<!-- End-Popup for user adding confirmation -->

<!-- Start-Add user success message popup -->
<div id="modal-addUserSuccess" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <img class="header-icons" src="../../images/icons/customer-add-success.png"/>
                <h3 class="modal-title header-panel">&nbsp;Confirm Details</h3>
            </div>
            <div class="modal-body">
                <p>New staff member added to the database successfully.
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
</div>
<!-- Start-Add user success message popup -->

<!-- Start-Add user failed message popup -->
<div id="modal-addUserFail" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <img class="header-icons" src="../../images/icons/customer-add-error.png"/>
                <h3 class="modal-title header-panel">&nbsp;Error Occurred</h3>
            </div>
            <div class="modal-body">
                <p>
                    <strong>Some error occurred during adding the new staff member.</strong>
                    <br>Please try again later. If the issue persists, please contact the system
                    administrator.
                    <br>Sorry for the inconvenience.
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
</div>
<!-- End-Add user failed message popup -->

<!-- Start-Delete user confirm popup -->
<div id="modal-deleteUserPopup" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <img class="header-icons" src="../../images/icons/user-remove-confirm.png"/>
                <h3 class="modal-title header-panel">&nbsp;Remove Staff Member</h3>
            </div>
            <div class="modal-body">
                <p>Do you want to remove the selected user from database?
                </p>
                <div><label id="lbFname" style="text-align: left; display: block;"></label></div>
                <div><label id="lbLname" style="text-align: left; display: block;"></label></div>
                <div><label id="lbUsrname" style="text-align: left; display: block;"></label></div>
                <div><label id="lbEmail" style="text-align: left; display: block;"></label></div>
                <div><label id="lbTel" style="text-align: left; display: block;"></label></div>
                <div><label id="lbGroup" style="text-align: left; display: block;"></label></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                <button class="btn btn-danger" id="deleteUserOk">Delete</button>
            </div>
        </div>
    </div>
</div>
<!-- End-Delete user confirm popup -->

<!-- Start-Delete user success message popup -->
<div id="modal-deleteUserSuccess" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <img class="header-icons" src="../../images/icons/user-remove.png"/>
                <h3 class="modal-title header-panel">&nbsp;Customer Removed</h3>
            </div>
            <div class="modal-body">
                <p>Staff member record remove from the database successfully.
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
</div>
<!-- End-Delete user success message popup -->

<!-- Start-Delete user failed message popup -->
<div id="modal-deleteUserFail" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <img class="header-icons" src="../../images/icons/customer-add-error.png"/>
                <h3 class="modal-title header-panel">&nbsp;Error Occurred</h3>
            </div>
            <div class="modal-body">
                <p>
                    <strong>Some error occurred during removing the staff member.</strong>
                    <br>Please try again later. If the issue persists, please contact the system
                    administrator.
                    <br>Sorry for the inconvenience.
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
</div>
<!-- End-Delete user failed message popup -->

<!-- Start Update modal -->
<div class="modal fade" id="modal-user-update">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <img class="header-icons" src="../../images/icons/customer-update.ico"/>
                <h3 class="modal-title header-panel">&nbsp;Update Staff Member</h3>                
                <?php
                if ($_SESSION['group'] == "Admin") {
                    echo '<button class="btn btn-warning btn-sm" id="btn-reset-password"><i class="glyphicon glyphicon-refresh"></i> Reset Password</button>';
                }
                ?>
            </div>
            <div class="modal-body">
                <form id="form-updateuser">
                    <label>First name </label>
                    <label class="lbl-signup-errors" id="lbl-update-fname-error"></label>
                    <input type="text" name="update-fname" class="form-control update-input-fields" id="update-firstname" placeholder="Enter the first name">

                    <label>Last name </label>
                    <label class="lbl-signup-errors" id="lbl-update-lname-error"></label>
                    <input type="text" name="update-lname" class="form-control update-input-fields" id="update-lastname" placeholder="Enter the last name">

                    <label>Email </label>
                    <label class="lbl-signup-errors" id="lbl-update-email-error"></label>
                    <input type="email" name="update-email" class="form-control update-input-fields" id="update-email" placeholder="Enter the email">

                    <label>Contact no </label>
                    <label class="lbl-signup-errors" id="lbl-update-contactno-error"></label>
                    <input type="text" name="update-contactno" class="form-control update-input-fields" id="update-contactno" placeholder="Enter the contact no. Eg: 0771234567">

                    <label>User name </label>
                    <label class="lbl-signup-errors" id="lbl-update-username-error">username can not be changed</label>
                    <input type="text" name="update-username" class="form-control update-input-fields" id="update-username" disabled>

                    <label>Group </label>
                    <div class="form-group">
                        <select class="form-control" id="update-user-group" name="update-group">

                        </select>
                    </div>

                </form>
                <div class="modal-footer">
                    <a class="btn btn-primary btn-signupfrm" id="btn-updateUser-cancel" data-dismiss="modal">Cancel</a>
                    <a class="btn btn-success btn-signupfrm" id="btn-updateUser-ok">Update user</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Update modal -->

<!-- Start Reset Password modal -->
<div class="modal fade" id="modal-reset-password">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <img class="header-icons" src="../../images/icons/Forgotten-Password.png"/>
                <h3 class="modal-title header-panel">&nbsp;Reset Password</h3>
            </div>
            <div class="modal-body">
                Reset the password of user: <label id="lbl-resetpass-username"></label>
                <label class="lbl-signup-errors" id="lbl-reset-password-error"></label>
                <form id="form-updatecustomer">
                    <label>New password </label>
                    <label class="lbl-signup-errors" id="lbl-update-password-error"></label>
                    <input type="password" name="user-fname" class="form-control update-input-fields" id="update-password" placeholder="Enter a new password">

                    <label>Re-type new password </label>
                    <label class="lbl-signup-errors" id="lbl-update-repassword-error"></label>
                    <input type="password" name="user-lname" class="form-control update-input-fields" id="update-repassword" placeholder="Re-type the new password">

                    <div class="modal-footer">
                        <a class="btn btn-primary btn-signupfrm" id="btn-resetPass-cancel" data-dismiss="modal">Cancel</a>
                        <a class="btn btn-success btn-signupfrm" id="btn-resetPass-ok">Reset password</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Reset Password modal -->

<!-- Start-Reset Password success message popup -->
<div id="modal-resetPasswordSuccess" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <img class="header-icons" src="../../images/icons/success-icon.png"/>
                <h3 class="modal-title header-panel">&nbsp;Password Reset Success</h3>
            </div>
            <div class="modal-body">
                <p>New password has assigned to the staff member successfully.
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
</div>
<!-- End-Reset Password success message popup -->

<!-- Start-Update success message popup -->
<div id="modal-updateSuccess" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <img class="header-icons" src="../../images/icons/success-icon.png"/>
                <h3 class="modal-title header-panel">&nbsp;Update Success</h3>
            </div>
            <div class="modal-body">
                <p>User data updated successfully.
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
</div>
<!-- End-Update success message popup -->

<!-- Start-Update user failed message popup -->
<div id="modal-updateUserFail" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <img class="header-icons" src="../../images/icons/customer-add-error.png"/>
                <h3 class="modal-title header-panel">&nbsp;Error Occurred</h3>
            </div>
            <div class="modal-body">
                <p>
                    <strong>Some error occurred during updating the user.</strong>
                    <br>Please try again later. If the issue persists, please contact the system
                    administrator.
                    <br>Sorry for the inconvenience.
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
</div>
<!-- End-Update user failed message popup -->