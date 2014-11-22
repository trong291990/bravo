@section('content')
<div class="photor" id="album-detail-slider">
    <div class="photor__viewport">
        <div class="photor__viewportLayer">
            <img src="<?php echo asset('dummy_images')?>/detail_photo/1.jpg" data-thumb="<?php echo asset('dummy_images')?>/detail_photo/thumbs/1.jpg">
            <img src="<?php echo asset('dummy_images')?>/detail_photo/2.jpg" data-thumb="<?php echo asset('dummy_images')?>/detail_photo/thumbs/2.jpg">
            <img src="<?php echo asset('dummy_images')?>/detail_photo/3.jpg" data-thumb="<?php echo asset('dummy_images')?>/detail_photo/thumbs/3.jpg">
            <img src="<?php echo asset('dummy_images')?>/detail_photo/4.jpg" data-thumb="<?php echo asset('dummy_images')?>/detail_photo/thumbs/4.jpg">
            <img src="<?php echo asset('dummy_images')?>/detail_photo/5.jpg" data-thumb="<?php echo asset('dummy_images')?>/detail_photo/thumbs/5.jpg">
            <img src="<?php echo asset('dummy_images')?>/detail_photo/6.jpg" data-thumb="<?php echo asset('dummy_images')?>/detail_photo/thumbs/6.jpg">
            <img src="<?php echo asset('dummy_images')?>/detail_photo/7.jpg" data-thumb="<?php echo asset('dummy_images')?>/detail_photo/thumbs/7.jpg">
            <img src="<?php echo asset('dummy_images')?>/detail_photo/8.jpg" data-thumb="<?php echo asset('dummy_images')?>/detail_photo/thumbs/8.jpg">
            <img src="<?php echo asset('dummy_images')?>/detail_photo/9.jpg" data-thumb="<?php echo asset('dummy_images')?>/detail_photo/thumbs/9.jpg">
        </div>
        <div class="photor__viewportControl">
            <div class="photor__viewportControlPrev"></div>
            <div class="photor__viewportControlNext"></div>
        </div>

    </div>

    <div class="photor__thumbs">
        <div class="photor__thumbsWrap"></div>
    </div>

</div>
@stop
@section('inline_scripts')
<script>
    $(document).ready(function() {
        $('#album-detail-slider').photor();
    });
</script>
@stop
        