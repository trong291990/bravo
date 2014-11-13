
    function addLink() {
        //Get the selected text and append the extra info
        var selection = window.getSelection(),
            pagelink = '<br /><br /> Read more at: ' + document.location.href,
            copytext = selection + pagelink,
            newdiv = document.createElement('div');

        //hide the newly created container
        newdiv.style.position = 'absolute';
        newdiv.style.left = '-99999px';

        //insert the container, fill it with the extended text, and define the new selection
        document.body.appendChild(newdiv);
        newdiv.innerHTML = copytext;
        selection.selectAllChildren(newdiv);

        window.setTimeout(function () {
            document.body.removeChild(newdiv);
        }, 100);
    }
    // tempollary disable
    //document.addEventListener('copy', addLink);
$(document).ready(function() {
    $('select').selectpicker();
    $('[data-toggle="modal"]').click(function(){
        $('.modal.in').modal('hide');
    });

    /*
      Handler register form
    */
    $('#form-register').submit(function(e){
        e.preventDefault();
        var $this = $(this);
        $.ajax({
            url: $this.attr('action'),
            type: 'POST',
            data: $this.serialize(),
            beforeSend: function() {
                $this.find('[type="submit"]').attr('disabled', true);
                $this.find('.form-messages').html('');
            },
            success: function(res) {
                console.log(res);
                if(res.success) {
                    location.reload();
                } else {
                    var messagesHtml = '<ul class="list-unstyled">';
                    $.each(res.errors, function(index, errors) {
                        messagesHtml += '<li> ' + errors[0] + ' </li>'
                    });
                    messagesHtml += '</ul>';
                    Helper.flash_message('danger', messagesHtml, $this.find('.form-messages'), 5000);
                }

            },
            complete: function() {
                $this.find('[type="submit"]').attr('disabled', false);
            }
        });
        return false;
    });
    /*
      Handler login form
    */
    $('#form-login').submit(function(e){
        e.preventDefault();
        var $this = $(this);
        $.ajax({
            url: $this.attr('action'),
            type: 'POST',
            data: $this.serialize(),
            beforeSend: function() {
                $this.find('[type="submit"]').attr('disabled', true);
                $this.find('.form-messages').html('');
            },
            success: function(res) {
                console.log(res);
                if(res.success) {
                    location.reload();
                } else {
                    Helper.flash_message('danger', 'Email or password is invalid', $this.find('.form-messages'), 5000);
                }

            },
            complete: function() {
                $this.find('[type="submit"]').attr('disabled', false);
            }
        });
        return false;
    });
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
    format: 'yyyy-mm-dd',
    autoclose: true
});

$('form').validate();
