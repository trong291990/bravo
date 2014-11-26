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
                    <?php foreach($album->photos as $photo) :?>
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
                
                <?php if($loggedCustomer) :?>
                <li><a href="{{route('travel_album.download', $album->id)}}"><i class="fa fa-download"></i></a></li>
                <?php else :?>
                  <li><a href="#modal-login" data-toggle='modal'><i class="fa fa-download"></i></a></li>
                <?php endif;?>
               
            </ul>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-sm-6">
            <h2>{{ $album->name }}</h2>
            <p>
                {{ $album->description }}
            </p>
        </div>
        <div class="col-sm-3">
            <div class="row" id="album-statictis">
                <div class="col-xs-4">
                    {{$album->views}} <small>View</small>
                </div>
                <div class="col-xs-4">
                    965 <small>faves</small>
                </div>
                <div class="col-xs-4">
                    965 <small>comments</small>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div id="album-licence">
                <p>Taken October 2014</p>
                <p><i style="font-size: 1.2em">&COPY; </i> All rights reserved </p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div id="album-faves-author">
                <i class="fa fa-star"></i>  <a href="#">Tran Dinh Trong</a> ,  <a href="#">Ht Luan</a> and 22 more people like this
            </div>
            <div class="row album-comment-item">
                <div class="col-sm-2">
                    <img src="https://fbcdn-sphotos-b-a.akamaihd.net/hphotos-ak-xfp1/v/t1.0-9/1517419_580090252071910_1609177855_n.jpg?oh=69547dc339dbe3ebdf4d9e8a31b1ab2d&oe=550D99B5&__gda__=1427808026_50f21fe0df3d4abda105febb28a8d60b"
                         class="img-responsive img-thumbnail img-circle no-padding" />
                </div>
                <div class="col-sm-10">
                    <div class="album-comment-author">
                        <a href="#">Trong</a> 1 mo
                    </div>
                    <div class="album-comment-content">
                        If you're unable to log in to your account using your payment service provider ID (PSPID) and password, it may be due to one of the following reasons:
                        <br/>
                        1. You could be in the wrong environment. Are you using your test PSPID and/or password in the production environment, or your production PSPID and/or password in the test environment? You can check the environment at the top of the login screen – it will say either: 'Identification Production' or 'Identification TEST'. To switch environments, use the link under the login box. 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
@section('inline_scripts')
<script>
    $(document).ready(function() {
        Helper.scroll_to($('.detail-album-content'));
        Galleria.loadTheme('/plugins/galleria/galleria.classic.min.js');
        Galleria.run('#galleria', {showInfo: false});
    });
</script>
@stop

