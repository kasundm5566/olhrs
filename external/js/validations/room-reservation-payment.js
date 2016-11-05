var background_color = "#fde99c";

$(document).ready(function () {
    $("#room-reserv-payamount-error").hide();
    $("#room-payAmount").css("background-color", "white");
});

function validatePaymentAmount() {
    var amount = $("#room-payAmount").val();
    var total = $("#room-total").val();
    if (total > 10000) {
        var min = total * 30 / 100;
        if (amount < min) {
            $("#room-reserv-payamount-error").show();
            $("#room-reserv-payamount-error").text("Minimum of " + min + " should pay.");
            $("#room-payAmount").css("background-color", background_color);
            return false;
        } else {
            $("#room-reserv-payamount-error").hide();
            $("#room-payAmount").css("background-color", "white");
            return true;
        }
    }
}