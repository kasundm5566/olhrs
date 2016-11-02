var background_color = "#fde99c";

$(document).ready(function () {
    
    $("#hall-reserv-tel-error").hide();
    $("#hall-reserv-pax-error").hide();
    $("#hall-reserv-advance-error").hide();

    $("#hall-reserv-tel").keyup(function () {
        validateContactNo($("#hall-reserv-tel"));
    });
    $("#hall-reserv-tel").focusout(function () {
        validateContactNo($("#hall-reserv-tel"));
    });


    $("#hall-pax").keyup(function () {
        validatePax($("#hall-pax"));
    });
    $("#hall-pax").focusout(function () {
        validatePax($("#hall-pax"));
    });


    $("#hall-advpay").keyup(function () {
        validateAdvancePayment($("#hall-advpay"));
    });
    $("#hall-advpay").focusout(function () {
        validateAdvancePayment($("#hall-advpay"));
    });


});


// Validate the tel no
function validateContactNo(field) {
    if ($(field).val().length != 10) {
        $(field).css("background-color", background_color);
        $("#hall-reserv-tel-error").show();
        $("#hall-reserv-tel-error").text("Please enter contact no.");
        return false;
    } else {
        var inputVal = $(field).val();
        var telReg = /^0[^0]\d+$/;
        if (!telReg.test(inputVal)) {
            $(field).css("background-color", background_color);
            $("#hall-reserv-tel-error").text("Invalid contact no.");
            return false;
        } else {
            $(field).css("background-color", "white");
            $("#hall-reserv-tel-error").hide();
        }
    }
}

// Validate the pax
function validatePax(field) {
    if ($(field).val() < 100 || $(field).val() > 250) {
        $(field).css("background-color", background_color);
        $("#hall-reserv-pax-error").show();
        $("#hall-reserv-pax-error").text("Pax should be within 100-250.");
        return false;
    } else {
        var inputVal = $(field).val();
        var telReg = /^[^0]\d+$/;
        if (!telReg.test(inputVal)) {
            $(field).css("background-color", background_color);
            $("#hall-reserv-pax-error").show();
            $("#hall-reserv-pax-error").text("Invalid pax amount.");
            return false;
        } else {
            $(field).css("background-color", "white");
            $("#hall-reserv-pax-error").hide();
        }
    }
}

// Validate the advance payment
function validateAdvancePayment(field) {
    if ($(field).val() < 20000) {
        $(field).css("background-color", background_color);
        $("#hall-reserv-advance-error").show();
        $("#hall-reserv-advance-error").text("Advance payment should be greater than Rs.20000.");
        return false;
    } else {
        var inputVal = $(field).val();
        var telReg = /^[^0]\d+$/;
        if (!telReg.test(inputVal)) {
            $(field).css("background-color", background_color);
            $("#hall-reserv-advance-error").show();
            $("#hall-reserv-advance-error").text("Invalid amount.");
            return false;
        } else {
            $(field).css("background-color", "white");
            $("#hall-reserv-advance-error").hide();
        }
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

function validateAll() {
    var isTelValid = validateContactNo($("#hall-reserv-tel"));
    var isPaxValid = validatePax($("#hall-pax"));
    var isPayValid = validateAdvancePayment($("#hall-advpay"));

    if (isTelValid == false || isPaxValid == false || isPayValid == false) {
        return false;
    } else {
        return true;
    }
}