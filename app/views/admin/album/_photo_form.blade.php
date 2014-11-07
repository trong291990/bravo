<div class="uploaded-photo-container">
    <img class="uploaded-photo-thumb" src="{{asset($photo->thumb_path)}}">
    <div class="uploaded-photo-controls">
        <span class='btn-delete-photo text-danger' data-url='{{route("admin.album.delete_photo", $photo->id)}}'>
            <i class="fa fa-times"></i></span>
        <input type="hidden" value="{{$photo->id}}">
        <label>Title</label>
        <input type="text" class="form-control" name="photos[{{$photo->id}}][title]" value='{{$photo->title}}'>
        <label>Primary <input type="radio" class="checkbox" name="is_primary" value="{{$photo->id}}" <?php echo $photo->is_primary ? 'checked' : '' ?>>
        </label>
    </div>
</div>