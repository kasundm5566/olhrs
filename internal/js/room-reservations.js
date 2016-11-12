var paginationBar;
var currentPage = 1;
var recPerPage = 10;
$(document).ready(function () {
    initRoomReservTable();
    pagination();

    $('#comboPages').change(function () {
        jumpToPage();
    });

    $('#comboRecCount').change(function () {
        loadDataByPageSize();
    });

    $("#btnSearchReservs").click(function () {
        search();
    });

});

// Initialize the bootstrap table with data
function initRoomReservTable() {
    $.ajax({
        url: "../../dao/room_reservations/get_room_reservations.php",
        type: "GET",
        dataType: "json",
        data: {'page': 1, "recordsCount": recPerPage},
        success: function (data) {
            $('#table-room-reservations').bootstrapTable({
                height: 380,
                pageSize: recPerPage,
                data: data,
                singleSelect: true,
                columns: [{
                        field: 'room_type_name',
                        title: 'Room type',
                        align: 'left',
                        valign: 'bottom',
                        sortable: true
                    }, {
                        field: 'placed_date',
                        title: 'Placed date',
                        align: 'right',
                        valign: 'bottom',
                        sortable: true
                    }, {
                        field: 'check_in',
                        title: 'Check in',
                        align: 'right',
                        valign: 'bottom',
                        sortable: true
                    }, {
                        field: 'check_out',
                        title: 'Check out',
                        align: 'right',
                        valign: 'bottom',
                        sortable: true
                    }, {
                        field: 'count',
                        title: 'Room count',
                        align: 'right',
                        valign: 'bottom',
                        sortable: true
                    }, {
                        field: 'username',
                        title: 'Username',
                        align: 'left',
                        valign: 'bottom',
                        sortable: true
                    }, {
                        field: 'total',
                        title: 'Total',
                        align: 'right',
                        valign: 'bottom'
                    }, {
                        field: 'operate',
                        title: 'Operations',
                        align: 'center',
                        valign: 'middle',
                        formatter: operateFormatter,
                        events: operateEvents
                    }]
            });
            if ($("#lbl-user-group").text() == "Admin") {
                $('#table-room-reservations').bootstrapTable('hideColumn', 'operate');
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            $("#modal-commonError").modal('show');
            $("#common-error-msg").text("Error loading data. Message: " + errorThrown);
        }
    });
    function operateFormatter(value, row, index) {
        return [
            '<center>',
            '<a class="cancel" href="javascript:void(0)" title="Cancel">',
            '<i class="glyphicon glyphicon-edit"></i>Cancel',
            '</a>&nbsp;&nbsp;'
        ].join('');
    }

    window.operateEvents = {
        'click .cancel': function (e, value, row, index) {
            var js = JSON.stringify(row);
            var obj = JSON.parse(js);
            $("#modal-cancelRoomConfirm").modal('show');
            $('#roomCancelOk').off('click');
            $("#roomCancelOk").click(function () {
                $.ajax({
                    url: "../../dao/room_reservations/cancel_reservation.php",
                    type: "POST",
                    data: {
                        "check_in": obj['check_in'],
                        "check_out": obj['check_out'],
                        "room_type_name": obj['room_type_name'],
                        "placed_date": obj['placed_date'],
                        "username": obj['username'],
                        "count": obj['count']
                    },
                    success: function (data) {
                        if (data != 0) {
                            $("#modal-cancelRoomConfirm").modal('hide');
                            $("#modal-cancelSuccess").modal('show');
                        } else {
                            $("#modal-cancelRoomConfirm").modal('hide');
                            $("#modal-commonError").modal('show');
                        }
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        $("#modal-commonError").modal('show');
                        $("#common-error-msg").text("Error refreshing table. Message: " + errorThrown);
                    }
                });
            });
        }
    };
}

// Define the pagination bar
function pagination() {
    paginationBar = $('#pagination').simplePaginator({
        totalPages: 1,
        maxButtonsVisible: 5,
        currentPage: 1,
        nextLabel: 'Next',
        prevLabel: 'Prev',
        firstLabel: 'First',
        lastLabel: 'Last',
        pageChange: function (page) {
            currentPage = page;
            $.ajax({
                url: "../../dao/room_reservations/get_room_reservations.php",
                type: "GET",
                dataType: "json",
                data: {"page": page, "recordsCount": recPerPage},
                success: function (result) {
                    $('#table-room-reservations').bootstrapTable('load', result);
                    $('#comboPages').val(page);
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    $("#modal-commonError").modal('show');
                    $("#common-error-msg").text("Error initializing pagination. Message: " + errorThrown);
                }
            });
        }
    });

    // Get the user count and set the page count of the pagination bar
    $.ajax({
        type: "get",
        url: "../../dao/room_reservations/get_reservations_count.php",
        success: function (result) {
            var pageCount = Math.ceil(result / recPerPage);
            if (pageCount == 0) {
                pageCount = 1;
            }
            paginationBar.simplePaginator('setTotalPages', pageCount);
            loadPageSelect(pageCount);
        },
        error: function (jqXHR, textStatus, errorThrown) {
            $("#modal-commonError").modal('show');
            $("#common-error-msg").text("Error getting feedbacks count. Message: " + errorThrown);
        }
    });
}

// Load page amount to the go to page dropdown
function loadPageSelect(pages) {
    var select = $("#comboPages"), options = '';
    select.empty();
    for (var i = 1; i <= pages; i++) {
        options += "<option>" + i + "</option>";
    }
    select.append(options);
}

// Go to the page selected by the dropdown
function jumpToPage() {
    var selectedPage = $('#comboPages').val();
    $.ajax({
        type: "GET",
        url: "../../dao/room_reservations/get_room_reservations.php",
        dataType: "json",
        data: {"page": selectedPage, "recordsCount": recPerPage},
        success: function (result) {
            $('#table-room-reservations').bootstrapTable('load', result);
            $('#comboPages').val(selectedPage);
            paginationBar.simplePaginator('changePage', parseInt(selectedPage));
        }
    });
}

// Load selected amount of records per page
function loadDataByPageSize() {
    recPerPage = $('#comboRecCount').val();
    $.ajax({
        type: "GET",
        url: "../../dao/room_reservations/get_room_reservations.php",
        dataType: "json",
        data: {"page": "1", "recordsCount": recPerPage},
        success: function (result) {
            $('#table-room-reservations').bootstrapTable('load', result);
            paginationBar.simplePaginator('changePage', 1);
        }
    });

    $.ajax({
        url: "../../dao/room_reservations/get_reservations_count.php",
        success: function (result) {
            var totalPages = Math.ceil(result / recPerPage);
            paginationBar.simplePaginator('setTotalPages', totalPages);
            loadPageSelect(totalPages);
        }
    });
}

// Search reservations
function search() {
    var searchYear = $('#sel-search-reserv').val();
    if (searchYear === "select-year") {
        $('#pagination2').hide();
        $('#pagination').show();
        $('#comboPages').show();
        $('#comboRecCount').show();
        $('.pagiTexts').show();

        $.ajax({
            type: "GET",
            url: "../../dao/room_reservations/get_room_reservations.php",
            dataType: "json",
            data: {"page": 1, "recordsCount": recPerPage},
            success: function (result) {
                $('#table-room-reservations').bootstrapTable('load', result);
                paginationBar.simplePaginator('changePage', 1);
            }
        });
    } else {
        $('#pagination').hide();
        $('#pagination2').show();
        $('#comboPages').hide();
        $('#comboRecCount').hide();
        $('.pagiTexts').hide();

        $.ajax({
            type: "GET",
            dataType: "json",
            url: "../../dao/room_reservations/search_room_reservations.php",
            data: {"searchYear": searchYear, "page": 1},
            success: function (result) {
                $('#table-room-reservations').bootstrapTable('load', result);
            }
        });

        $.ajax({
            type: "get",
            url: "../../dao/room_reservations/pagination_search.php",
            data: {"searchYear": searchYear},
            success: function (result) {
                var pageCount = Math.ceil(result / recPerPage);
                if (pageCount == 0) {
                    pageCount = 1;
                }
                $('#pagination2').simplePaginator('setTotalPages', pageCount);
            }
        });

        paginationBar2 = $('#pagination2').simplePaginator({
            totalPages: 1,
            maxButtonsVisible: 5,
            currentPage: 1,
            nextLabel: 'Next',
            prevLabel: 'Prev',
            firstLabel: 'First',
            lastLabel: 'Last',
            pageChange: function (page) {
                $.ajax({
                    type: "GET",
                    url: "../../dao/room_reservations/search_room_reservations.php",
                    dataType: "json",
                    data: {"searchYear": searchYear, "page": page},
                    success: function (result) {
                        $('#table-room-reservations').bootstrapTable('load', result);
                    }
                });
            }
        });
    }
}