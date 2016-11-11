var background_color = "#fde99c";

$(document).ready(function () {
    $("#room-reserv-payamount-error").hide();
    $("#room-payAmount").css("background-color", "white");
});

// Validate the amount going to pay
function validatePaymentAmount() {
    var amount = parseInt($("#room-payAmount").val());
    var total = parseInt($("#room-total").val());
    if (total > 10000) {
        var min = total * 30 / 100; // Minimum of 30% should pay
        if (amount < min) {
            $("#room-reserv-payamount-error").show();
            $("#room-reserv-payamount-error").text("Minimum of " + min + " should pay.");
            $("#room-payAmount").css("background-color", background_color);
            return false;
        } else if (amount > total) { // Payment amount should not exceed the total
            $("#room-reserv-payamount-error").show();
            $("#room-reserv-payamount-error").text("Payment should not be greater than the total.");
            $("#room-payAmount").css("background-color", background_color);
            return false;
        } else {
            $("#room-reserv-payamount-error").hide();
            $("#room-payAmount").css("background-color", "white");
            return true;
        }
    }
}