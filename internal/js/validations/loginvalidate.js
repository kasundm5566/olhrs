// Validate the username and password user entered.
$(document).ready(function () {
    $('form').submit(function (event) {
        if ($('#username').val() == "" && $('#password').val() == "") { //Both 
            $('#msg').text("Username, Password should not be empty."); //Display Message
            document.getElementById('username').focus(); //Focus on text field
            event.preventDefault();
            return false;// prevent submission
        }
        if ($('#username').val() == "") { //Blank username
            $('#msg').text("Username should not be empty."); //Display Message
            document.getElementById('username').focus(); //Focus on text field
            event.preventDefault();
            return false;// prevent submission
        }
        if ($('#password').val() == "") { //Blank password
            $('#msg').text("password should not be empty."); //Display Message
            document.getElementById('password').focus(); //Focus on text field
            event.preventDefault();
            return false;// prevent submission
        }
    });

    $("#link-forgot-password").click(function () {
        $("#modal-forgotPassword").modal('show');
    });
});


