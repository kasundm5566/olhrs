var background_color = "#fde99c";

$(document).ready(function () {
    $("#check-room-avail-div").hide();

    $("input[type=radio][name=optradio]").change(function () {
        var selectedVal = $("input[type=radio][name=optradio]:checked").val();
        if (selectedVal == "halls") {
            $("#check-room-avail-div").hide();
            $("#check-hall-avail-div").show();
        } else {
            $("#check-hall-avail-div").hide();
            $("#check-room-avail-div").show();
        }
    });

    $("#rec-btn-checkroomavail").click(function () {
        var isValid = validateRoomReservationDates();
        if (isValid != false) {
            $.ajax({
                type: 'GET',
                url: "../../dao/room_reservations/get_available_rooms.php",
                data: {"check-in": $("#room-in-date").val(), "check-out": $("#room-out-date").val()},
                success: function (result) {
                    $("#div-available-room-det").html(result);
                },
                error: function (jqXHR, textStatus, errorThrown) {
                }
            });
            return false;
        } else {
            return false;
        }
    });
});

function validateRoomReservationDates() {
    if (validateInDate() == false || validateOutDate() == false || validateBothDates() == false) {
        return false;
    } else {
        return true;
    }
}

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

function validateBothDates() {
    var inDate = $("#room-in-date").val();
    var outDate = $("#room-out-date").val();

    if (new Date(inDate) >= new Date(outDate))
    {
        $("#room-in-date").css("background-color", background_color);
        $("#room-reserv-intime-error").show();
        $("#room-reserv-intime-error").text("Check in date should not be less than or equal to check out time.");
        return false;
    } else {
        $("#room-reserv-intime-error").hide();
        $("#room-in-date").css("background-color", "white");
        return true;
    }
}

function validateHallReservationDate() {
    if ($("#hall-date").val().length == 0) {
        $("#hall-date").css("background-color", background_color);
        $("#hall-reserv-date-error").show();
        $("#hall-reserv-date-error").text("Please select a date.");
        return false;
    } else {
        $("#hall-date").css("background-color", "white");
        $("#hall-reserv-date-error").hide();
        return true;
    }
}