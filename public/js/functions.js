$(document).ready(function(){
    $('select').selectpicker();
    $('input').iCheck({
        checkboxClass: 'icheckbox_minimal',
        radioClass: 'iradio_minimal',
        increaseArea: '40%'
    });
//    $('input:checkbox').screwDefaultButtons({
//        image: 'url("plugins/screwdefaultbuttons/images/checkbox.jpg")',
//        width: 40,
//        height: 40
//    });
});