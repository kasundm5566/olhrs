var background_color = "#fde99c";

$(document).ready(function () {

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
        return false;
    } else {
        var inputVal = $(field).val();
        var telReg = /^0[^0]\d+$/;
        if (!telReg.test(inputVal)) {
            $(field).css("background-color", background_color);
            return false;
        } else {
            $(field).css("background-color", "white");
        }
    }
}

// Validate the pax
function validatePax(field) {
    if ($(field).val() < 100 || $(field).val() > 250) {
        $(field).css("background-color", background_color);
        return false;
    } else {
        var inputVal = $(field).val();
        var telReg = /^[^0]\d+$/;
        if (!telReg.test(inputVal)) {
            $(field).css("background-color", background_color);
            return false;
        } else {
            $(field).css("background-color", "white");
        }
    }
}

// Validate the advance payment
function validateAdvancePayment(field) {
    if ($(field).val() < 50000) {
        $(field).css("background-color", background_color);
        return false;
    } else {
        var inputVal = $(field).val();
        var telReg = /^[^0]\d+$/;
        if (!telReg.test(inputVal)) {
            $(field).css("background-color", background_color);
            return false;
        } else {
            $(field).css("background-color", "white");
        }
    }
}

function validateHallReservationDate() {
    if ($("#hall-date").val().length == 0) {
        $("#hall-date").css("background-color", background_color);
        return false;
    }else{
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