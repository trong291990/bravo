@section('title')
{{$album->name}} - {{$area->name}} Travel Album – Bravo Indochina Tours
@stop
@section('body_class')
detail-album
@stop
@section('container_class')
detail-album-content
@stop
@section('content')
<div id="album-wrapper">
    <div class="container">
        <div class="row relative">
            <div class="col-sm-8 col-sm-offset-2">
                <div id="galleria" style="height: 420px">
                    <?php foreach ($album->photos as $photo) : ?>
                        <a href="{{asset($photo->origin_path)}}">
                            <img 
                                src="{{asset($photo->thumb_path)}}"
                                data-big="{{asset($photo->origin_path)}}"
                                data-title="{{$photo->title}}"
                                data-description="{{$photo->title}}"
                                >
                        </a>
                    <?php endforeach; ?>
                </div>

            </div>
            <div id="album-backlink"><a href="{{route('travel_album')}}">Back to search</a></div>
            <ul id="album-actions" class="list-inline list-unstyled">
                <li><a href="#"><i class="fa fa-star"></i></a></li>
                <li><a href="#"><i class="fa fa-mail-forward"></i></a></li>

                <?php if ($loggedCustomer) : ?>
                    <li><a href="{{route('travel_album.download', $album->id)}}"><i class="fa fa-download"></i></a></li>
                <?php else : ?>
                    <li><a href="#modal-login" data-toggle='modal'><i class="fa fa-download"></i></a></li>
                <?php endif; ?>

            </ul>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-sm-7">
            <h2>{{ $album->name }}</h2>
            <p>
                {{ $album->description }}
            </p>
        </div>
        <div class="col-sm-3">
            <div class="row" id="album-statictis">
                <div class="col-xs-4">
                    {{$album->views}} <small>Views</small>
                </div>
                <div class="col-xs-4">
                    965 <small>faves</small>
                </div>
                <div class="col-xs-4">
                    {{$album->comments()->count()}} <small>comments</small>
                </div>
            </div>
        </div>
        <div class="col-sm-2">
            <div id="album-licence">
                <p>Taken {{$album->created_at->format('M Y')}}</p>
                <p><i style="font-size: 1.2em">&COPY; </i> All rights reserved </p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-7">
            <div id="album-faves-author">
                <div class="">
                    <?php $albumURL = show_album_url($album) ?>
                    <span class='st_facebook_hcount' st_url="{{ $albumURL }}" st_title="Bravo Tours - {{$album->name}} travel album" displayText='Facebook'></span>
                    <span class='st_twitter_hcount' st_url="{{ $albumURL }}" st_title="Bravo Tours - {{$album->name}} travel album" displayText='Tweet'></span>
                    <span class='st_googleplus_hcount' st_url="{{ $albumURL }}" st_title="Bravo Tours - {{$album->name}} travel album" displayText='Google +'></span>
                </div>                
            </div>
            <div id="comments-container">
                <?php foreach ($album->comments as $comment) : ?>
                    <?php echo View::make('frontend.album._comment_box', compact('comment')) ?>
                <?php endforeach; ?>
            </div>
            <?php if ($loggedCustomer): ?>
                <h3>Write your comment:</h3>
                <div id="comment-form">
                    <?php echo Former::open(route('travel_album.comment.store', $album->id))->id('form-comment') ?>
                    <div class="form-group">
                        <div class="col-md-12">
                            <h4>Rate:  <span id="comment-box-raty"></span> </h4> 
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <textarea rows="5" class="form-control" name="content"></textarea>
                        </div>
                    </div>
                    <div class="form-group text-right">
                        <div class="col-md-12">
                            <button class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                    <?php echo Former::close() ?>
                </div>
            <?php else: ?>
                <h4>
                    <a href="#modal-login" data-toggle='modal'>Login</a> to write your comment
                </h4>
            <?php endif; ?>
        </div>
    </div>
</div>
@stop
@section('addon_stylesheets')
{{ HTML::style('/plugins/raty/jquery.raty.css') }}
@stop
@section('addon_js')
{{ HTML::script('/plugins/raty/jquery.raty.js') }}
@stop
@section('inline_scripts')
<script>
    $(document).ready(function() {
        Helper.scroll_to($('.detail-album-content'));
        Galleria.loadTheme('/plugins/galleria/galleria.classic.min.js');
        Galleria.run('#galleria', {showInfo: false});
        $('.comment-raty').each(function() {
            var scored = $(this).data('scored');
            $(this).raty({starType: 'i', score: scored, readOnly: true});
        });
        $('#comment-box-raty').raty({starType: 'i', 'score': 3});
        $('#form-comment').submit(function(e) {
            e.preventDefault();
            var $this = $(this);
            var $submitBtn = $this.find('button');
            $submitBtn.busyOn();
            $.ajax({
                url: $this.attr('action'),
                type: $this.attr('method'),
                data: $this.serialize(),
                success: function(res) {
                    if (res.success) {
                        $('#comments-container').append(res.html);
                        var scored = $('.comment-raty:last').data('scored');
                        $('.comment-raty:last').raty({starType: 'i', score: scored, readOnly: true});
                        $this.get(0).reset();
                        $('#comment-box-raty').raty({starType: 'i', 'score': 3});
                    } else {
                        bootbox.alert(res.message);
                    }
                },
                complete: function() {
                    $submitBtn.busyOff();
                }
            });
        });
    });
</script>
@stop

