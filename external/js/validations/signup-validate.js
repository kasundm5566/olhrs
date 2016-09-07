var background_color = "#fde99c";

$(document).ready(function () {
    $("#signup-firstname").focusout(function () {
        validateFirstName($("#signup-firstname"), $("#lbl-signup-fname-error"));
    });
    $("#signup-firstname").keyup(function () {
        validateFirstName($("#signup-firstname"), $("#lbl-signup-fname-error"));
    });

    $("#signup-lastname").focusout(function () {
        validateLastName($("#signup-lastname"), $("#lbl-signup-lname-error"));
    });
    $("#signup-lastname").keyup(function () {
        validateLastName($("#signup-lastname"), $("#lbl-signup-lname-error"));
    });

    $("#signup-email").focusout(function () {
        validateEmail($("#signup-email"), $("#lbl-signup-email-error"));
    });
    $("#signup-email").keyup(function () {
        validateEmail($("#signup-email"), $("#lbl-signup-email-error"));
    });

    $("#signup-contactno").focusout(function () {
        validateContactNo($("#signup-contactno"), $("#lbl-signup-contactno-error"));
    });
    $("#signup-contactno").keyup(function () {
        validateContactNo($("#signup-contactno"), $("#lbl-signup-contactno-error"));
    });

    $("#signup-password").focusout(function () {
        validatePassword($("#signup-password"), $("#lbl-signup-password-error"));
    });
    $("#signup-password").keyup(function () {
        validatePassword($("#signup-password"), $("#lbl-signup-password-error"));
    });

    $("#signup-repassword").focusout(function () {
        validateRetypedPass($("#signup-repassword"), $("#lbl-signup-repassword-error"), $("#signup-password"));
    });
    $("#signup-repassword").keyup(function () {
        validateRetypedPass($("#signup-repassword"), $("#lbl-signup-repassword-error"), $("#signup-password"));
    });

    $("#btn-signup").click(function () {
        $('#modal-signup').modal({
            backdrop: 'static',
            keyboard: false
        });
        $("#btn-signup-ok").click(function () {
            var isFirstNameValid = validateFirstName($("#signup-firstname"), $("#lbl-signup-fname-error"));
            var isLastNameValid = validateLastName($("#signup-lastname"), $("#lbl-signup-lname-error"));
            var isEmailValid = validateEmail($("#signup-email"), $("#lbl-signup-email-error"));
            var isContactNoValid = validateContactNo($("#signup-contactno"), $("#lbl-signup-contactno-error"));
            var isPasswordValid = validatePassword($("#signup-password"), $("#lbl-signup-password-error"));
            var isRetypedPasswordValid = validateRetypedPass($("#signup-repassword"), $("#lbl-signup-repassword-error"), $("#signup-password"));

            if (isFirstNameValid == false || isLastNameValid == false || isEmailValid == false || isContactNoValid == false || isPasswordValid == false || isRetypedPasswordValid == false) {
                $("#validation-error-popup").modal("show");
                return false;
            } else {
                alert("ok");
            }
        });
    });


});

// Validate the first name
function validateFirstName(field, error_field) {
    if ($(field).val().length == 0) {
        $(error_field).show();
        $(field).css("background-color", background_color);
        $(error_field).text("Name should not be empty.");
        return false;
    } else {
        var inputVal = $(field).val();
        var numericReg = /^[a-zA-Z]+$/;
        if (!numericReg.test(inputVal)) {
            $(error_field).show();
            $(field).css("background-color", background_color);
            $(error_field).text("Invalid name. Only alphabetic characters without spaces allowed.");
            return false;
        } else {
            $(field).css("background-color", "white");
            $(error_field).hide();
        }
    }
}

// Validate the last name
function validateLastName(field, error_field) {
    if ($(field).val().length == 0) {
        $(field).css("background-color", "white");
        $(error_field).hide();
    } else {
        var inputVal = $(field).val();
        var numericReg = /^[a-zA-Z]+$/;
        if (!numericReg.test(inputVal)) {
            $(error_field).show();
            $(field).css("background-color", background_color);
            $(error_field).text("Invalid last name. Only alphabetic characters without spaces allowed.");
            return false;
        } else {
            $(field).css("background-color", "white");
            $(error_field).hide();
        }
    }
}

//Validate the email address
function validateEmail(field, error_field) {
    if ($(field).val().length == 0) {
        $(error_field).show();
        $(field).css("background-color", background_color);
        $(error_field).text("Email should not be empty.");
        return false;
    } else {
        var inputVal = $(field).val();
        var emailReg = /[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$/;
        if (!emailReg.test(inputVal)) {
            $(error_field).show();
            $(field).css("background-color", background_color);
            $(error_field).text("Please enter a valid email.");
            return false;
        } else {
            $(field).css("background-color", "white");
            $(error_field).hide();
        }
    }
}

// Validate the tel no
function validateContactNo(field, error_field) {
    if ($(field).val().length != 10) {
        $(error_field).show();
        $(field).css("background-color", background_color);
        $(error_field).text("Telephone no should contain 11 characters without the leading zero.");
        return false;
    } else {
        var inputVal = $(field).val();
        var telReg = /^0[^0]\d+$/;
        if (!telReg.test(inputVal)) {
            $(error_field).show();
            $(field).css("background-color", background_color);
            $(error_field).text("Please enter a valid telephone no.");
            return false;
        } else {
            $(field).css("background-color", "white");
            $(error_field).hide();
        }
    }
}

// Validate the password
function validatePassword(field, error_field) {
    if ($(field).val().length > 7 && $(field).val().length < 17) {
        var inputVal = $(field).val();
        var oneDigit = /^(?=.*\d).+$/;
        var oneSpecChar = /^(?=.*[_\W]).+$/;
        if (!oneDigit.test(inputVal)) {
            $(error_field).show();
            $(field).css("background-color", background_color);
            $(error_field).text("Password should contain at least one digit.");
            return false;
        } else if (!oneSpecChar.test(inputVal)) {
            $(error_field).show();
            $(field).css("background-color", background_color);
            $(error_field).text("Password should contain at least one special character.");
            return false;
        } else {
            $(field).css("background-color", "white");
            $(error_field).hide();
        }
    } else {
        $(error_field).text("Password length should be in between 8 to 16.");
        $(field).css("background-color", background_color);
        $(error_field).show();
        return false;
    }
}

// Validate the re-typed password
function validateRetypedPass(field, error_field, entered_password) {
    if ($(field).val().length == 0) {
        $(error_field).show();
        $(field).css("background-color", background_color);
        $(error_field).text("Please re-type the password.");
        return false;
    } else {
        var pass = $(field).val();
        var repass = $(entered_password).val();
        if (pass != repass) {
            $(error_field).show();
            $(field).css("background-color", background_color);
            $(error_field).text("Passwords do not match.");
            return false;
        } else {
            $(field).css("background-color", "white");
            $(error_field).hide();
        }
    }
}