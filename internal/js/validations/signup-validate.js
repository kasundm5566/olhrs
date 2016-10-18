var background_color = "#ffff80";

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

    $("#signup-username").focusout(function () {
        validateCustomerUserName($("#signup-username"), $("#lbl-signup-username-error"));
    });
    $("#signup-username").keyup(function () {
        validateCustomerUserName($("#signup-username"), $("#lbl-signup-username-error"));
    });
    
    $("#user-username").focusout(function () {
        validateStaffUserName($("#user-username"), $("#lbl-signup-username-error"));
    });
    $("#user-username").keyup(function () {
        validateStaffUserName($("#user-username"), $("#lbl-signup-username-error"));
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
    if ($(field).val().length !== 10) {
        $(error_field).show();
        $(field).css("background-color", background_color);
        $(error_field).text("Telephone no should contain 10 characters with the leading zero.");
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

// Validate the username password-customer
function validateCustomerUserName(field, error_field) {
    $(error_field).css("color", "red");
    var userName = $(field).val();
    var unameRegex = /^[a-zA-Z0-9_]+$/;
    if (userName.length == 0) {
        $(error_field).show();
        $(field).css("background-color", background_color);
        $(error_field).text("Username should not empty.");
        return false;
    } else if (userName.length <= 4) {
        $(error_field).show();
        $(field).css("background-color", background_color);
        $(error_field).text("Username should contain minimum of 5 characters.");
        return false;
    } else if (!unameRegex.test(userName)) {
        $(error_field).show();
        $(field).css("background-color", background_color);
        $(error_field).text("Username should contain any special characters.");
        return false;
    } else {
        $.ajax({
            type: 'GET',
            url: "../../dao/customer_management/customer_username_checker.php",
            data: {"username": userName},
            success: function (result) {
                if ($.trim(result) != 0) {
                    $(error_field).show();
                    $(field).css("background-color", background_color);
                    $(error_field).text("That user name is already used.");
                    return false;
                } else {
                    $(error_field).css("color", "#009900");
                    $(error_field).show();
                    $(field).css("background-color", "white");
                    $(error_field).text("User name is valid.");
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                $("#modal-commonError").modal('show');
                $("#common-error-msg").text("Error validating the username. Message: " + errorThrown);
            }
        });
    }
}

// Validate the username-staff
function validateStaffUserName(field, error_field) {
    $(error_field).css("color", "red");
    var userName = $(field).val();
    var unameRegex = /^[a-zA-Z0-9_]+$/;
    if (userName.length == 0) {
        $(error_field).show();
        $(field).css("background-color", background_color);
        $(error_field).text("Username should not empty.");
        return false;
    } else if (userName.length <= 4) {
        $(error_field).show();
        $(field).css("background-color", background_color);
        $(error_field).text("Username should contain minimum of 5 characters.");
        return false;
    } else if (!unameRegex.test(userName)) {
        $(error_field).show();
        $(field).css("background-color", background_color);
        $(error_field).text("Username should contain any special characters.");
        return false;
    } else {
        $.ajax({
            type: 'GET',
            url: "../../dao/user_management/staff_username_checker.php",
            data: {"username": userName},
            success: function (result) {
                if ($.trim(result) != 0) {
                    $(error_field).show();
                    $(field).css("background-color", background_color);
                    $(error_field).text("That user name is already used.");
                    return false;
                } else {
                    $(error_field).css("color", "#009900");
                    $(error_field).show();
                    $(field).css("background-color", "white");
                    $(error_field).text("User name is valid.");
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                $("#modal-commonError").modal('show');
                $("#common-error-msg").text("Error validating the username. Message: " + errorThrown);
            }
        });
    }
}

// Rest fields of the signup and update forms
function resetFields(error_fields, input_fields) {
    $(error_fields).text("");
    $(input_fields).val("");
    $(input_fields).css("background-color", "white");
}