<?php
$thumb_url = asset('backend/images/no-image.gif');
if ($album->primaryPhoto()) {
    $thumb_url = asset($album->primaryPhoto()->thumb_path);
}
?>
<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 album-thumb-box">
    <a class="thumbnail" href="{{show_album_url($album)}}">
        <img alt="{{$album->name}}" src="{{$thumb_url}}">
    </a>
    <div class="album-detail">
        <a href="{{show_album_url($album)}}">
            {{$album->name}} | <span class="number">{{$album->photos->count()}} photos</span>
        </a>
    </div>
</div>