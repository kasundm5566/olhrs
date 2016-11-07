$(document).ready(function () {
    $("#btn-change-pass").click(function () {
        $("#profile-currentpw-error").hide();
        $("#profile-newpw-error").hide();
        $("#profile-newpwRe-error").hide();
        $("#changepass-success").hide();
        $("#changepass-error").hide();
        $("#modal-changepass-popup").modal('show');
        $("#changepw-form").trigger('reset');
    });

    $("#btn-changepass-ok").click(function () {
        var isCurrentPassOk = validateCurrentPassword();
        var isNewPassOk = validatePassword($("#txt-newpw"), $("#profile-newpw-error"));
        var isNewPassReOk = validateRetypedPass($("#txt-newpwRe"), $("#profile-newpwRe-error"), $("#txt-newpw"))

        if (isCurrentPassOk != false && isNewPassOk != false && isNewPassReOk != false) { // All validations should pass
            // Ajax call with data to the mentioned PHP file to process the change password operation
            $.ajax({
                type: 'POST',
                url: "./dao/customer/change_password.php",
                data: {"username": $("#changepass-username").val(), "password": $("#txt-newpw").val(), "oldPassword": $("#txt-currentpw").val()},
                success: function (result) {
                    if ($.trim(result) == 1) {
                        $("#changepass-success").show();
                        $("#changepass-error").hide();
                    } else {
                        $("#changepass-success").hide();
                        $("#changepass-error").show();
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    $("#modal-commonError").modal('show');
                    $("#common-error-msg").text("Error validating the username.");
                }
            });
        }
    });
});

// Validate the input fields of the profile page
function validateProfileFields() {
    var isFnameValid = validateFirstName($("#profile-fname"), $("#profile-fname-error"));
    var isLnameValid = validateLastName($("#profile-lname"), $("#profile-lname-error"));
    var isEmailValid = validateEmail($("#profile-email"), $("#profile-email-error"));
    var isContactnoValid = validateContactNo($("#profile-tel"), $("#profile-tel-error"));

    if (isFnameValid == false || isLnameValid == false || isEmailValid == false || isContactnoValid == false) {
        return false;
    } else {
        return true;
    }
}

// Validate current password for a minimum of 8 characters
function validateCurrentPassword() {
    if ($("#txt-currentpw").val().length < 8) {
        $("#profile-currentpw-error").show();
        $("#profile-currentpw-error").text("Incorrent password.");
        return false;
    } else {
        $("#profile-currentpw-error").hide();
    }
}