$(document).ready(function () {

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
    $("#single-room-submitMonthly").click(function () {
        $.ajax({
            url: "all-room-report.php",
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