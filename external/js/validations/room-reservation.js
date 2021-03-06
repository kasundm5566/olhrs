var background_color = "#fde99c";

// Validate date fields
function validateRoomReservationDates() {
    if (validateInDate() == false || validateOutDate() == false || validateBothDates() == false) {
        return false;
    } else {
        return true;
    }
}

// Validate check in date
function validateInDate() {
    if ($("#room-in-date").val().length == 0) {
        $("#room-in-date").css("background-color", background_color);
        $("#room-reserv-intime-error").show();
        $("#room-reserv-intime-error").text("Please select a date.");
        return false;
    } else {
        $("#room-reserv-intime-error").hide();
        $("#room-in-date").css("background-color", "white");
        return true;
    }
}

// Validate check out date
function validateOutDate() {
    if ($("#room-out-date").val().length == 0) {
        $("#room-out-date").css("background-color", background_color);
        $("#room-reserv-outtime-error").show();
        $("#room-reserv-outtime-error").text("Please select a date.");
        return false;
    } else {
        $("#room-reserv-outtime-error").hide();
        $("#room-out-date").css("background-color", "white");
        return true;
    }
}

// Validate the date difference between check in and check out dates.
// Check in date should not be less than check out date.
function validateBothDates() {
    var inDate = $("#room-in-date").val();
    var outDate = $("#room-out-date").val();

    if (new Date(inDate) >= new Date(outDate))
    {
        $("#room-in-date").css("background-color", background_color);
        $("#room-reserv-intime-error").show();
        $("#room-reserv-intime-error").text("Check in date should not be less than equal to check out time.");
        return false;
    } else {
        $("#room-reserv-intime-error").hide();
        $("#room-in-date").css("background-color", "white");
        return true;
    }
}