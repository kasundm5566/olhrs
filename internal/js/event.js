$(document).ready(function () {
    $("#menu-add-success").hide();
    $("#menu-add-failed").hide();

    $('.addel').addel({
        events: {
            added: function (event) {

            }
        }
    }).on('addel:delete', function (event) {

    });

    loadCategories($(".sel-menuCategories"));
    loadFoodItems($(".sel-menuFoods"), "1");

    $(document.body).on('change', '.sel-menuCategories', function () {
        loadFoodItems($(this).closest('div').next('div').find('.sel-menuFoods'), $(this).val());
    });

    $(document.body).on('change', '.sel-menuFoods', function () {
        $(this).closest('div').next('div').find('.txt-foodItem').val($(this).val());
    });

    $("#btn-save-menu").click(function () {
        if (validateMenuFields()) {
            $.ajax({
                url: "../../dao/event/add_new_menu.php",
                type: "POST",
                data: $("#menu-form").serialize(),
                success: function (result) {
                    if (result != '0') {
                        $("#menu-add-success").show();
                        $("#menu-add-failed").hide();
                    } else {
                        $("#menu-add-success").hide();
                        $("#menu-add-failed").show();
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    $("#modal-commonError").modal('show');
                    $("#common-error-msg").text("Error adding new menu. Message: " + errorThrown);
                }
            });
        }
    });
});

function loadCategories(field) {
    $.ajax({
        url: "../../dao/event/get_categories.php",
        type: "GET",
        dataType: "json",
        success: function (categories) {
            var select = $(field), options = '';
            select.empty();
            for (var i = 0; i < categories.length; i++) {
                options += "<option value='" + categories[i].category_name + "'>" + categories[i].category_name + "</option>";
            }
            select.append(options);
        },
        error: function (jqXHR, textStatus, errorThrown) {
            $("#modal-commonError").modal('show');
            $("#common-error-msg").text("Error reteriving categories. Message: " + errorThrown);
        }
    });
}

function loadFoodItems(field, value) {
    selectedCategory = value;
    if (typeof selectedCategory == 'undefined') {
        selectedCategory = "1";
    }
    $.ajax({
        url: "../../dao/event/get_food_items.php",
        type: "GET",
        dataType: "json",
        data: {"category-name": selectedCategory},
        success: function (foods) {
            var select = $(field), options = '';
            select.empty();
            for (var i = 0; i < foods.length; i++) {
                options += "<option value='" + foods[i].food_name + "'>" + foods[i].food_name + "</option>";
            }
            select.append(options);
        },
        error: function (jqXHR, textStatus, errorThrown) {
            $("#modal-commonError").modal('show');
            $("#common-error-msg").text("Error reteriving foods. Message: " + errorThrown);
        }
    });
}