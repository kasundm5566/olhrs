function resetFields(error_fields, input_fields) {
    $(error_fields).text("");
    $(input_fields).val("");
    $(input_fields).css("background-color", "white");
}