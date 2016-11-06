$(document).ready(function () {
    getHallPrice();
    $("#hall-reserv-hall-select").change(function () {
        getHallPrice();
    });
});

function getHallPrice() {
    $.ajax({
        type: 'POST',
        url: "./dao/hall/get_hall_price.php",
        data: {"hall-name": $("#hall-reserv-hall-select").val()},
        success: function (result) {
            $("#hall-total").val(result);
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert(errorThrown);
        }
    });
}
