(function(){
  var initialed = false;
  var currentInstance = null;
  function createModal() {
   var html = '<div class="modal fade" id="modal-insert-album" tabindex="-1" role="dialog" aria-hidden="false"> \
        <div class="modal-dialog modal-lg"> \
          <div class="modal-content"> \
              <div class="modal-header"> \
                  <button type="button" class="bootbox-close-button close" data-dismiss="modal" aria-hidden="true">×</button> \
                  <h4 class="modal-title">Add album\'s link</h4> \
              </div>\
              <div class="modal-body"> \
                  <div class="input-group">\
                      <input type="text" id="input-keyword" class="form-control" placeholder="Search for albums">\
                      <span class="input-group-btn">\
                        <button class="btn btn-default" id="btn-search-album" type="button"><i class="fa fa-search"></i></button>\
                      </span> \
                  </div> \
                  <div id="albums-result-container"> \
                  </div> \
                  <br/>\
                  <strong>Link info: </strong>\
                  <div class="row">\
                    <div class="col-sm-4">\
                      <input type="text" id="link-text" placeholder="Text" class="form-control">\
                    </div>\
                    <div class="col-sm-6">\
                      <input type="text" id="link-url" placeholder="URL" class="form-control">\
                    </div>\
                    <div class="col-sm-2">\
                      <button class="btn btn-primary btn-block" id="btn-insert-link">Insert</button>\
                    </div>\
                  </div>\
              </div>\
              <div class="modal-footer">\
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>\
              </div> \
          </div>\
      </div>\
    </div>';
    return html;
  }
  // Code to execute when the toolbar button is pressed
  var excute =  {
    exec: function(editor) {
      currentInstance = editor;
      function insertAlbumLinkToEditor(text, url, klass) {
        var html = '<a href="' + url +' " class="' + klass +'">' + text +'</a> ';
        var newElement = CKEDITOR.dom.element.createFromHtml( html, currentInstance.document );
        currentInstance.insertElement( newElement );
        currentInstance.insertText(' ');
      };

      if(!initialed) {
        $('body').append(createModal());
        $('#input-keyword').keyup(function(e) {
          if((e.keyCode || e.which) == 13) {
            $('#btn-search-album').trigger('click');
          }
        });

        $('#btn-search-album').click(function(e) {
          var keyword = $('#input-keyword').val();
          if(keyword.trim().length > 0 ) {
            $.get(baseURL + "/admin/album/search-for-insert-link?keyword=" + keyword, function(res) {
              $('#albums-result-container').fadeOut(150, function(){
                $('#albums-result-container').html(res);
              }).fadeIn(300);
            });
          }

        });

        $('#btn-insert-link').click(function(e) {
          var linkText = $('#link-text').val().trim();
          var linkURL = $('#link-url').val().trim();
          if(linkText.length > 0 && linkURL.length > 0) {
            insertAlbumLinkToEditor(linkText, linkURL, 'link-to-album');
            $('#modal-insert-album').modal('hide');        
          }
        });

        $('#albums-result-container').on('click', '.btn-select-album', function(e) {
          e.stopPropagation();
          var $_selectAlbum = $(this).closest('.album-search-item');
          insertAlbumLinkToEditor(
            $_selectAlbum.data('album-name'),
            $_selectAlbum.data('album-url'),
            'link-to-album'
          );
          $('#modal-insert-album').modal('hide'); 
        });

        $('#albums-result-container').on('click', '.album-search-item', function(e) {
          var $_selectAlbum = $(this);
          $('#albums-result-container').find('.album-search-item').not(this).removeClass('selected');
          $_selectAlbum.addClass('selected');
          $('#link-text').val($_selectAlbum.data('album-name'));
          $('#link-url').val($_selectAlbum.data('album-url'));
        });
        initialed = true;
      }

      $('#modal-insert-album').modal();
    }
  },

// Create the button and add the functionality to it

  b = 'insertAlbum';
  CKEDITOR.plugins.add(b, {
    icons: "",
    init: function(editor) {
      editor.addCommand(b, excute);
      editor.ui.addButton("insertAlbum",{
        label: 'Insert Album', 
        icon: this.path + "/icon.png",
        command: b
      });
    }
  }); 
})();