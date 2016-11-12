var background_color = "#ffff80";

function validateMenuFields() {

    var isMenuNameValid = validateMenuName($("#txt-menuName"), $("#lbl-menu-errors"));
    var isPriceValid = validatemenuPrice($("#txt-menuPrice"), $("#lbl-menu-errors"));
    var isFoodNamesValid = validateFoodName();
    if (isMenuNameValid == false || isPriceValid == false || isFoodNamesValid == false) {
        return false;
    } else {
        return true;
    }
}

function validateMenuName(field, error_field) {
    $(error_field).css("color", "red");
    var menuName = $(field).val();
    if (menuName.length == 0) {
        $(error_field).show();
        $(field).css("background-color", background_color);
        $(error_field).text("Menu name should not be empty.");
        return false;
    } else {
        $.ajax({
            type: 'GET',
            url: "../../dao/event/menu_name_checker.php",
            data: {"menuName": menuName},
            success: function (result) {
                if ($.trim(result) != 0) {
                    $(error_field).show();
                    $(field).css("background-color", background_color);
                    $(error_field).text("Menu name already exists.");
                    return false;
                } else {
                    $(error_field).hide();
                    $(field).css("background-color", "white");
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                $("#modal-commonError").modal('show');
                $("#common-error-msg").text("Error validating the username. Message: " + errorThrown);
            }
        });
    }
}

function validatemenuPrice(field, error_field) {
    $(error_field).css("color", "red");
    var menuPrice = $(field).val();
    var priceRegex = /^[0-9]*$/;
    if (menuPrice.length == 0) {
        $(error_field).show();
        $(field).css("background-color", background_color);
        $(error_field).text("Menu price should not be empty.");
        return false;
    } else if (!priceRegex.test(menuPrice)) {
        $(error_field).show();
        $(field).css("background-color", background_color);
        $(error_field).text("Menu price should be a numeric value.");
        return false;
    } else {
        $(error_field).hide();
        $(field).css("background-color", "white");
    }
}

function validateFoodName() {
    var b = false;
    $.each($(".txt-foodItem"), function () {
        if ($(this).val() == "") {
            $(this).css("background-color", background_color);
            b = false;
        } else {
            $(this).css("background-color", "white");
            b = true;
        }
    });
    return b;
}