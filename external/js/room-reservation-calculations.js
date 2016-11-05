$(document).ready(function () {
    calculateTotal();

    $("#room-meal-plan").change(function () {
        calculateTotal();
    });

    $(':input[type="number"]').change(function () {
        calculateTotal();
    });
});

function calculateTotal() {
    var mealplan = $("#room-meal-plan").val();
    var roomcount = $(':input[type="number"]').val()
    var roomtype = $('#room-reserv-rmtype').val();

    $("#room-reserv-payamount-error").hide();
    $("#room-payAmount").css("background-color", "white");

    $.ajax({
        type: 'POST',
        url: "./dao/room/get_mealtype_price.php",
        data: {"mealplan": mealplan, "roomtype": roomtype},
        success: function (result) {
            var total = result * roomcount;
            $("#room-total").val(total);
            if (total < 10000) {
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
