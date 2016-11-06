$(document).ready(function () {
    $("#check-room-balance").hide();

    $("input[type=radio][name=optradio]").change(function () {
        var selectedVal = $("input[type=radio][name=optradio]:checked").val();
        if (selectedVal == "halls") {
            $("#check-room-balance").hide();
            $("#check-hall-balance").show();
        } else {
            $("#check-hall-balance").hide();
            $("#check-room-balance").show();
        }
    });

    $("#btn-check-hallBalance").click(function () {
        var isValid = validateHallReservationDate();
        if (isValid != false) {
            var date = $("#hall-date").val();
            var hall = $("#sel-hall").val();
            var time = $("#sel-session").val();
            $.ajax({
                type: 'GET',
                url: "../../dao/payments/get_hall_reservation_balance.php",
                data: {"date": date, "hall": hall, "time": time},
                success: function (result) {
                    $("#div-hall-payment-balance").html(result);
                },
                error: function (jqXHR, textStatus, errorThrown) {
                }
            });
            return false;
        } else {
            return false;
        }
    });

    $("#btn-check-roomBalance").click(function () {
        var isValid = validateRoomReservationDates();
        ;
        if (isValid != false) {
            var checkIn = $("#room-in-date").val();
            var checkOut = $("#room-out-date").val();
            var roomType = $("#sel-room-type").val();
            $.ajax({
                type: 'GET',
                url: "../../dao/payments/get_room_reservation_balance.php",
                data: {"checkIn": checkIn, "checkOut": checkOut, "roomType": roomType},
                success: function (result) {
                    $("#div-room-payment-balance").html(result);
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