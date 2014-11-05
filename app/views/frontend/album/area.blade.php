@section('title')
{{$area->name}} Travel Album – Bravo Indochina Tours
@stop
@section('content')
<section id="content">
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li class="active">Album</li>
        </ul>
    </div>

    <div class="container">

        <?php echo View::make('frontend.album._sidebar')->with('areas', $areas) ?>
        <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h1 class="title">Album</h1>
                    <p>{{$area->description}}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default album">
                        <div class="panel-heading yellow">Albums</div>
                        <div class="panel-body">
                            <div class="row album-row">
                                <?php foreach ($albums as $album): ?>
                                    <?php $thumb_url = asset('backend/images/no-image.gif') ?>
                                    <?php
                                    if ($album->primaryPhoto()) {
                                        $thumb_url = asset($album->primaryPhoto()->thumb_path);
                                    }
                                    ?>                        
                                    <div class="album-box col-xs-12 col-sm-6 col-md-3 col-lg-3">
                                        <a href="{{show_album_url($album)}}" class="thumbnail">
                                            <img src="{{$thumb_url}}" alt="..." />
                                        </a>
                                        <div class="album-detail">
                                            <a href="{{show_album_url($album)}}">
                                                {{$album->name}} | <span class="number">{{$album->photos->count()}} photos</span>
                                            </a>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <div class="panel-footer">
                            <div class="clearfix text-right">
                                <?php echo $albums->links(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default album">
                        <div class="panel-heading red">Most view in {{$area->name}}</div>
                        <div class="panel-body">
                            <div class="row album-row">
                                <?php foreach ($mostViewAlbums as $album): ?>
                                    <?php $thumb_url = asset('backend/images/no-image.gif') ?>
                                    <?php
                                    if ($album->primaryPhoto()) {
                                        $thumb_url = asset($album->primaryPhoto()->thumb_path);
                                    }
                                    ?>                        
                                    <div class="album-box col-xs-12 col-sm-6 col-md-3 col-lg-3">
                                        <a href="{{show_album_url($album)}}" class="thumbnail">
                                            <img src="{{$thumb_url}}" alt="..." />
                                        </a>
                                        <div class="album-detail">
                                            <a href="{{show_album_url($album)}}">
                                                {{$album->name}} | <span class="number">{{$album->photos->count()}} photos</span>
                                            </a>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
</section>
@stop