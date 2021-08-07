$(document).ready(function () {
    var table = $('#tblEmployee').DataTable({
         processing: true,
        serverSide: true,
        ajax: {
            url: config.routes.zone,
        },
        "order": [],
        columns: [
            { data: 'name', name: 'name', orderable: true },
            { data: 'email', name: 'email', orderable: true },
            { data: 'designation', name: 'designation', orderable: true },
            { data: 'phone', name: 'phone', orderable: true },
            { data: 'action', name: 'action', orderable: false },
        ],
        oLanguage: {
            sSearch: "",
            sSearchPlaceholder: "Search",
            sEmptyTable: "No Employee Found!",
            sZeroRecords: "No Employee Found!",
         sProcessing: ""
        }
    });
});


