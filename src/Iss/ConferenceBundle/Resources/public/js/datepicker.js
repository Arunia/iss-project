$(document).ready(function () {
    $('.datepicker').each(function () {
        $(this).datepicker({
            format: $(this).data('format')
        });
    });
});