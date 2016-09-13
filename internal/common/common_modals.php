<div id="modal-commonError" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title"><img src="../../images/icons/error.png" class="popup-icons">&nbsp;&nbsp;ERROR</h4>
            </div>
            <div class="modal-body">
                <p><strong>Unexpected error occurred.</strong>
                    <br>Please try again later. If the issue persisits, please contact the system
                    administrator.
                    <br>Sorry for the inconvenience.</p>
                <p id="common-error-msg"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">OK
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Start-Logout confirm popup -->
<div id="modal-logoutConfirm" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <img class="header-icons" src="../../images/icons/logout.png"/>
                <h3 class="modal-title header-panel">Confirm Logout</h3>
            </div>
            <div class="modal-body">
                <p>You are about to logout from the system.<br>
                    <strong>Do you want to continue?</strong>
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">No</button>
                <button class="btn btn-danger" id="logoutOk">Yes</button>
            </div>
        </div>
    </div>
</div>
<!-- End-Logout confirm popup -->