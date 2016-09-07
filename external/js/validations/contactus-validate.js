var background_color = "#fde99c";

$(document).ready(function () {
    $("#btn-contact-submit").prop('disabled', true);
//    recaptchaCallback();

    $("#txt-contactfrm-name").focusout(function () {
        validateFirstName($("#txt-contactfrm-name"), $("#lbl-contactus-name-error"));
    });
    $("#txt-contactfrm-name").keyup(function () {
        validateFirstName($("#txt-contactfrm-name"), $("#lbl-contactus-name-error"));
    });

    $("#txt-contactfrm-email").focusout(function () {
        validateEmail($("#txt-contactfrm-email"), $("#lbl-contactus-email-error"));
    });
    $("#txt-contactfrm-email").keyup(function () {
        validateEmail($("#txt-contactfrm-email"), $("#lbl-contactus-email-error"));
    });

    $("#txt-contactfrm-contactno").focusout(function () {
        validateContactNo($("#txt-contactfrm-contactno"), $("#lbl-contactus-contactno-error"));
    });
    $("#txt-contactfrm-contactno").keyup(function () {
        validateContactNo($("#txt-contactfrm-contactno"), $("#lbl-contactus-contactno-error"));
    });

    $("#txt-contactfrm-message").focusout(function () {
        validateMessage($("#txt-contactfrm-message"), $("#lbl-contactus-message-error"));
    });
    $("#txt-contactfrm-message").keyup(function () {
        validateMessage($("#txt-contactfrm-message"), $("#lbl-contactus-message-error"));
    });

    $("#btn-contact-submit").click(function () {
        var isNameValid = validateFirstName($("#txt-contactfrm-name"), $("#lbl-contactus-name-error"));
        var isEmailValid = validateEmail($("#txt-contactfrm-email"), $("#lbl-contactus-email-error"));
        var isContactNoValid = validateContactNo($("#txt-contactfrm-contactno"), $("#lbl-contactus-contactno-error"));
        var isMessageValid = validateMessage($("#txt-contactfrm-message"), $("#lbl-contactus-message-error"));

        if (isNameValid === false || isEmailValid === false || isContactNoValid === false || isMessageValid === false) {
            $("#validation-error-popup").modal("show");
            return false;
        }
    });
});

function recaptchaCallback() {
    if (grecaptcha.getResponse().length === 0) {
        $("#btn-contact-submit").prop('disabled', true);
    } else {
        $("#btn-contact-submit").prop('disabled', false);
    }
}

function validateMessage(field, error_field) {
    if ($(field).val().length == 0) {
        $(error_field).show();
        $(field).css("background-color", background_color);
        $(error_field).text("Message should not be empty.");
        return false;
    } else {
        $(field).css("background-color", "white");
        $(error_field).hide();
    }
}
