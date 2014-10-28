@section('header_content')
<h1>{{ $album->name }} Album</h1>
@stop

@section('breadcrumbs')
@include('admin/partials/breadcrumbs', array('breadcrumbs' => Breadcrumbs::generate('albums')))
@stop


@section('content')
<div class="box box-primary">
    <div class="box-body">
        <div class="row">
            {{ Former::open(route('admin.album.update', $album->id))->class('form-horizontal')->method('PUT') }}
            {{ Former::populate($album) }}            
            <div class="col-md-7">
                {{ View::make('admin.album._form')->with('categories', $categories) }}
                <div class="form-group">
                    <label for="name" class="control-label col-lg-2 col-sm-3">Uploaded</label>
                    <div class="col-lg-10 col-sm-9">
                        <div id="uploaded-files-area">
                            <?php foreach ($album->photos as $photo): ?>
                                {{View::make('admin.album._photo_form')->with('photo', $photo)}}
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>  
                <div class="text-center">
                    <a class="btn btn-default" href="{{route('admin.album.index')}}">Back to list</a>
                    <button class="btn btn-primary" type='submit'><i class="fa fa-save"></i> Save</button>
                </div>
            </div>
            {{ Former::close()}}
            <div class="col-md-5">
                <div class="form-group">
                    <label for="name" class="control-label col-lg-2 col-sm-3">Photos</label>
                    <div class="col-lg-10 col-sm-9">
                        <div id="upload-files-area" class="hide">Select files</div>
                        <br>
                        <button class="btn btn-default" id="btn-start-upload" type='button'>
                            <i class="fa fa-upload"></i> Start upload</button>
                    </div>
                </div>  
            </div>
        </div>
    </div>
</div>
@stop

@section('inline_scripts')
<script type='text/javascript'>
    $(document).ready(function() {
        var uploaderObj = $("#upload-files-area").uploadFile({
            url: "{{route('admin.album.upload_photo', $album->id)}}",
            multiple: true,
            fileName: "photo",
            autoSubmit: false,
            showStatusAfterSuccess: false,
            showAbort: false,
            showDone: false,
            dragDropStr: "<span><b>Drag &amp; Drop</b></span>",
            cancelButtonClass: 'btn btn-mini btn-danger',
            allowedTypes: 'jpg,png,gif',
            maxFileSize: 5242880, // 5MB,
            showProgress: true,
//            showPreview: true,
//            previewHeight: "auto",
//            previewWidth: "100px",
            statusBarWidth: 'auto',
            dragdropWidth: 'auto',
            onSuccess: function(files, data, xhr) {
                if (data.success) {
                    $("#uploaded-files-area").append(data.photo_form);
                } else {
                    bootbox.alert('An error has occurred');
                }
            },
            afterUploadAll: function() {
                Helper.scroll_to($("#uploaded-files-area .uploaded-photo-container:last-child"));
            },
            onError: function(files, status, errMsg) {
            }
        });
        $('#btn-start-upload').click(function(e) {
            uploaderObj.startUpload();
            return false;
        });
        $(document).on('click', '.btn-delete-photo', function(e) {
            var $_this = $(this);
            bootbox.confirm('Are you sure want to delete?', function(res) {
                if (res) {
                    $.post($_this.data('url'), function(res) {
                        $_this.closest('.uploaded-photo-container').fadeOut(500);
                    });
                }
            });
            return false;
        });
    });
</script>

@stop