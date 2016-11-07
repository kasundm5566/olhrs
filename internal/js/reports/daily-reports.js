$(document).ready(function () {
    /* Generate a report when page is loading according to the details
     selected by default (if exists) */
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

    // Action to generate report for all halls reservations
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
    // Action to generate report for all rooms reservations
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
    // Action to generate report for payments
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