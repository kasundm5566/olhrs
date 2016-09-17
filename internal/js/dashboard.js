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
    
    ReceptionistHomeThumbs();
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

// Zoom in and out thumbnail icons of Receptionist's homepage
function ReceptionistHomeThumbs() {
    $('#reserv').hoverZoom({
        speed: 450,
        overlayOpacity: 0.4,
        zoom: 5
    });
    
    $('#event').hoverZoom({
        speed: 450,
        overlayOpacity: 0.4,
        zoom: 5
    });
    
    $('#pay').hoverZoom({
        speed: 450,
        overlayOpacity: 0.4,
        zoom: 5
    });
    
    $('#report').hoverZoom({
        speed: 450,
        overlayOpacity: 0.4,
        zoom: 5
    });

    /* USAGE
     
     $('#pink').hoverZoom({
     overlay: true, // false to turn off (default true)
     overlayColor: '#2e9dbd', // overlay background color
     overlayOpacity: 0.7, // overlay opacity
     zoom: 25, // amount to zoom (px)
     speed: 300 // speed of the hover
     });
     
     */
}
