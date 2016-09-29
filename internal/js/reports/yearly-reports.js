$(document).ready(function () {

    $.ajax({
        url: "all-hall-report.php",
        type: "POST",
        data: $("#allhall-form").serialize(),
        success: function (data) {
            $('#all-hall-reportYearly').html(data);
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert(errorThrown);
        }
    });

    $("#all-hall-submitYearly").click(function () {
        $.ajax({
            url: "all-hall-report.php",
            type: "POST",
            data: $("#allhall-form").serialize(),
            success: function (data) {
                $('#all-hall-reportYearly').html(data);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert(errorThrown);
            }
        });
    });

    $("#kings-hall-submitYearly").click(function () {
        $.ajax({
            url: "kings-hall-report.php",
            type: "POST",
            data: $("#kingshall-form").serialize(),
            success: function (data) {
                $('#kings-hall-reportYearly').html(data);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert(errorThrown);
            }
        });
    });

    $("#queena-hall-submitYearly").click(function () {
        $.ajax({
            url: "queensa-hall-report.php",
            type: "POST",
            data: $("#quennahall-form").serialize(),
            success: function (data) {
                $('#queena-hall-reportYearly').html(data);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert(errorThrown);
            }
        });
    });

    $("#queenb-hall-submitYearly").click(function () {
        $.ajax({
            url: "queensb-hall-report.php",
            type: "POST",
            data: $("#queenbhall-form").serialize(),
            success: function (data) {
                $('#queenb-hall-reportYearly').html(data);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert(errorThrown);
            }
        });
    });

    $("#room-all-submitYearly").click(function () {
        $.ajax({
            url: "all-room-report.php",
            type: "POST",
            data: $("#roomall-form").serialize(),
            success: function (data) {
                $('#room-all-reportYearly').html(data);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert(errorThrown);
            }
        });
    });

    $("#single-room-submitYearly").click(function () {
        $.ajax({
            url: "single-room-report.php",
            type: "POST",
            data: $("#single-room-form").serialize(),
            success: function (data) {
                $('#single-room-reportYearly').html(data);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert(errorThrown);
            }
        });
    });

    $("#double-room-submitYearly").click(function () {
        $.ajax({
            url: "double-room-report.php",
            type: "POST",
            data: $("#double-room-form").serialize(),
            success: function (data) {
                $('#double-room-reportYearly').html(data);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert(errorThrown);
            }
        });
    });

    $("#family-room-submitYearly").click(function () {
        $.ajax({
            url: "family-room-report.php",
            type: "POST",
            data: $("#family-room-form").serialize(),
            success: function (data) {
                $('#family-room-reportYearly').html(data);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert(errorThrown);
            }
        });
    });

    $("#cottage-submitYearly").click(function () {
        $.ajax({
            url: "cottage-report.php",
            type: "POST",
            data: $("#cottage-form").serialize(),
            success: function (data) {
                $('#cottage-reportYearly').html(data);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert(errorThrown);
            }
        });
    });

    $("#payment-submitYearly").click(function () {
        $.ajax({
            url: "payment-report.php",
            type: "POST",
            data: $("#payment-form").serialize(),
            success: function (data) {
                $('#payment-reportYearly').html(data);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert(errorThrown);
            }
        });
    });

    $("#feedback-submitYearly").click(function () {
        $.ajax({
            url: "feedback-report.php",
            type: "POST",
            data: $("#feedback-form").serialize(),
            success: function (data) {
                $('#feedback-reportYearly').html(data);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert(errorThrown);
            }
        });
    });

    $("#payment-hallwise-submitYearly").click(function () {
        $.ajax({
            url: "payment-hall-report.php",
            type: "POST",
            data: $("#feedback-form").serialize(),
            success: function (data) {
                $('#payment-hallwise-reportYearly').html(data);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert(errorThrown);
            }
        });
    });

    $("#payment-roomwise-submitYearly").click(function () {
        $.ajax({
            url: "payment-room-report.php",
            type: "POST",
            data: $("#feedback-form").serialize(),
            success: function (data) {
                $('#payment-roomwise-reportYearly').html(data);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert(errorThrown);
            }
        });
    });
});


