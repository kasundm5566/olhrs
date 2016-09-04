$(document).ready(function () {
    $('#table-javascript').bootstrapTable({
        url: '../../dao/data2.json',
        height: 400,
        pageSize: 20,
        singleSelect: true,
        minimumCountColumns: 3,
        columns: [{
                field: 'id',
                title: 'User ID',
                align: 'right',
                valign: 'bottom',
                sortable: true
            }, {
                field: 'fistname',
                title: 'First Name',
                align: 'right',
                valign: 'bottom',
                sortable: true
            }, {
                field: 'lastname',
                title: 'Last Name',
                align: 'right',
                valign: 'bottom',
                sortable: true
            }, {
                field: 'email',
                title: 'Email',
                align: 'right',
                valign: 'bottom',
                sortable: true
            }, {
                field: 'contactno',
                title: 'Contact No',
                align: 'right',
                valign: 'bottom',
                sortable: true
            }, {
                field: 'operate',
                title: 'Item Operate',
                align: 'center',
                valign: 'middle',
                formatter: operateFormatter,
                events: operateEvents
            }]
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