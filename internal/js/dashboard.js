// Customize dashboard tile animating settings
$(document).ready(function () {
    // Tile sliding related settings
    $(".tile").height($("#tile1").width());
    $(".carousel").height($("#tile1").width());
    $(".item").height($("#tile1").width());
    $(window).resize(function () {
        if (this.resizeTO)
            clearTimeout(this.resizeTO);
        this.resizeTO = setTimeout(function () {
            $(this).trigger('resizeEnd');
        }, 10);
    });

    $(window).bind('resizeEnd', function () {
        $(".tile").height($("#tile1").width());
        $(".carousel").height($("#tile1").width());
        $(".item").height($("#tile1").width());
    });

    // Title content updates each time dashboard refreshes
    reservationTileUpdate();
    staffTileUpdate();
    customerTileUpdate();

    // Bootstrap tooltip
    $('[data-toggle="tooltip"]').tooltip();

});

// Reservation tile update configuration
function reservationTileUpdate() {
    $("#lblNewReservations").text("0");
    $("#lblUpcomingReservations").text("0");
}

// User tile update configuration
function staffTileUpdate() {
    // Send an ajax request to get the current user count
    $.ajax({
        url: "../../dao/updatetiles.php",
        data: {operation: "staffTileUpdate"},
        success: function (count) {
            // Place the user count result in the tile
            $("#lblStaffCount").text(count);
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert("Error" + errorThrown);
        }
    });
}

// Customer tile update configuration
function customerTileUpdate() {
    // Send an ajax request to get the current user count
    $.ajax({
        url: "../../dao/updatetiles.php",
        data: {operation: "customerTileUpdate"},
        success: function (count) {
            // Place the user count result in the tile
           $("#lblcustomerTilteCap01").text(count);
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert("Error" + errorThrown);
        }
    });
}
