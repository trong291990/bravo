(function($) {
    /**
     * Turn on/off busy state of buttons with in-progressing style 
     * See class .btn-inprogress in site.css
     */
    $.fn.busyOn = function() {
        this.addClass('btn-inprogress').attr('disabled', true);
        return this;
    };

    $.fn.busyOff = function() {
        this.removeClass('btn-inprogress').removeAttr('disabled');
        return this;
    };
})(jQuery);

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

    window.setTimeout(function() {
        document.body.removeChild(newdiv);
    }, 100);
}
// tempollary disable
//document.addEventListener('copy', addLink);
$(document).ready(function() {
    $('.btn-email-friend').click(function(e) {
        $(this).closest('.tour-item').find('.st_email_hcount').click();
        return false;
    });
    $(document).on('click', '.btn-add-wishlist', function(e) {
        var $this = $(this);
        $this.busyOn();
        $.post($this.data('add-url'), function(res) {
            if (res.success) {
                bootbox.alert(res.message);
                $this.text('Remove from Wishlist');
                $this.busyOff()
                        .removeClass('btn-add-wishlist')
                        .addClass('btn-remove-wishlist');
            }

        });
    });

    $(document).on('click', '.btn-remove-wishlist', function(e) {
        var $this = $(this);
        $this.busyOn();
        $.post($this.data('remove-url'), function(res) {
            if (res.success) {
                bootbox.alert(res.message);
                $this.text('Add to Wishlist');
                $this.busyOff()
                        .removeClass('btn-remove-wishlist')
                        .addClass('btn-add-wishlist');
            }
        });
    });

    
    $('[data-toggle="modal"]').click(function() {
        $('.modal.in').modal('hide');
    });

    /*
     Handler register form
     */
    $('#form-register').submit(function(e) {
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
                if (res.success) {
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
    $('#form-login').submit(function(e) {
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
                if (res.success) {
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
$('.booking-tour').on('click', function() {
    $('#booking-modal').modal('show');
    $('#booking-tour-id').val($(this).data('id'));
});

$('.datepicker').datepicker({
    format: 'yyyy-mm-dd',
    autoclose: true
}); 
$('select:not(.not-picker)').selectpicker();
$('form').validate();

$(':file.bootstrap-input-file').each(function() {
    var $_this = $(this);
    var placeholder = 'Choose a file';
    console.log($_this.attr('multiple'));
    if($_this.attr('multiple')) {
        placeholder = 'Choose files'
    }
    var default_options = {
        inputGroupClass: 'input-group',
        inputClass: 'form-control',
        inputPlaceholder: placeholder,
        browseButtonClass: 'btn btn-default',
        browseButtonText: 'Browse'
    }
    var options = default_options;
    

    var $inputName = $_this.attr('name');
    var wrapper_html = '<div class="' + options.inputGroupClass + '">' +
      '<input type="text" autocomplete="off" placeholder="' + options.inputPlaceholder + '" class="' + options.inputClass + '" data-for-input-name="' + $inputName + '">' +
      '<span class="input-group-btn">' +
      '<a class="' + options.browseButtonClass + '" data-for-input-name="' + $inputName + '">' + options.browseButtonText + '</a>' + '</span>' +
      +'</div>';
    // Hide the real input
    $_this.css('visibility','hidden');
    $_this.css('position','absolute');
    
    // Insert text input after the file input
    $(wrapper_html).insertBefore($_this);
    // Show browse dialog when clicked on to input text or button
    $('[data-for-input-name="' + $inputName + '"]').on('click', function() {
        $_this.trigger('click');
    });

    // Handler change event on file input
    $_this.change(function() {

        var selected_file_path = $_this.val();
        var selectedFiles = '';
        for (var i = 0; i < $_this[0].files.length; i++) {
            var fileName = $_this[0].files[i].name;
            // Get actually the selected file name
            selectedFiles += fileName;
            if ((i + 1) !== $_this[0].files.length) {
                selectedFiles += ' , ';
            }
        }
        $('input[data-for-input-name="' + $inputName + '"]').val(selectedFiles);
    });
});