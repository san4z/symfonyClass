$(function () {
    $('.tableData').dataTable({
        "oLanguage": {
            "sSearch": "جستجو:",
            "oPaginate": {
                "sNext": "صفحه بعد",
                "sPrevious": "صفحه قبل"
            },
            "sEmptyTable": "اطلاعات موجود نمی باشد",
            "sInfo": "_TOTAL_ نمایش ورودی ها(_START_ - _END_)",
            "sInfoEmpty": "No entries to show",
            "sLengthMenu": "نمایش _MENU_ داده",
            "sInfoFiltered": " - جدا شده از _MAX_ سطر داده"
        },
        "search": {
            "regex": true
        },
        responsive: true

    });
});   