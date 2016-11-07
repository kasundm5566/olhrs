var background_color = "#fde99c";
var maxPax = 200;
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

    $("#hall-reserv-hall-select").change(function () {
        getMaxPax();
    })

});

function getMaxPax() {
    $.ajax({
        type: 'POST',
        url: "./dao/hall/get_hall_pax.php",
        data: {"hall-name": $("#hall-reserv-hall-select").val()},
        success: function (result) {
            maxPax = result;
        },
        error: function (jqXHR, textStatus, errorThrown) {
            $("#modal-commonError").modal('show');
            $("#common-error-msg").text("Error getting hall pax.");
        }
    });
}

// Validate the tel no
function validateContactNo(field) {
    if ($(field).val().length != 10) {
        $(field).css("background-color", background_color);
        $("#hall-reserv-tel-error").show();
        $("#hall-reserv-tel-error").text("Please enter contact no.");
        return false;
    } else {
        var inputVal = $(field).val();
        var telReg = /^0[^0]\d+$/; // Pattern should start with zero
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
    getMaxPax();
    if ($(field).val() < 100 || $(field).val() > maxPax) {
        $(field).css("background-color", background_color);
        $("#hall-reserv-pax-error").show();
        $("#hall-reserv-pax-error").text("Pax should be within 100-"+maxPax+".");
        return false;
    } else {
        var inputVal = $(field).val();
        var telReg = /^[^0]\d+$/;// Check for a numerical value
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
    if ($(field).val() < 20000) { // Minimum of Rs.20000 should pay
        $(field).css("background-color", background_color);
        $("#hall-reserv-advance-error").show();
        $("#hall-reserv-advance-error").text("Advance payment should be greater than Rs.20000.");
        return false;
    } else if ($(field).val() > parseInt($("#hall-total").val())) { // Maximum payment amount is total
        $(field).css("background-color", background_color);
        $("#hall-reserv-advance-error").show();
        $("#hall-reserv-advance-error").text("Advance payment should not be greater than the total.");
        return false;
    } else {
        var inputVal = $(field).val();
        var telReg = /^[^0]\d+$/; // Check for a numerical value
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

// Check date
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

// Check all the fields
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