function validateRoomReservationDates() {
    if (validateInDate() == false || validateOutDate() == false) {
        return false;
    } else {
        return true;
    }
}

function validateInDate() {
    if ($("#room-in-date").val().length == 0) {
        $("#room-in-date").css("background-color", background_color);
        return false;
    } else {
        $("#room-in-date").css("background-color", "white");
        return true;
    }
}

function validateOutDate() {
    if ($("#room-out-date").val().length == 0) {
        $("#room-out-date").css("background-color", background_color);
        return false;
    } else {
        $("#room-in-date").css("background-color", "white");
        return true;
    }
}