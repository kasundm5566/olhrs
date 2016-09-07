// Automatically hide the contact us page submit message.
window.setTimeout(function () {
    $(".contactus-error").fadeTo(1000, 0).slideUp(1000, function () {
        $(this).remove();
    });
}, 4000);