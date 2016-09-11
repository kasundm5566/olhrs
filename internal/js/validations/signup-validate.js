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

    $('#btn-addcustomer').off('click');
    $("#btn-addcustomer").click(function () {

        $('#modal-customer-signup').modal({
            backdrop: 'static',
            keyboard: false
        });

        $('#btn-addcustomer-ok').off('click');
        $("#btn-addcustomer-ok").click(function () {
            var isFirstNameValid = validateFirstName($("#signup-firstname"), $("#lbl-signup-fname-error"));
            var isLastNameValid = validateLastName($("#signup-lastname"), $("#lbl-signup-lname-error"));
            var isEmailValid = validateEmail($("#signup-email"), $("#lbl-signup-email-error"));
            var isContactNoValid = validateContactNo($("#signup-contactno"), $("#lbl-signup-contactno-error"));
            var isPasswordValid = validatePassword($("#signup-password"), $("#lbl-signup-password-error"));
            var isRetypedPasswordValid = validateRetypedPass($("#signup-repassword"), $("#lbl-signup-repassword-error"), $("#signup-password"));

            if (isFirstNameValid === false || isLastNameValid === false || isEmailValid === false || isContactNoValid === false || isPasswordValid === false || isRetypedPasswordValid === false) {
                $("#modal-validation-error-popup").modal("show");
                return false;
            } else {
                $("#modal-addCustomer-ConfirmPopup").modal('show');
                $("#lblFname").text("");
                $("#lblFname").text("First name: " + $("#signup-firstname").val());
                $("#lblLname").text("");
                $("#lblLname").text("Last name: " + $("#signup-lastname").val());
                $("#lblEmail").text("");
                $("#lblEmail").text("Email: " + $("#signup-email").val());
                $("#lblTel").text("");
                $("#lblTel").text("Contact no: " + $("#signup-contactno").val());
                $("#lblUsrname").text("");
                $("#lblUsrname").text("username: " + $("#signup-username").val());

                $('#addCustOk').off('click');
                $("#addCustOk").click(function () {
                    $.ajax({
                        url: "../../dao/customer_management/add_customer.php",
                        data: $("#form-addcustomer").serialize(),
                        success: function (data) {
                            if ($.trim(data) == 1) {
                                $("#modal-addCustomer-ConfirmPopup").modal('hide');
                                $("#modal-customer-signup").modal('hide');
                                $("#form-addcustomer").trigger('reset')
                                $("#modal-addCustomerSuccess").modal('show');
                            } else {
                                $("#modal-addCustomer-ConfirmPopup").modal('hide');
                                $("#modal-addCustomerFail").modal('show');
                            }
                        },
                        error: function (jqXHR, textStatus, errorThrown) {
                            $("#modal-commonError").modal('show');
                            $("#common-error-msg").text("Error adding new customer. Message: " + errorThrown);
                        }
                    });
                });
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
    if ($(field).val().length !== 10) {
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