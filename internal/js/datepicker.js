$(document).ready(function () {
//    var date_input = $('input[name="hall-date"]'); //our date input has the name "hall-date"
//    var container = $('.bootstrap-iso form').length > 0 ? $('.bootstrap-iso form').parent() : "body";
//    var options = {
//        format: 'yyyy-mm-dd ',
//        weekStart: 1,
//        startDate: "TODAY",
//        maxViewMode: 0,
//        todayHighlight: true,
//        autoclose: true
//    };
//    date_input.datepicker(options);

    var date_input = $('input[name="date"]'); //our date input has the name "hall-date"
    var container = $('.bootstrap-iso form').length > 0 ? $('.bootstrap-iso form').parent() : "body";
    var options = {
        format: 'yyyy-mm-dd ',
        weekStart: 1,
        maxViewMode: 2,
        todayHighlight: true,
        autoclose: true,
        todayBtn: "linked"
    };
    date_input.datepicker(options);
    
    var date_input = $('.date'); //our date input has the name "hall-date"
    var container = $('.bootstrap-iso form').length > 0 ? $('.bootstrap-iso form').parent() : "body";
    var options = {
        format: 'yyyy-mm-dd ',
        weekStart: 1,
        startDate: "TODAY",
        maxViewMode: 0,
        todayHighlight: true,
        autoclose: true
    };
    date_input.datepicker(options);
    
    var date_input = $('.date-rec'); //our date input has the name "hall-date"
    var container = $('.bootstrap-iso form').length > 0 ? $('.bootstrap-iso form').parent() : "body";
    var options = {
        format: 'yyyy-mm-dd ',
        weekStart: 1,
        maxViewMode: 0,
        todayHighlight: true,
        autoclose: true
    };
    date_input.datepicker(options);
    
        var date_input = $('.date-rec1'); //our date input has the name "hall-date"
    var container = $('.bootstrap-iso form').length > 0 ? $('.bootstrap-iso form').parent() : "body";
    var options = {
        format: 'yyyy-mm-dd ',
        weekStart: 1,
        startDate: "TODAY",
        maxViewMode: 0,
        todayHighlight: true,
        autoclose: true
    };
    date_input.datepicker(options);
});