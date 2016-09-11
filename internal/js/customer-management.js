var paginationBar;
var currentPage = 1;
$(document).ready(function () {
    initCustomerTable();
    pagination();

    $("#btnRefreshCustomers").click(function () {
        refreshCustomerTablePage(currentPage);
    });

    $('#txtSearchCustomer').keyup(function () {
        autoFillSearch();
    });
    $('#txtSearchCustomer').keydown(function () {
        autoFillSearch();
    });

    $("#btnSearchCustomers").click(function () {
        search();
    });

});

// Initialize the bootstrap table with data
function initCustomerTable() {
    $.ajax({
        url: "../../dao/customer_management/get_customers.php",
        type: "GET",
        dataType: "json",
        data: {'page': 1},
        success: function (data) {
            $('#table-customers').bootstrapTable({
                height: 400,
                pageSize: 10,
                data: data,
                singleSelect: true,
                columns: [{
                        field: 'first_name',
                        title: 'First Name',
                        align: 'left',
                        valign: 'bottom',
                        sortable: true
                    }, {
                        field: 'last_name',
                        title: 'Last Name',
                        align: 'left',
                        valign: 'bottom',
                        sortable: true
                    }, {
                        field: 'username',
                        title: 'username',
                        align: 'left',
                        valign: 'bottom',
                        sortable: true
                    }, {
                        field: 'email',
                        title: 'Email',
                        align: 'left',
                        valign: 'bottom'
                    }, {
                        field: 'telephone',
                        title: 'telephone',
                        align: 'right',
                        valign: 'bottom'
                    }, {
                        field: 'status',
                        title: 'Status',
                        align: 'center',
                        valign: 'bottom',
                        sortable: true
                    }, {
                        field: 'operate',
                        title: 'Operations',
                        align: 'center',
                        valign: 'middle',
                        formatter: operateFormatter,
                        events: operateEvents
                    }]
            });
        },
        error: function (jqXHR, textStatus, errorThrown) {
            $("#modal-commonError").modal('show');
            $("#common-error-msg").text("Error loading data. Message: " + errorThrown);
        }
    });

    function operateFormatter(value, row, index) {
        return [
            '<center>',
            '<a class="edit" href="javascript:void(0)" title="Edit">',
            '<i class="glyphicon glyphicon-edit"></i>Edit',
            '</a>&nbsp;&nbsp;',
            '<a class="delete" href="javascript:void(0)" title="Delete">',
            '<i class="glyphicon glyphicon-remove"></i>Delete',
            '</a></center>'
        ].join('');
    }

    window.operateEvents = {
        'click .edit': function (e, value, row, index) {

        },
        'click .delete': function (e, value, row, index) {
            var js = JSON.stringify(row);
            var obj = JSON.parse(js);
            var username = obj["username"];
            $("#modal-deleteCustomerPopup").modal('show');
            $("#lbFname").text("");
            $("#lbFname").text("First name: " + obj["first_name"]);
            $("#lbLname").text("");
            $("#lbLname").text("First name: " + obj["last_name"]);
            $("#lbUsrname").text("");
            $("#lbUsrname").text("First name: " + username);
            $("#lbEmail").text("");
            $("#lbEmail").text("First name: " + obj["email"]);
            $("#lbTel").text("");
            $("#lbTel").text("First name: " + obj["telephone"]);

            $('#deleteCustomerOk').off('click');
            $("#deleteCustomerOk").click(function () {
                $.ajax({
                    url: "../../dao/customer_management/delete_customer.php",
                    type: "GET",
                    data: "json",
                    data: {"username": obj["username"]},
                    success: function (result) {
                        if ($.trim(result) == 1) {
                            $("#modal-deleteCustomerPopup").modal('hide');
                            $("#modal-deleteCustomerSuccess").modal('show');
                        } else {
                            $("#modal-deleteCustomerPopup").modal('hide');
                            $("#modal-deleteUserFail").modal('show');
                        }
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        $("#modal-deleteCustomerPopup").modal('hide');
                        $("#modal-commonError").modal('show');
                        $("#common-error-msg").text("Error message: " + errorThrown);
                    }
                });
            });
        }
    };
}

// Function to refresh the table data
function refreshCustomerTablePage(pageNo) {
    $("#txtSearchCustomer").val("");
    $("#pagination2").hide();
    $("#pagination").show();
    $.ajax({
        url: "../../dao/customer_management/get_customers.php",
        type: "GET",
        dataType: "json",
        data: {"page": pageNo},
        success: function (data) {
            $('#table-customers').bootstrapTable('load', data);
        },
        error: function (jqXHR, textStatus, errorThrown) {
            $("#modal-commonError").modal('show');
            $("#common-error-msg").text("Error refreshing table. Message: " + errorThrown);
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
                url: "../../dao/customer_management/get_customers.php",
                type: "GET",
                dataType: "json",
                data: {"page": page},
                success: function (result) {
                    $('#table-customers').bootstrapTable('load', result);
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
        url: "../../dao/customer_management/get_customers_count.php",
        success: function (result) {
            var pageCount = Math.ceil(result / 10);
            paginationBar.simplePaginator('setTotalPages', pageCount);
        },
        error: function (jqXHR, textStatus, errorThrown) {
            $("#modal-commonError").modal('show');
            $("#common-error-msg").text("Error getting customers count. Message: " + errorThrown);
        }
    });
}

// Setup Typeahead
function autoFillSearch() {
    $.ajax({
        type: "POST",
        dataType: "json",
        url: "../../dao/customer_management/typeahead.php",
        success: function (result) {
            $('#txtSearchCustomer').typeahead({
                name: 'txtSearchCustomer',
                limit: 10,
                minLength: 1,
                source: result
            }).focus();
        }
    });
}

// Search customer
/*function searchCustomers() {
    var fName = $("#txtSearchCustomer").val();
    $.ajax({
        type: "GET",
        dataType: "json",
        url: "../../dao/customer_management/search_customer.php",
        data: {"firstname": fName},
        success: function (result) {
            $('#table-customers').bootstrapTable('load', result);
        },
        error: function (jqXHR, textStatus, errorThrown) {
            $("#modal-commonError").modal('show');
            $("#common-error-msg").text("Error searching customers. Message: " + errorThrown);
        }
    });
}*/

function search() {
    var searchName = $('#txtSearchCustomer').val();
    if (searchName.length == 0) {
        $('#pagination2').hide();
        $('#pagination').show();

        $.ajax({
            type: "POST",
            url: "../../dao/customer_management/get_customers.php",
            dataType: "json",
            data: {"page": "1"},
            success: function (result) {
                $('#table-customers').bootstrapTable('load', result);
                paginationBar.simplePaginator('changePage', 1);
            }
        });
    } else {
        $('#pagination').hide();
        $('#pagination2').show();

        $.ajax({
            type: "GET",
            dataType: "json",
            url: "../../dao/customer_management/search_customer.php",
            data: {"searchName": searchName, "page": 1},
            success: function (result) {
                $('#table-customers').bootstrapTable('load', result);
            }
        });

        $.ajax({
            type: "get",
            url: "../../dao/customer_management/pagination_search.php",
            data: {"searchName": searchName},
            success: function (result) {
                var pageCount = Math.ceil(result / 10);
                paginationBar2.simplePaginator('setTotalPages', pageCount);
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
                    url: "../../dao/customer_management/search_customer.php",
                    dataType: "json",
                    data: {"searchName": searchName, "page": page},
                    success: function (result) {
                        $('#table-customers').bootstrapTable('load', result);
                    }
                });
            }
        });
    }
}
