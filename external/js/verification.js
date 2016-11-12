$(document).ready(function () {
    $("#veri-success").hide();
    $("#veri-failed").hide();
    $("#resend-success").hide();
    $("#resend-failed").hide();

    // Resend verification code
    $('#btn-veri-resend').off('click');
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

    // Confirm verification code
    $('#btn-veri-confirm').off('click');
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
                    // If the verification is success, update the status of the customer.
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

    $('#btn-regVerify').off('click');
    $("#btn-regVerify").click(function () {
        $("#veri-success").hide();
        $("#veri-failed").hide();
        $("#resend-success").hide();
        $("#resend-failed").hide();
        $.ajax({
            type: 'POST',
            url: "./operations/verification.php",
            data: {"veri-username": $.trim($("#regd-username").text()), "veri-code": $.trim($("#regd-code").val())},
            success: function (result) {
                if ($.trim(result) != 0) {
                    // If the verification is success, update the status of the customer.
                    $.ajax({
                        type: 'POST',
                        url: "./dao/customer/update-status.php",
                        data: {"veri-username": $.trim($("#regd-username").text()), "veri-code": $.trim($("#regd-code").val())},
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

    $('#btn-regResend').off('click');
    $("#btn-regResend").click(function () {
        $("#veri-success").hide();
        $("#veri-failed").hide();
        $("#resend-success").hide();
        $("#resend-failed").hide();
        $.ajax({
            type: 'POST',
            url: "./operations/resend-code.php",
            data: {"veri-username": $.trim($("#regd-username").text())},
            success: function (result) {
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
});

