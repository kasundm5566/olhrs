var paginationBar;
var currentPage = 1;
var recPerPage = 10;
$(document).ready(function () {
    initUsersTable();
    pagination();

    $("#btnRefreshUser").click(function () {
        refreshUsersTablePage(currentPage);
    });

    $('#txtSearchUser').keyup(function () {
        autoFillSearch();
    });
    $('#txtSearchUser').keydown(function () {
        autoFillSearch();
    });

    $("#btnSearchUser").click(function () {
        search();
    });

    $('#comboPages').change(function () {
        jumpToPage();
    });

    $('#comboRecCount').change(function () {
        loadDataByPageSize();
    });

    $('#btn-addUser').off('click');
    $("#btn-addUser").click(function () {

        $('#modal-user-add').modal({
            backdrop: 'static',
            keyboard: false
        });

        $.ajax({
            type: "GET",
            url: "../../dao/user_management/get_groups.php",
            dataType: "json",
            success: function (result) {
                var select = $("#user-group"), options = '';
                select.empty();
                for (var i = 0; i < result.length; i++) {
                    options += "<option value='" + result[i].group_name + "'>" + result[i].group_name + "</option>";
                }
                select.append(options);
            }
        });

        $('#btn-adduser-ok').off('click');
        $("#btn-adduser-ok").click(function () {
            addUser();
        });
    });

});

// Initialize the bootstrap table with data
function initUsersTable() {
    $.ajax({
        url: "../../dao/user_management/get_users.php",
        type: "GET",
        dataType: "json",
        data: {'page': 1, "recordsCount": recPerPage},
        success: function (data) {
            $('#table-users').bootstrapTable({
                height: 380,
                pageSize: recPerPage,
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
                        title: 'Username',
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
                        title: 'Conatct no',
                        align: 'right',
                        valign: 'bottom'
                    }, {
                        field: 'group_name',
                        title: 'Group',
                        align: 'left',
                        valign: 'bottom',
                        sortable: true
                    }, {
                        field: 'registered_date',
                        title: 'Registered date',
                        align: 'right',
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
            var js = JSON.stringify(row);
            var obj = JSON.parse(js);

            $('#modal-user-update').modal({
                backdrop: 'static',
                keyboard: false
            });

            $("#update-firstname").val("");
            $("#update-firstname").val(obj["first_name"]);
            $("#update-lastname").val("");
            $("#update-lastname").val(obj["last_name"]);
            $("#update-email").val("");
            $("#update-email").val(obj["email"]);
            $("#update-contactno").val("");
            $("#update-contactno").val(obj["telephone"]);
            $("#update-username").val("");
            $("#update-username").val(obj["username"]);

            $.ajax({
                type: "POST",
                url: "../../dao/user_management/get_groups.php",
                dataType: "json",
                success: function (result) {
                    var select = $("#update-user-group"), options = '';
                    select.empty();
                    for (var i = 0; i < result.length; i++) {
                        if (result[i].group_name == obj["group_name"]) {
                            options += "<option value='" + result[i].group_name + "' selected>" + result[i].group_name + "</option>";
                        } else {
                            options += "<option value='" + result[i].group_name + "'>" + result[i].group_name + "</option>";
                        }
                    }
                    select.append(options);
                }
            });

            $('#btn-reset-password').off('click');
            $("#btn-reset-password").click(function () {
                $("#modal-reset-password").modal('show');
                $("#lbl-resetpass-username").text(obj["username"]);

                $('#btn-resetPass-ok').off('click');
                $('#btn-resetPass-ok').click(function () {
                    var isResetPassValid = validatePassword($("#update-password"), $("#lbl-update-password-error"));
                    var isResetRepassValid = validateRetypedPass($("#update-repassword"), $("#lbl-update-repassword-error"), $("#update-password"));
                    if (isResetPassValid == false || isResetRepassValid == false) {
                        $("#lbl-reset-password-error").text("Validation errors found.");
                    } else {
                        $("#lbl-reset-password-error").text("");
                        resetUserPassword($("#lbl-resetpass-username").text(), $("#update-password").val());
                    }
                });
            });

            $('#btn-updateUser-ok').off('click');
            $("#btn-updateUser-ok").click(function () {
                var isUpdateFNameValid = validateFirstName($("#update-firstname"), $("#lbl-update-fname-error"));
                var isUpdateLNameValid = validateLastName($("#update-lastname"), $("#lbl-update-lname-error"));
                var isUpdateEmailValid = validateEmail($("#update-email"), $("#lbl-update-email-error"));
                var isUpdateContactNoValid = validateContactNo($("#update-contactno"), $("#lbl-update-contactno-error"));

                if (isUpdateFNameValid == false || isUpdateLNameValid == false || isUpdateEmailValid == false || isUpdateContactNoValid == false) {
                    $("#modal-validation-error-popup").appendTo('body').modal("show");
                    return false;
                } else {
                    updateUser();
                }
            });

            $("#btn-updateUser-cancel").click(function () {
                resetFields($(".lbl-signup-errors"), $(".update-input-fields"));
            });
        },
        'click .delete': function (e, value, row, index) {
            var js = JSON.stringify(row);
            var obj = JSON.parse(js);
            var username = obj["username"];
            $("#modal-deleteUserPopup").modal('show');
            $("#lbFname").text("");
            $("#lbFname").text("First name: " + obj["first_name"]);
            $("#lbLname").text("");
            if (obj["last_name"] == null || obj["last_name"] == "") {
                $("#lbLname").text("Last name: -");
            } else {
                $("#lbLname").text("Last name: " + obj["last_name"]);
            }
            $("#lbUsrname").text("");
            $("#lbUsrname").text("username: " + username);
            $("#lbEmail").text("");
            $("#lbEmail").text("Email: " + obj["email"]);
            $("#lbTel").text("");
            $("#lbTel").text("Contact no: " + obj["telephone"]);
            $("#lbGroup").text("");
            $("#lbGroup").text("Group: " + obj["group_name"]);

            $('#deleteUserOk').off('click');
            $("#deleteUserOk").click(function () {
                deleteUser(obj);
            });
        }
    };
}

// Function to refresh the table data
function refreshUsersTablePage(pageNo) {
    $("#txtSearchUser").val("");
    $("#pagination2").hide();
    $("#pagination").show();

    $('#comboPages').show();
    $('#comboRecCount').show();
    $('.pagiTexts').show();
    $.ajax({
        url: "../../dao/user_management/get_users.php",
        type: "GET",
        dataType: "json",
        data: {"page": pageNo, "recordsCount": recPerPage},
        success: function (data) {
            $('#table-users').bootstrapTable('load', data);
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
                url: "../../dao/user_management/get_users.php",
                type: "GET",
                dataType: "json",
                data: {"page": page, "recordsCount": recPerPage},
                success: function (result) {
                    $('#table-users').bootstrapTable('load', result);
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
        url: "../../dao/user_management/get_users_count.php",
        success: function (result) {
            var pageCount = Math.ceil(result / recPerPage);
            paginationBar.simplePaginator('setTotalPages', pageCount);
            loadPageSelect(pageCount);
        },
        error: function (jqXHR, textStatus, errorThrown) {
            $("#modal-commonError").modal('show');
            $("#common-error-msg").text("Error getting users count. Message: " + errorThrown);
        }
    });
}

// Setup Typeahead
function autoFillSearch() {
    $.ajax({
        type: "GET",
        dataType: "json",
        url: "../../dao/user_management/typeahead.php",
        success: function (result) {
            $('#txtSearchUser').typeahead({
                name: 'txtSearchUser',
                limit: 10,
                minLength: 1,
                source: result
            }).focus();
        }
    });
}

// Search user
function search() {
    var searchName = $('#txtSearchUser').val();
    if (searchName.length == 0) {
        $('#pagination2').hide();
        $('#pagination').show();
        $('#comboPages').show();
        $('#comboRecCount').show();
        $('.pagiTexts').show();

        $.ajax({
            type: "GET",
            url: "../../dao/user_management/get_users.php",
            dataType: "json",
            data: {"page": 1, "recordsCount": recPerPage},
            success: function (result) {
                $('#table-users').bootstrapTable('load', result);
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
            url: "../../dao/user_management/search_user.php",
            data: {"searchName": searchName, "page": 1},
            success: function (result) {
                $('#table-users').bootstrapTable('load', result);
            }
        });

        $.ajax({
            type: "get",
            url: "../../dao/user_management/pagination_search.php",
            data: {"searchName": searchName},
            success: function (result) {
                var pageCount = Math.ceil(result / recPerPage);
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
                    url: "../../dao/user_management/search_user.php",
                    dataType: "json",
                    data: {"searchName": searchName, "page": page},
                    success: function (result) {
                        $('#table-users').bootstrapTable('load', result);
                    }
                });
            }
        });
    }
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
        url: "../../dao/user_management/get_users.php",
        dataType: "json",
        data: {"page": selectedPage, "recordsCount": recPerPage},
        success: function (result) {
            $('#table-users').bootstrapTable('load', result);
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
        url: "../../dao/user_management/get_users.php",
        dataType: "json",
        data: {"page": "1", "recordsCount": recPerPage},
        success: function (result) {
            $('#table').bootstrapTable('load', result);
            paginationBar.simplePaginator('changePage', 1);
        }
    });

    $.ajax({
        url: "../../dao/user_management/get_users_count.php",
        success: function (result) {
            var totalPages = Math.ceil(result / recPerPage);
            paginationBar.simplePaginator('setTotalPages', totalPages);
            loadPageSelect(totalPages);
        }
    });
}

// Add a new user record to the database
function addUser() {
    var isFirstNameValid = validateFirstName($("#signup-firstname"), $("#lbl-signup-fname-error"));
    var isLastNameValid = validateLastName($("#signup-lastname"), $("#lbl-signup-lname-error"));
    var isEmailValid = validateEmail($("#signup-email"), $("#lbl-signup-email-error"));
    var isContactNoValid = validateContactNo($("#signup-contactno"), $("#lbl-signup-contactno-error"));
    var isUsernameValid = validateCustomerUserName($("#user-username"), $("#lbl-signup-username-error"));
    var isPasswordValid = validatePassword($("#signup-password"), $("#lbl-signup-password-error"));
    var isRetypedPasswordValid = validateRetypedPass($("#signup-repassword"), $("#lbl-signup-repassword-error"), $("#signup-password"));

    if (isFirstNameValid === false || isLastNameValid === false || isEmailValid === false || isContactNoValid === false || isUsernameValid === false || isPasswordValid === false || isRetypedPasswordValid === false) {
        $("#modal-validation-error-popup").modal("show");
        return false;
    } else {
        $("#modal-addUser-ConfirmPopup").modal('show');
        $("#lblFname").text("");
        $("#lblFname").text("First name: " + $("#signup-firstname").val());
        $("#lblLname").text("");
        $("#lblLname").text("Last name: " + $("#signup-lastname").val());
        $("#lblEmail").text("");
        $("#lblEmail").text("Email: " + $("#signup-email").val());
        $("#lblTel").text("");
        $("#lblTel").text("Contact no: " + $("#signup-contactno").val());
        $("#lblUsrname").text("");
        $("#lblUsrname").text("Username: " + $("#user-username").val());
        $("#lblGroup").text("");
        $("#lblGroup").text("Group: " + $("#user-group").val());

        $('#addUserOk').off('click');
        $("#addUserOk").click(function () {
            $.ajax({
                url: "../../dao/user_management/add_user.php",
                data: $("#form-adduser").serialize(),
                success: function (result) {
                    if ($.trim(result) == 1) {
                        $("#modal-addUser-ConfirmPopup").modal('hide');
                        $("#modal-user-add").modal('hide');
                        $("#form-adduser").trigger('reset');
                        $("#modal-addUserSuccess").modal('show');
                        refreshUsersTablePage(currentPage);
                        resetFields($(".lbl-signup-errors"), $(".signup-input-fields"));
                    } else {
                        $("#modal-addUser-ConfirmPopup").modal('hide');
                        $("#modal-addUserFail").modal('show');
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    $("#modal-commonError").modal('show');
                    $("#common-error-msg").text("Error adding new user. Message: " + errorThrown);
                }
            });
        });
    }
}

function resetUserPassword(username, password) {
    $.ajax({
        url: "../../dao/user_management/reset_password.php",
        data: {"username": username, "password": password},
        success: function (result) {
            if ($.trim(result) == 1) {
                $("#modal-reset-password").modal('hide');
                $("#modal-user-update").modal('hide');
                $("#modal-resetPasswordSuccess").modal('show');
            } else {
                $("#lbl-reset-password-error").text("INTERNAL ERROR OCCURRED...");
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            $("#modal-commonError").modal('show');
            $("#common-error-msg").text("Error resetting password. Message: " + errorThrown);
        }
    });
}

function deleteUser(obj) {
    $.ajax({
        url: "../../dao/user_management/delete_user.php",
        type: "GET",
        data: "json",
        data: {"username": obj["username"]},
        success: function (result) {
            if ($.trim(result) == 1) {
                $("#modal-deleteUserPopup").modal('hide');
                $("#modal-deleteUserSuccess").modal('show');
                refreshUsersTablePage(currentPage);
            } else {
                $("#modal-deleteUserPopup").modal('hide');
                $("#modal-deleteUserFail").modal('show');
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            $("#modal-deleteUserPopup").modal('hide');
            $("#modal-commonError").modal('show');
            $("#common-error-msg").text("Error message: " + errorThrown);
        }
    });
}

function updateUser() {
    $username = $("#update-username").val();
    $fname = $("#update-firstname").val();
    $lname = $("#update-lastname").val();
    $email = $("#update-email").val();
    $contactNo = $("#update-contactno").val();
    $groupName = $("#update-user-group").val();
    $.ajax({
        url: "../../dao/user_management/update_user.php",
        data: {"update-username": $username, "update-fname": $fname,
            "update-lname": $lname, "update-email": $email, "update-contactno": $contactNo,
            "update-group": $groupName
        },
        success: function (result) {
            if ($.trim(result) == 1) {
                $("#modal-user-update").modal('hide');
                $("#modal-updateSuccess").modal('show');
                refreshUsersTablePage(currentPage);
            } else {
                alert(result);
                $("#modal-updateUserFail").modal('show');
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            $("#modal-commonError").modal('show');
            $("#common-error-msg").text("Error message: " + errorThrown);
        }
    });
}