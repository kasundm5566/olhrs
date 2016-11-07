$(document).ready(function () {
    /* Generate a report when page is loading according to the details
     selected by default (if exists) */
    $.ajax({
        url: "all-hall-report.php",
        type: "POST",
        data: $("#allhall-form").serialize(),
        success: function (data) {
            $('#all-hall-reportMonthly').html(data);
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert(errorThrown);
        }
    });

    // Action to generate report for all halls reservations
    $("#all-hall-submitMonthly").click(function () {
        $.ajax({
            url: "all-hall-report.php",
            type: "POST",
            data: $("#allhall-form").serialize(),
            success: function (data) {
                $('#all-hall-reportMonthly').html(data);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert(errorThrown);
            }
        });
    });
    // Action to generate report for kings hall reservations
    $("#kings-hall-submitMonthly").click(function () {
        $.ajax({
            url: "kings-hall-report.php",
            type: "POST",
            data: $("#kingshall-form").serialize(),
            success: function (data) {
                $('#kings-hall-reportMonthly').html(data);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert(errorThrown);
            }
        });
    });
    // Action to generate report for queens A hall reservations
    $("#queena-hall-submitMonthly").click(function () {
        $.ajax({
            url: "queensa-hall-report.php",
            type: "POST",
            data: $("#quennahall-form").serialize(),
            success: function (data) {
                $('#queena-hall-reportMonthly').html(data);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert(errorThrown);
            }
        });
    });
    // Action to generate report for queens B hall reservations
    $("#queenb-hall-submitMonthly").click(function () {
        $.ajax({
            url: "queensb-hall-report.php",
            type: "POST",
            data: $("#quennahall-form").serialize(),
            success: function (data) {
                $('#queenb-hall-reportMonthly').html(data);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert(errorThrown);
            }
        });
    });

    // Action to generate report for all rooms reservations
    $("#room-all-submitMonthly").click(function () {
        $.ajax({
            url: "all-room-report.php",
            type: "POST",
            data: $("#roomall-form").serialize(),
            success: function (data) {
                $('#room-all-reportMonthly').html(data);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert(errorThrown);
            }
        });
    });
    // Action to generate report for single rooms reservations
    $("#single-room-submitMonthly").click(function () {
        $.ajax({
            url: "single-room-report.php",
            type: "POST",
            data: $("#single-room-form").serialize(),
            success: function (data) {
                $('#single-room-reportMonthly').html(data);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert(errorThrown);
            }
        });
    });
    // Action to generate report for double rooms reservations
    $("#double-room-submitMonthly").click(function () {
        $.ajax({
            url: "double-room-report.php",
            type: "POST",
            data: $("#double-room-form").serialize(),
            success: function (data) {
                $('#double-room-reportMonthly').html(data);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert(errorThrown);
            }
        });
    });
    // Action to generate report for family rooms reservations
    $("#family-room-submitMonthly").click(function () {
        $.ajax({
            url: "family-room-report.php",
            type: "POST",
            data: $("#family-room-form").serialize(),
            success: function (data) {
                $('#family-room-reportMonthly').html(data);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert(errorThrown);
            }
        });
    });
    // Action to generate report for cottage reservations
    $("#cottage-submitMonthly").click(function () {
        $.ajax({
            url: "cottage-report.php",
            type: "POST",
            data: $("#cottage-form").serialize(),
            success: function (data) {
                $('#cottage-reportMonthly').html(data);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert(errorThrown);
            }
        });
    });

    // Action to generate report for payments
    $("#payment-submitMonthly").click(function () {
        $.ajax({
            url: "payment-report.php",
            type: "POST",
            data: $("#payment-form").serialize(),
            success: function (data) {
                $('#payment-reportMonthly').html(data);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert(errorThrown);
            }
        });
    });

    // Action to generate report for feedbacks
    $("#feedback-submitMonthly").click(function () {
        $.ajax({
            url: "feedback-report.php",
            type: "POST",
            data: $("#feedback-form").serialize(),
            success: function (data) {
                $('#feedback-reportMonthly').html(data);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert(errorThrown);
            }
        });
    });
});