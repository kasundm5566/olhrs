$(document).ready(function () {
    $("#veri-success").hide();
    $("#veri-failed").hide();
    $("#resend-success").hide();
    $("#resend-failed").hide();

    $("#btn-veri-resend").click(function () {
        $("#veri-success").hide();
        $("#veri-failed").hide();
        $("#resend-success").hide();
        $("#resend-failed").hide();
        $.ajax({
            type: 'POST',
            url: "./operations/resend-code.php",
            data: $("#veri-form").serialize(),
            success: function (result) {
                alert(result);
                if ($.trim(result) != 0) {
                    $("#resend-success").show();
                } else {
                    $("#resend-failed").show();
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert(errorThrown);
            }
        });
        return false;
    });

    $("#btn-veri-confirm").click(function () {
        $("#veri-success").hide();
        $("#veri-failed").hide();
        $("#resend-success").hide();
        $("#resend-failed").hide();
        $.ajax({
            type: 'POST',
            url: "./operations/verification.php",
            data: $("#veri-form").serialize(),
            success: function (result) {
                if ($.trim(result) != 0) {
                    $.ajax({
                        type: 'POST',
                        url: "./dao/customer/update-status.php",
                        data: $("#veri-form").serialize(),
                        success: function (result) {
                            if ($.trim(result) != 0) {
                                $("#veri-success").show();
                            } else {
                                $("#veri-failed").show();
                            }
                        },
                        error: function (jqXHR, textStatus, errorThrown) {
                            alert(errorThrown);
                        }
                    });
                } else {
                    $("#veri-failed").show();
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert(errorThrown);
            }
        });
        return false;
    });
});

