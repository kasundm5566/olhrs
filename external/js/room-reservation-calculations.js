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

    $.ajax({
        type: 'POST',
        url: "./dao/room/get_mealtype_price.php",
        data: {"mealplan": mealplan, "roomtype": roomtype},
        success: function (result) {
            $("#room-total").val(result * roomcount);
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert(errorThrown);
        }
    });
}
