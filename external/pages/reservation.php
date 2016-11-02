<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-4">

        <img src="../images/icons/hall.png" width="150px" height="150px"/>
        <h3>Hall Reservation</h3>

        <form role="form" method="POST" action="operations/check-hall-availability.php" onsubmit="return validateHallReservationDate();">
            <div style="display: inline-block; padding-right: 24px;">
                Date
            </div>
            <div class="input-group" style="display: inline-block; vertical-align: middle; width: 220px;">
                <label class="lbl-errors" id="hall-reserv-date-error"></label>
                <input type="text" class="form-control" id="hall-date" name="hall-date"
                       placeholder="Select a date" readonly/>
            </div>

            <div style="margin-top: 10px;">
                <div style="display: inline-block; padding-right: 5px;">
                    Session
                </div>
                <div class="form-group" style="display: inline-block; width: 220px;">
                    <select class="form-control" id="sel1" name="session-dropdown">
                        <option value="Morning">Morning</option>
                        <option value="Evening">Evening</option>
                        <option value="Full day">Full day</option>
                    </select>
                </div>
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
        <form role="form" method="POST" action="operations/check-room-availability.php" onsubmit="return validateRoomReservationDates();">
            <div style="display: inline-block; padding-right: 15px;">
                Check in
            </div>
            <div class="input-group" style="display: inline-block; vertical-align: middle; width: 220px;">
                <label class="lbl-errors" id="room-reserv-intime-error"></label>
                <input type="text" class="form-control" id="room-in-date" name="room-in-date"
                       placeholder="Select check in date" readonly/>
            </div>

            <div style="margin-top: 10px;">
                <div style="display: inline-block; padding-right: 5px;">
                    Check out
                </div>
                <div class="input-group" style="display: inline-block; vertical-align: middle; width: 220px;">
                    <label class="lbl-errors" id="room-reserv-outtime-error"></label>
                    <input type="text" class="form-control" id="room-out-date" name="room-out-date"
                           placeholder="Select check out date" readonly/>
                </div>
            </div>

            <div style="margin-top: 10px;">
                <label class="radio-inline">
                    <input type="radio" name="radio-roomType" value="Single">Single
                </label>
                <label class="radio-inline">
                    <input type="radio" name="radio-roomType" value="Double" checked="checked">Double
                </label>
                <label class="radio-inline">
                    <input type="radio" name="radio-roomType" value="Family">Family
                </label>
                <label class="radio-inline">
                    <input type="radio" name="radio-roomType" value="Cottage">Cottage
                </label>
            </div>

            <div style="margin-top: 10px; text-align: center;">
                <input type="submit" class="btn btn-success" id="btn-checkRoomAvailability" value="Check availability">
            </div>
        </form>

        <div style="text-indent: 3px;">
            <?php
            if (isset($_REQUEST['room-status'])) {
                $decoded_msg = base64_decode($_REQUEST['room-status']);
                echo '<p class="alert-danger contactus-error" style="margin-top:15px;">'
                . '<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>';
                echo " " . $decoded_msg . '</p>';
            }
            ?>
        </div>
    </div>
</div>
<script src="../js/validations/hall-reservation.js"></script>
<script src="../js/validations/room-reservation.js"></script>