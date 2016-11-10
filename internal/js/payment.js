var paginationBar;
var currentPage = 1;
var recPerPage = 10;
$(document).ready(function () {
    initPaymentsTable();
    pagination();

    $('#comboPages').change(function () {
        jumpToPage();
    });

    $('#comboRecCount').change(function () {
        loadDataByPageSize();
    });

    $("#btnSearchPayments").click(function () {
        search();
    });

});

// Initialize the bootstrap table with data
function initPaymentsTable() {
    $.ajax({
        url: "../../dao/payments/get_payments.php",
        type: "GET",
        dataType: "json",
        data: {'page': 1, "recordsCount": recPerPage},
        success: function (data) {
            $('#table-payments').bootstrapTable({
                height: 380,
                pageSize: recPerPage,
                data: data,
                singleSelect: true,
                columns: [{
                        field: 'payment_date',
                        title: 'Payment date',
                        align: 'left',
                        valign: 'bottom',
                        sortable: true
                    }, {
                        field: 'amount',
                        title: 'Amount',
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
                        field: 'type',
                        title: 'Rating',
                        align: 'left',
                        valign: 'bottom',
                        sortable: true
                    }, {
                        field: 'payment_method_name',
                        title: 'Payment method',
                        align: 'left',
                        valign: 'bottom'
                    }]
            });
        },
        error: function (jqXHR, textStatus, errorThrown) {
            $("#modal-commonError").modal('show');
            $("#common-error-msg").text("Error loading data. Message: " + errorThrown);
        }
    });
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
                url: "../../dao/payments/get_payments.php",
                type: "GET",
                dataType: "json",
                data: {"page": page, "recordsCount": recPerPage},
                success: function (result) {
                    $('#table-payments').bootstrapTable('load', result);
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
        url: "../../dao/payments/get_payments_count.php",
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
        url: "../../dao/payments/get_payments.php",
        dataType: "json",
        data: {"page": selectedPage, "recordsCount": recPerPage},
        success: function (result) {
            $('#table-payments').bootstrapTable('load', result);
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
        url: "../../dao/payments/get_payments.php",
        dataType: "json",
        data: {"page": "1", "recordsCount": recPerPage},
        success: function (result) {
            $('#table-payments').bootstrapTable('load', result);
            paginationBar.simplePaginator('changePage', 1);
        }
    });

    $.ajax({
        url: "../../dao/payments/get_payments_count.php",
        success: function (result) {
            var totalPages = Math.ceil(result / recPerPage);
            if (pageCount == 0) {
                pageCount = 1;
            }
            paginationBar.simplePaginator('setTotalPages', totalPages);
            loadPageSelect(totalPages);
        }
    });
}

// Search payments
function search() {
    var searchYear = $('#sel-search-payment').val();
    if (searchYear === "select-year") {
        $('#pagination2').hide();
        $('#pagination').show();
        $('#comboPages').show();
        $('#comboRecCount').show();
        $('.pagiTexts').show();

        $.ajax({
            type: "GET",
            url: "../../dao/payments/get_payments.php",
            dataType: "json",
            data: {"page": 1, "recordsCount": recPerPage},
            success: function (result) {
                $('#table-payments').bootstrapTable('load', result);
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
            url: "../../dao/payments/search_payments.php",
            data: {"searchYear": searchYear, "page": 1},
            success: function (result) {
                $('#table-payments').bootstrapTable('load', result);
            }
        });

        $.ajax({
            type: "get",
            url: "../../dao/payments/pagination_search.php",
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
                    url: "../../dao/payments/search_payments.php",
                    dataType: "json",
                    data: {"searchYear": searchYear, "page": page},
                    success: function (result) {
                        $('#table-payments').bootstrapTable('load', result);
                    }
                });
            }
        });
    }
}