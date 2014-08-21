$(document).ready(function() {
    $('.datepicker').datepicker();
    $('.select2-able').select2();

    $('body').on('click', '.btn-delete-with-confirm', function() {
        var $_this = $(this);
        bootbox.confirm('Are you sure want to delete?', function(result) {
            if (result) {
                var form = '<form id="form-delete" method="POST" action="' + $_this.data('url') + '">' +
                        '<input type="hidden" name="_method" value="' + $_this.data('method') + '">' +
                        '</form>';
                $('body').append(form);
                $('#form-delete').submit();
            }
        });
    });
});