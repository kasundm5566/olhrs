var background_color = "#fde99c";
function validateMakePaymentAmount() {
    var inputVal = $("#make-payment-amount").val();
    var telReg = /^[^0]\d+$/;
    if (!telReg.test(inputVal)) {
        $("#make-payment-amount").css("background-color", background_color);
        $("#make-payment-error").show();
        $("#make-payment-error").text("Invalid amount.");
        return false;
    }else if($("#make-payment-amount").val() > $("#due-amount-hdn").val()){
        $("#make-payment-error").show();
        $("#make-payment-error").text("Payment should be less than the due amount.");
        return false;
    } else {
        $("#make-payment-error").hide();
        return true;
    }
}