$(document).ready(function () {
    $("#update-firstname").focusout(function () {
        validateFirstName($("#update-firstname"), $("#lbl-update-fname-error"));
    });
    $("#update-firstname").keyup(function () {
        validateFirstName($("#update-firstname"), $("#lbl-update-fname-error"));
    });

    $("#update-lastname").focusout(function () {
        validateLastName($("#update-lastname"), $("#lbl-update-lname-error"));
    });
    $("#update-lastname").keyup(function () {
        validateLastName($("#update-lastname"), $("#lbl-update-lname-error"));
    });

    $("#update-email").focusout(function () {
        validateEmail($("#update-email"), $("#lbl-update-email-error"));
    });
    $("#update-email").keyup(function () {
        validateEmail($("#update-email"), $("#lbl-update-email-error"));
    });

    $("#update-contactno").focusout(function () {
        validateContactNo($("#update-contactno"), $("#lbl-update-contactno-error"));
    });
    $("#update-contactno").keyup(function () {
        validateContactNo($("#update-contactno"), $("#lbl-update-contactno-error"));
    });

    $("#update-password").focusout(function () {
        validatePassword($("#update-password"), $("#lbl-update-password-error"));
    });
    $("#update-password").keyup(function () {
        validatePassword($("#update-password"), $("#lbl-update-password-error"));
    });

    $("#update-repassword").focusout(function () {
        validateRetypedPass($("#update-repassword"), $("#lbl-update-repassword-error"), $("#update-password"));
    });
    $("#update-repassword").keyup(function () {
        validateRetypedPass($("#update-repassword"), $("#lbl-update-repassword-error"), $("#update-password"));
    });
});


