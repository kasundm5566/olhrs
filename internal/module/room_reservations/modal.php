<!-- Start-Reservation cancel confirm popup -->
<div id="modal-cancelRoomConfirm" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <img class="header-icons" src="../../images/icons/Warning.png"/>
                <h3 class="modal-title header-panel">Confirm Cancellation</h3>
            </div>
            <div class="modal-body">
                <p>You are about to cancel the reservation.<br>
                    <strong>This process can not be roll back. Do you really want to continue?</strong>
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">No</button>
                <button class="btn btn-danger" id="roomCancelOk">Yes</button>
            </div>
        </div>
    </div>
</div>
<!-- End-Reservation cancel confirm popup -->

<!-- Start-success message popup -->
<div id="modal-cancelSuccess" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <img class="header-icons" src="../../images/icons/success-icon.png"/>
                <h3 class="modal-title header-panel">&nbsp;Cancellation Success</h3>
            </div>
            <div class="modal-body">
                <p>Reservation cancelled successfully...
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
</div>
<!-- Start-success message popup -->