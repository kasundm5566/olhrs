$(document).ready(function () {
    $selectedMenuName = $("#sel-menu-select").val();
    
    $.ajax({
        url: "../../dao/event/get_menu_data.php",
        type: "GET",
        data: {"menu-name":$selectedMenuName},
        success: function (result) {
            $("#show-menu-div").html(result);
        },
        error: function (jqXHR, textStatus, errorThrown) {
            $("#modal-commonError").modal('show');
            $("#common-error-msg").text("Error loading menu data. Message: " + errorThrown);
        }
    });
    
    $("#sel-menu-select").change(function (){
        $selectedMenuName = $("#sel-menu-select").val();
        $.ajax({
        url: "../../dao/event/get_menu_data.php",
        type: "GET",
        data: {"menu-name":$selectedMenuName},
        success: function (result) {
            $("#show-menu-div").html(result);
        },
        error: function (jqXHR, textStatus, errorThrown) {
            $("#modal-commonError").modal('show');
            $("#common-error-msg").text("Error loading menu data. Message: " + errorThrown);
        }
    });
    });
});

