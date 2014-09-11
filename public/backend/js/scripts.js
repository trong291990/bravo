$(document).ready(function() {
    $('textarea.wysihtml5').wysihtml5();
    $('.datepicker').datepicker();
    $('.select2-able').select2({
        width: 'resolve'
    });
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
    $('#include').wysihtml5();
    $('#not_include').wysihtml5();

    /* Trigger submit form of select tag on changed */
    $('.submit-on-change').on('change', function(e) {
        $(this).closest('form').submit();
    });
    /* Handler button as form with confirm*/
    $(document).on('click','.btn-action-with-confirm', function(e) {
        e.preventDefault();
        var $_this = $(this);
        var msg = $_this.data('message');
        if(!msg) {
            msg = 'Are you sure?'
        }
        bootbox.confirm(msg, function(result){
            if(result) {
                var form = '<form id="form-confirm-action" method="POST" action="' + $_this.data('url') + '">' +
                    '<input type="hidden" name="_method" value="' + $_this.data('method') + '">' +
                    '<input type="hidden" name="authenticity_token" value="' + $('[name="csrf-token"]').attr('content') + '">' +
                    '</form>';
                $('body').append(form);
                $('#form-confirm-action').submit();
            }
        });        
    });    
});