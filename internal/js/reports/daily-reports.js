$(document).ready(function () {
    $("#all-hall-submitDaily").click(function () {
        $.ajax({
            url: "all-hall-report.php",
            type: "POST",
            data: $("#allhall-form").serialize(),
            success: function (data) {
                $('#all-hall-reportDaily').html(data);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert(errorThrown);
            }
        });
    });
    $("#all-rooms-submitDaily").click(function () {
        $.ajax({
            url: "all-room-report.php",
            type: "POST",
            data: $("#allroom-form").serialize(),
            success: function (data) {
                $('#all-rooms-reportDaily').html(data);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert(errorThrown);
            }
        });
    });
    $("#payment-submitDaily").click(function () {
        $.ajax({
            url: "payment-report.php",
            type: "POST",
            data: $("#payment-form").serialize(),
            success: function (data) {
                $('#payment-reportDaily').html(data);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert(errorThrown);
            }
        });
    });
});