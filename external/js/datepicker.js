$(document).ready(function () {
    setHallDatePicker();
    setRoomCheckInDatePicker();
    setRoomCheckOutDatePicker();
});

function setHallDatePicker() {
    var date = new Date();
    date.setDate(date.getDate() + 5);
    var date_input = $('input[name="hall-date"]'); //our date input has the name "hall-date"
    var container = $('.bootstrap-iso form').length > 0 ? $('.bootstrap-iso form').parent() : "body";
    var options = {
        format: 'yyyy-mm-dd ',
        weekStart: 1,
        startDate: date,
        maxViewMode: 0,
        todayHighlight: true,
        autoclose: true
    };
    date_input.datepicker(options);
}

function setRoomCheckInDatePicker() {
    var date = new Date();
    date.setDate(date.getDate() + 1);
    var date_input = $('input[name="room-in-date"]'); //our date input has the name "room-in-date"
    var container = $('.bootstrap-iso form').length > 0 ? $('.bootstrap-iso form').parent() : "body";
    var options = {
        format: 'yyyy-mm-dd ',
        weekStart: 1,
        startDate: date,
        maxViewMode: 0,
        todayHighlight: true,
        autoclose: true
    };
    date_input.datepicker(options);
}

function setRoomCheckOutDatePicker() {
    var date = new Date();
    date.setDate(date.getDate() + 1);
    var date_input = $('input[name="room-out-date"]'); //our date input has the name "room-out-date"
    var container = $('.bootstrap-iso form').length > 0 ? $('.bootstrap-iso form').parent() : "body";
    var options = {
        format: 'yyyy-mm-dd ',
        weekStart: 1,
        startDate: date,
        maxViewMode: 0,
        todayHighlight: true,
        autoclose: true
    };
    date_input.datepicker(options);
}