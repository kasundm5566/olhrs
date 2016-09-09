$(document).ready(function () {
    $.ajax({
        url: "../../dao/get_users.php",
        type: "GET",
        dataType: "json",
        success: function (data) {
            $('#table-javascript').bootstrapTable({
                height: 400,
                pageSize: 20,
                data: data,
                singleSelect: true,
                columns: [{
                        field: 'first_name',
                        title: 'First Name',
                        align: 'right',
                        valign: 'bottom',
                        sortable: true
                    }, {
                        field: 'last_name',
                        title: 'Last Name',
                        align: 'right',
                        valign: 'bottom',
                        sortable: true
                    }, {
                        field: 'username',
                        title: 'username',
                        align: 'right',
                        valign: 'bottom',
                        sortable: true
                    }, {
                        field: 'email',
                        title: 'Email',
                        align: 'right',
                        valign: 'bottom'
                    }, {
                        field: 'telephone',
                        title: 'telephone',
                        align: 'right',
                        valign: 'bottom'
                    }, {
                        field: 'status',
                        title: 'Status',
                        align: 'right',
                        valign: 'bottom'
                    }, {
                        field: 'operate',
                        title: 'Item Operate',
                        align: 'center',
                        valign: 'middle',
                        formatter: operateFormatter,
                        events: operateEvents
                    }]
            });
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert("Error" + errorThrown);
        }
    });
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

    }
};