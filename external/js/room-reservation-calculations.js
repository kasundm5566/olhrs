$(document).ready(function () {
    calculateTotal();

    $("#room-meal-plan").change(function () {
        calculateTotal();
    });

    $(':input[type="number"]').change(function () {
        calculateTotal();
    });
});

// Calculate room total price
function calculateTotal() {
    var mealplan = $("#room-meal-plan").val();
    var roomcount = $(':input[type="number"]').val()
    var roomtype = $('#room-reserv-rmtype').val();

    $("#room-reserv-payamount-error").hide();
    $("#room-payAmount").css("background-color", "white");

    // Get price for the selected meal paln
    $.ajax({
        type: 'POST',
        url: "./dao/room/get_mealtype_price.php",
        data: {"mealplan": mealplan, "roomtype": roomtype},
        success: function (result) {
            var total = result * roomcount;
            $("#room-total").val(total);
            if (total < 10000) { // If the total is less than Rs.10000, total shoul pay.
                $("#room-payAmount").val(total);
                $("#room-payAmount").prop("readonly", true);
            } else {
                $("#room-payAmount").val(total);
                $("#room-payAmount").prop("readonly", false);
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert(errorThrown);
        }
    });
}
