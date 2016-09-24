<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-4">

        <img src="../images/icons/hall.png" width="150px" height="150px"/>
        <h3>Hall Reservation</h3>

        <form method="POST" action="operations/check-hall-availability.php">
            <div style="display: inline-block; padding-right: 15px;">
                Select a date
            </div>
            <div class="input-group" style="display: inline-block; vertical-align: middle; width: 220px;">
                <input type="text" class="form-control" id="hall-date" name="hall-date"
                       placeholder="Select a date" readonly/>
            </div>

            <div style="margin-top: 10px; text-align: center;">
                <input type="submit" class="btn btn-success" id="btn-checkHallAvailability" value="Check availability">
            </div>
        </form>

        <div style="text-indent: 3px;">
            <?php
                if (isset($_REQUEST['status'])) {
                    $decoded_msg = base64_decode($_REQUEST['status']);
                    echo '<p class="alert-danger contactus-error" style="margin-top:15px;">'
                    . '<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>';
                    echo " " . $decoded_msg . '</p>';
                }
            ?>
        </div>
    </div>
    <div class="col-md-1"></div>
    <div class="col-md-4">
        <img src="../images/icons/room.png" width="150px" height="150px"/>
        <h3>Room Reservation</h3>
        <form>
            <div style="display: inline-block; padding-right: 15px;">
                Check in
            </div>
            <div class="input-group" style="display: inline-block; vertical-align: middle; width: 220px;">
                <input type="text" class="form-control" id="room-in-date" name="room-in-date"
                       placeholder="Select check in date" readonly/>
            </div>

            <div style="margin-top: 10px;">
                <div style="display: inline-block; padding-right: 5px;">
                    Check out
                </div>
                <div class="input-group" style="display: inline-block; vertical-align: middle; width: 220px;">
                    <input type="text" class="form-control" id="room-out-date" name="room-out-date"
                           placeholder="Select check out date" readonly/>
                </div>
            </div>

            <div style="margin-top: 10px; text-align: center;">
                <input type="submit" class="btn btn-success" id="btn-checkRoomAvailability" value="Check availability">
            </div>
        </form>
    </div>
</div>