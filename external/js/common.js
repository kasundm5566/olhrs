function resetFields(error_fields, input_fields) {
    $(error_fields).text("");
    $(input_fields).val("");
    $(input_fields).css("background-color", "white");
}
function validateForgotPassForm() {
    var isUsernameFieldValid = false;
    var background_color = "#fde99c";

    if ($("#forgotpass-username").val().length == 0) {
        $("#lbl-username-error").show();
        $("#lbl-username-error").text("Username should nt be empty.");
        $("#forgotpass-username").css("background-color", background_color);
        isUsernameFieldValid = false;
    } else {
        $("#lbl-username-error").hide();
        $("#forgotpass-username").css("background-color", "white");
        isUsernameFieldValid = true;
    }

    var isEmailFieldValid = validateEmail($("#forgotpass-email"), $("#lbl-email-error"));
    if (isUsernameFieldValid == false || isEmailFieldValid == false) {
        return false;
    } else {
        return true;
    }
}

$(document).ready(function () {
    $("#lbl-username-error").hide();
    $("#lbl-email-error").hide();

    $("#anchor-forgotpass").click(function () {
        $("#modal-forgotpass").modal('show');
        $("#forgotpass-username").val("");
        $("#forgotpass-email").val("");
    });
});