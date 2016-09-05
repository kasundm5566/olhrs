var background_color = "#fde99c";

$(document).ready(function () {
    $("#signup-firstname").focusout(function () {
        validateFirstName();
    });
    $("#signup-firstname").keyup(function () {
        validateFirstName();
    });

    $("#signup-lastname").focusout(function () {
        validateLastName();
    });
    $("#signup-lastname").keyup(function () {
        validateLastName();
    });

    $("#signup-email").focusout(function () {
        validateEmail();
    });
    $("#signup-email").keyup(function () {
        validateEmail();
    });

    $("#signup-contactno").focusout(function () {
        validateContactNo();
    });
    $("#signup-contactno").keyup(function () {
        validateContactNo();
    });

    $("#signup-password").focusout(function () {
        validatePassword();
    });
    $("#signup-password").keyup(function () {
        validatePassword();
    });
    
    $("#signup-repassword").focusout(function () {
        validateRetypedPass();
    });
    $("#signup-repassword").keyup(function () {
        validateRetypedPass();
    });
});

// Validate the first name
function validateFirstName() {
    if ($("#signup-firstname").val().length == 0) {
        $("#lbl-signup-fname-error").show();
        $("#signup-firstname").css("background-color", background_color);
        $("#lbl-signup-fname-error").text("First name should not be empty.");
        return false;
    } else {
        var inputVal = $("#signup-firstname").val();
        var numericReg = /^[a-zA-Z]+$/;
        if (!numericReg.test(inputVal)) {
            $("#lbl-signup-fname-error").show();
            $("#signup-firstname").css("background-color", background_color);
            $("#lbl-signup-fname-error").text("Invalid first name. Only alphabetic characters without spaces allowed.");
            return false;
        } else {
            $("#signup-firstname").css("background-color", "white");
            $("#lbl-signup-fname-error").hide();
        }
    }
}

// Validate the last name
function validateLastName() {
    if ($("#signup-lastname").val().length == 0) {
        $("#signup-lastname").css("background-color", "white");
        $("#lbl-signup-lname-error").hide();
    } else {
        var inputVal = $("#signup-lastname").val();
        var numericReg = /^[a-zA-Z]+$/;
        if (!numericReg.test(inputVal)) {
            $("#lbl-signup-lname-error").show();
            $("#signup-lastname").css("background-color", background_color);
            $("#lbl-signup-lname-error").text("Invalid last name. Only alphabetic characters without spaces allowed.");
            return false;
        } else {
            $("#signup-lastname").css("background-color", "white");
            $("#lbl-signup-lname-error").hide();
        }
    }
}

//Validate the email address
function validateEmail() {
    if ($("#signup-email").val().length == 0) {
        $("#lbl-signup-email-error").show();
        $("#signup-email").css("background-color", background_color);
        $("#lbl-signup-email-error").text("Email should not be empty.");
        return false;
    } else {
        var inputVal = $("#signup-email").val();
        var emailReg = /[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$/;
        if (!emailReg.test(inputVal)) {
            $("#lbl-signup-email-error").show();
            $("#signup-email").css("background-color", background_color);
            $("#lbl-signup-email-error").text("Please enter a valid email.");
            return false;
        } else {
            $("#signup-email").css("background-color", "white");
            $("#lbl-signup-email-error").hide();
        }
    }
}

// Validate the tel no
function validateContactNo() {
    if ($("#signup-contactno").val().length != 10) {
        $("#lbl-signup-contactno-error").show();
        $("#signup-contactno").css("background-color", background_color);
        $("#lbl-signup-contactno-error").text("Telephone no should contain 11 characters without the leading zero.");
        return false;
    } else {
        var inputVal = $("#signup-contactno").val();
        var telReg = /^0[^0]\d+$/;
        if (!telReg.test(inputVal)) {
            $("#lbl-signup-contactno-error").show();
            $("#signup-contactno").css("background-color", background_color);
            $("#lbl-signup-contactno-error").text("Please enter a valid telephone no.");
            return false;
        } else {
            $("#signup-contactno").css("background-color", "white");
            $("#lbl-signup-contactno-error").hide();
        }
    }
}

// Validate the password
function validatePassword() {
    if ($("#signup-password").val().length > 7 && $("#signup-password").val().length < 17) {
        var inputVal = $("#signup-password").val();
        var oneDigit = /^(?=.*\d).+$/;
        var oneSpecChar = /^(?=.*[_\W]).+$/;
        if (!oneDigit.test(inputVal)) {
            $("#lbl-signup-password-error").show();
            $("#signup-password").css("background-color", background_color);
            $("#lbl-signup-password-error").text("Password should contain at least one digit.");
            return false;
        } else if (!oneSpecChar.test(inputVal)) {
            $("#lbl-signup-password-error").show();
            $("#signup-password").css("background-color", background_color);
            $("#lbl-signup-password-error").text("Password should contain at least one special character.");
            return false;
        } else {
            $("#signup-password").css("background-color", "white");
            $("#lbl-signup-password-error").hide();
        }
    } else {
        $("#lbl-signup-password-error").text("Password length should be in between 8 to 16.");
        $("#signup-password").css("background-color", background_color);
        $("#lbl-signup-password-error").show();
        return false;
    }
}

// Validate the re-typed password
function validateRetypedPass() {
    if ($("#signup-repassword").val().length == 0) {
        $("#lbl-signup-repassword-error").show();
        $("#signup-repassword").css("background-color", background_color);
        $("#lbl-signup-repassword-error").text("Please re-type the password.");
        return false;
    } else {
        var pass = $("#signup-password").val();
        var repass = $("#signup-repassword").val();
        if (pass != repass) {
            $("#lbl-signup-repassword-error").show();
            $("#signup-repassword").css("background-color", background_color);
            $("#lbl-signup-repassword-error").text("Passwords do not match.");
            return false;
        } else {
            $("#signup-repassword").css("background-color", "white");
            $("#lbl-signup-repassword-error").hide();
        }
    }
}