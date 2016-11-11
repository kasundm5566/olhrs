var background_color = "#fde99c";

// Validate the amount when making a payment using the payment history modal
function validateMakePaymentAmount() {
    alert($("#due-amount-hdn").val());
    var inputVal = $("#make-payment-amount").val();
    alert(inputVal);
    var telReg = /^[^0]\d+$/;
    if (!telReg.test(inputVal)) {
        $("#make-payment-amount").css("background-color", background_color);
        $("#make-payment-error").show();
        $("#make-payment-error").text("Invalid amount.");
        return false;
    } else if (parseInt(inputVal) > parseInt($("#due-amount-hdn").val())) { // Amount should not be greater than the due amount
        $("#make-payment-error").show();
        $("#make-payment-error").text("Payment should be less than the due amount.");
        return false;
    } else {
        $("#make-payment-error").hide();
        return true;
    }
}