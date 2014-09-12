$(document).ready(function() {
    $('select').selectpicker();
//    $('input:not(checkbox)').iCheck({
//        checkboxClass: 'icheckbox_square-orange',
//        radioClass: 'iradio_minimal',
//        increaseArea: '40%'
//    });
//    $('input:checkbox').screwDefaultButtons({
//        image: 'url("plugins/screwdefaultbuttons/images/checkbox.jpg")',
//        width: 40,
//        height: 40
//    });
});

function showMap(dom, locations, zoom) {
    if (typeof google !== 'undefined') {
        var map = new google.maps.Map(dom, {
            zoom: zoom,
            center: new google.maps.LatLng(locations[0].lat, locations[0].lng),
            mapTypeId: google.maps.MapTypeId.ROADMAP
        });

        var infowindow = new google.maps.InfoWindow();
        var marker, i;

        for (i = 0; i < locations.length; i++) {
            if ((locations[i].lat !== null) && (locations[i].lng !== null)) {
                marker = new google.maps.Marker({
                    position: new google.maps.LatLng(locations[i].lat, locations[i].lng),
                    map: map,
                    icon: "/frontend/images/common/map.png"
                });
                google.maps.event.addListener(marker, 'click', (function(marker, i) {
                    return function() {
                        infowindow.setContent(locations[i].name);
                        infowindow.open(map, marker);
                    };
                })(marker, i));
            }
        }
    }
}
/**
 * Load tour's place coordinate and draw map
 */
$('.tour-map-container').each(function() {
    var $_this = $(this);
    var _this = this;
    $.get($_this.data('url'), function(response) {
        if (response.success) {
            showMap(_this, response.places, 9);
        }
    });
});
$('.booking-tour').on('click',function(){
   $('#booking-modal').modal('show');
   $('#booking-tour-id').val($(this).data('id'));
});
$('.datepicker').datepicker({
    format: 'yyyy-mm-dd'
});
$('form').validate();
$('.html5-editor').wysihtml5();
