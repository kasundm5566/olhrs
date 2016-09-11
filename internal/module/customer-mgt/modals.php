<!-- Start Sign up modal -->
<div class="modal fade" id="modal-customer-signup">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <img class="header-icons" src="../../images/icons/signup-header-icon.png"/>
                <h3 class="modal-title header-panel">&nbsp;Add new customer</h3>
            </div>
            <div class="modal-body">
                <form id="form-addcustomer">
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
                                    <input type="text" name="customer-fname" class="form-control" id="signup-firstname" placeholder="Enter your first name">

                                    <label>Last name </label>
                                    <label class="lbl-signup-errors" id="lbl-signup-lname-error"></label>
                                    <input type="text" name="customer-lname" class="form-control" id="signup-lastname" placeholder="Enter your last name">

                                    <label>Email </label>
                                    <label class="lbl-signup-errors" id="lbl-signup-email-error"></label>
                                    <input type="email" name="customer-email" class="form-control" id="signup-email" placeholder="Enter your email">

                                    <label>Contact no </label>
                                    <label class="lbl-signup-errors" id="lbl-signup-contactno-error"></label>
                                    <input type="text" name="customer-contactno" class="form-control" id="signup-contactno" placeholder="Enter your contact no. Eg: ">
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
                                    <label>User name </label>
                                    <label class="lbl-signup-errors" id="lbl-signup-username-error"></label>
                                    <input type="text" name="customer-username" class="form-control" id="signup-username" placeholder="Enter a user name">

                                    <label>Password </label>
                                    <label class="lbl-signup-errors" id="lbl-signup-password-error"></label>
                                    <input type="password" name="customer-password" class="form-control" id="signup-password" placeholder="Enter a password">

                                    <label>Re-type password </label>
                                    <label class="lbl-signup-errors" id="lbl-signup-repassword-error"></label>
                                    <input type="password" name="customer-repassword" class="form-control" id="signup-repassword" placeholder="Re enter your password">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <a class="btn btn-primary btn-signupfrm" data-dismiss="modal">Cancel</a>
                <a class="btn btn-success btn-signupfrm" id="btn-addcustomer-ok">Add customer</a>
            </div>
        </div>
    </div>
</div>
<!-- End Sign up modal -->

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

<!-- Start-Popup for customer adding confirmation -->
<div id="modal-addCustomer-ConfirmPopup" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <img class="header-icons" src="../../images/icons/customer-add-confirm.png"/>
                <h3 class="modal-title header-panel">&nbsp;Confirm details</h3>
            </div>
            <div class="modal-body">
                <p id="dat" style="text-align: left; display: block;">
                    Please make sure the entered details are correct. Click confirm
                    to add the new customer or click cancel to go back.
                </p>

                <div style="text-align: left; display: block;"><label id="lblFname"></label></div>
                <div style="text-align: left; display: block;"><label id="lblLname"></label></div>               
                <div style="text-align: left; display: block;"><label id="lblEmail"></label></div>
                <div style="text-align: left; display: block;"><label id="lblTel"></label></div>
                <div style="text-align: left; display: block;"><label id="lblUsrname"></label></div>
            </div>
            <div class="modal-footer">                
                <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                <button class="btn btn-success" id="addCustOk">Confirm</button>
            </div>
        </div>
    </div>
</div>
<!-- End-Popup for customer adding confirmation -->

<!-- Start-Add customer success message popup -->
<div id="modal-addCustomerSuccess" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <img class="header-icons" src="../../images/icons/customer-add-success.png"/>
                <h3 class="modal-title header-panel">&nbsp;Confirm details</h3>
            </div>
            <div class="modal-body">
                <p>New user added to the database successfully
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
</div>
<!-- Start-Add customer success message popup -->

<!-- Start-Add customer failed message popup -->
<div id="modal-addCustomerFail" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <img class="header-icons" src="../../images/icons/customer-add-error.png"/>
                <h3 class="modal-title header-panel">&nbsp;Error occurred</h3>
            </div>
            <div class="modal-body">
                <p>
                    <strong>Some error occurred during adding the new customer.</strong>
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
<!-- End-Add customer failed message popup -->

<!-- Start-Delete customer confirm popup -->
<div id="modal-deleteCustomerPopup" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <img class="header-icons" src="../../images/icons/customer-remove-confirm.png"/>
                <h3 class="modal-title header-panel">&nbsp;Remove customer</h3>
            </div>
            <div class="modal-body">
                <p>Do you want to remove the selected user from database?
                </p>
                <div><label id="lbFname" style="text-align: left; display: block;"></label></div>
                <div><label id="lbLname" style="text-align: left; display: block;"></label></div>
                <div><label id="lbUsrname" style="text-align: left; display: block;"></label></div>
                <div><label id="lbEmail" style="text-align: left; display: block;"></label></div>
                <div><label id="lbTel" style="text-align: left; display: block;"></label></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                <button class="btn btn-danger" id="deleteCustomerOk">Delete</button>
            </div>
        </div>
    </div>
</div>
<!-- End-Delete customer confirm popup -->

<!-- Start-Delete customer success message popup -->
<div id="modal-deleteCustomerSuccess" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <img class="header-icons" src="../../images/icons/customer-remove.png"/>
                <h3 class="modal-title header-panel">&nbsp;Customer removed</h3>
            </div>
            <div class="modal-body">
                <p>Customer record remove from the database successfully.
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
</div>
<!-- End-Delete customer success message popup -->

<!-- Start-Delete customer failed message popup -->
<div id="modal-deleteUserFail" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <img class="header-icons" src="../../images/icons/customer-add-error.png"/>
                <h3 class="modal-title header-panel">&nbsp;Error occurred</h3>
            </div>
            <div class="modal-body">
                <p>
                    <strong>Some error occurred during removing the customer.</strong>
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
<!-- End-Delete customer failed message popup -->