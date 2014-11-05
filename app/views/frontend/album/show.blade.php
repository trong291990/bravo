@section('title')
{{$album->name}} - {{$area->name}} Travel Album – Bravo Indochina Tours
@stop
@section('content')
<section id="content">
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li><a href="#">Album</a></li>
            <li class="active">Hanoi Day Tours</li>
        </ul>
    </div>

    <div class="container">
        <?php echo View::make('frontend.album._sidebar')->with('areas', $areas) ?>
        <div id="album-detail" class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
            <div class="panel panel-default">
                <div class="panel-heading red">{{$album->name}}</div>
                <div class="panel-body">

                    <!-- album info -->
                    <div class="album-info">
                    <!--    <span class="author">
                            <span><i class="fa fa-pencil"></i>Write By: </span> 
                            <span class="t-color">admin</span>
                        </span>-->

                        <span class="hits">
                            <span><i class="fa fa-eye"></i>Views: </span>
                            <span class="t-color">{{$album->views}}</span>
                        </span>

                        <span class="comment_count">
                            <span><i class="fa fa-comment"></i>Comment: </span>
                            <span class="t-color">0</span>
                        </span>

                        <span class="date-crate">
                            <span><i class="fa fa-calendar"></i>Date create: </span>
                            <span class="t-color">{{$album->created_at->format('Y-m-d')}}</span>
                        </span>

                        <button type="button" class="btn btn-default pull-right"><i class="fa fa-arrow-circle-down"></i>
                            DOWNLOAD</button>
                    </div>

                    <div class="images">
                        <div>
                            <img class="show-icon img-responsive" src="{{asset($album->primaryPhoto()->origin_path)}}" alt="{{$album->name}}" />
                        </div>
                    </div>

                    <!-- slide show -->
                    <div class="slide-wapper">
                        <div id="carousel-album" class="carousel slide" data-ride="carousel">

                            <!-- Wrapper for slides -->
                            <div class="carousel-inner">
                                <!-- Slice with 4 photos -->
                                <?php
                                $photos_groups = array_chunk($album->photos->toArray(), 4);
                                ?>
                                <?php foreach ($photos_groups as $index => $photos) : ?>
                                    <div class="item <?php echo $index == 0 ? 'active' : '' ?>">
                                        <div class="row">
                                            <?php foreach ($photos as $photo) : ?>
                                                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                                    <a class="thumbnail" href="{{asset($photo['origin_path'])}}">
                                                        <img class="icon-album img-responsive" src="{{asset($photo['thumb_path'])}}" alt="...">
                                                    </a>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>

                            <!-- Controls -->
                            <a class="left carousel-control" href="#carousel-album" role="button" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                            </a>
                            <a class="right carousel-control" href="#carousel-album" role="button" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                            </a>
                        </div>
                    </div>

                    <!-- tab description and comment -->
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabborder" role="tablist">
                        <li class="active"><a href="#description" role="tab" data-toggle="tab">Description</a></li>
                        <li><a href="#review" role="tab" data-toggle="tab">Reviews</a></li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane active" id="description">
                            {{$album->description}}
                        </div>
                        <div class="tab-pane" id="review">
                            <div id="review-content">
                                <div class="media">
                                    <a href="#" class="pull-left">
                                        <img alt="64x64" data-src="holder.js/64x64" class="media-object" style="width: 64px; height: 64px;" src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI2NCIgaGVpZ2h0PSI2NCI+PHJlY3Qgd2lkdGg9IjY0IiBoZWlnaHQ9IjY0IiBmaWxsPSIjZWVlIi8+PHRleHQgdGV4dC1hbmNob3I9Im1pZGRsZSIgeD0iMzIiIHk9IjMyIiBzdHlsZT0iZmlsbDojYWFhO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1zaXplOjEycHg7Zm9udC1mYW1pbHk6QXJpYWwsSGVsdmV0aWNhLHNhbnMtc2VyaWY7ZG9taW5hbnQtYmFzZWxpbmU6Y2VudHJhbCI+NjR4NjQ8L3RleHQ+PC9zdmc+">
                                    </a>
                                    <div class="media-body">
                                        <h4 class="media-heading">Media heading on 22/02/2014</h4>
                                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                                    </div>
                                </div>
                                <div class="media">
                                    <a href="#" class="pull-left">
                                        <img alt="64x64" data-src="holder.js/64x64" class="media-object" style="width: 64px; height: 64px;" src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI2NCIgaGVpZ2h0PSI2NCI+PHJlY3Qgd2lkdGg9IjY0IiBoZWlnaHQ9IjY0IiBmaWxsPSIjZWVlIi8+PHRleHQgdGV4dC1hbmNob3I9Im1pZGRsZSIgeD0iMzIiIHk9IjMyIiBzdHlsZT0iZmlsbDojYWFhO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1zaXplOjEycHg7Zm9udC1mYW1pbHk6QXJpYWwsSGVsdmV0aWNhLHNhbnMtc2VyaWY7ZG9taW5hbnQtYmFzZWxpbmU6Y2VudHJhbCI+NjR4NjQ8L3RleHQ+PC9zdmc+">
                                    </a>
                                    <div class="media-body">
                                        <h4 class="media-heading">Media heading on 22/02/2014</h4>
                                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                                    </div>
                                </div>
                            </div>


                            <div class="write-review">
                                <h2 id="review-title">Write a review</h2>
                                <form role="form">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Your Name:</label>
                                        <input type="text" class="form-control" >
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Your Review:</label>
                                        <textarea class="form-control" rows="3"></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-default pull-right">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
</section>

@stop

@section('inline_scripts')
<script type='text/javascript'>
    $(document).ready(function() {
        $("a.thumbnail").click(function(event) {
            event.preventDefault();
            var originUrl = $(this).attr("href");
            $(".show-icon").attr("src", originUrl);
        });
    });
</script>
@stop