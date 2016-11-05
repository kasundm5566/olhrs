$(document).ready(function () {
    $("#btn-updateProfile").hide();

    $("#btn-update-customer").click(function () {
        enableFields();
        $("#btn-updateProfile").show();
    });
});

function enableFields() {
    $("#profile-fname").prop("readonly", false);
    $("#profile-lname").prop("readonly", false);
    $("#profile-email").prop("readonly", false);
    $("#profile-tel").prop("readonly", false);
}