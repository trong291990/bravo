//CKEDITOR
if (typeof (CKEDITOR) !== 'undefined') {
	CKEDITOR.replace('ck-editor');
}
//SELECT2
$('.select2').select2();
//DELETE FORM
$('a[data-method="delete"]').on('click', function() {
	var dataConfirm = $(this).attr('data-confirm');
	if (typeof dataConfirm === 'undefined') {
		dataConfirm = 'Are you sure want to delete?';
	}
	var token = $('[name="csrf-token"]').attr('content');
	var action = $(this).attr('href');
	if (confirm(dataConfirm)) {
		var form =
				$('<form>', {
					'method': 'POST',
					'action': action
				});
		var tokenInput =
				$('<input>', {
					'type': 'hidden',
					'name': '_token',
					'value': token
				});
		var hiddenInput =
				$('<input>', {
					'name': '_method',
					'type': 'hidden',
					'value': 'delete'
				});
		form.append(tokenInput, hiddenInput).hide().appendTo('body').submit();
	}
	return false;
});
//AUTOHIDE MESSAGE
setTimeout(function(){
    $('#flash-message-autohide').remove();
}, 5000);