@section('title')
Travel Album – Bravo Indochina Tours
@stop
@section('content')
<div id="content">
    <h1 class="title" style="margin-top:20px">Search for a photo/video</h1>
    <p>
        Spread over an extensive area of 330,000 sq kilometers extending to the south of the Chinese border alongside the east coast of the Indo-China Peninsula, Vietnam is a small Southeast Asian country. It presents a pleasing potpourri of meandering rivers, towering mountains, and dense forests boasting exquisite fauna, rich delta plains and lovely tropical beaches with long stretches of shimmering sand. It has been decades since the conclusion of the American war in Vietnam, but for many, it is the first thing that still comes to mind when talking about this country. In fact, Vietnam boasts gorgeous landscapes with several quaint villages. This country is home to some of the most pristine islands and finest beaches in the entire Southeast Asia. These attractions are situated on the coastline of Vietnam. Delectable seafood items can be found here because of the country’s nearness to the sea. Vietnamese are forever cheerful and welcome visitors with politeness. They take pride in their rich heritage that is very much reflected in their daily life. Spirituality in this country is an amazing amalgamation of Confucianism and Christianity merged with Animism, Taoism, Tam Giao (which means triple region) and Buddhism. Vietnam will never fail to fascinate you with its picturesque setting, historic cities and gracious people.
    </p>
    <div id="album-index-search">
        <form action="" method="GET" class="row" id="form-filter-album">
            <div class=" form-group col-sm-3">
                <label>Select Country</label>
                <select class="form-control no-br not-picker" id="select-album-country" name="country">
                    <?php foreach ($areas as $area): ?>
                        <option value='{{strtolower($area->name)}}' data-url="{{route('album.area', slug_string($area->name))}}">{{$area->name}}</option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class=" form-group col-sm-3">
                <label>Album type</label>
                <select class="form-control no-br not-picker" id="select-album-type" name="type">
                    <option value="">-- Select one --</option>
                    <?php foreach (Album::typesLabelsMap(false) as $key => $val): ?>
                        <option value='{{$key}}'>{{$val}}</option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group col-sm-3">
                <label>Keyword</label>
                <input type="text" class="form-control no-br" id="filter-keyword" name="keyword"/>
            </div>
            <div class="form-group col-sm-3">
                <label style="display: block">&nbsp;</label>
                <button class="btn btn-primary no-br" type="submit"><i class="fa fa-search"></i> Search</button>
            </div>
        </form>
    </div>
    <div id="album-index-list">
        <div class="panel panel-default album">
            <div class="panel-heading">TOP CITIES IN INDOCHINA
                <a class="view-more pull-right" href="#">View more</a>
            </div>
            <div class="panel-body">
                <div class="row album-row">
                    <?php foreach ($cityAlbums as $album) : ?>
                        <?php echo View::make('frontend.album._album_thumb', compact('album')) ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <div class="panel panel-default album">
            <div class="panel-heading">HOTES & RESORTS
                <a class="view-more pull-right" href="#">View more</a>
            </div>
            <div class="panel-body">
                <div class="row album-row">
                    <?php foreach ($hotelAlbums as $album) : ?>
                        <?php echo View::make('frontend.album._album_thumb', compact('album')) ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        <div class="panel panel-default album">
            <div class="panel-heading">Traveller Albums
                <a class="view-more pull-right" href="#">View more</a>
            </div>
            <div class="panel-body">
                <div class="row album-row">
                    <?php foreach ($travellerAlbums as $album) : ?>
                        <?php echo View::make('frontend.album._album_thumb', compact('album')) ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>        
    </div>
</div>
@stop

@section('inline_scripts')
<script type="text/javascript">
//    $('#form-filter-album').on('submit', function(e) {
//        e.preventDefault();
//        var albumAreaUrl = $('#select-album-country').find(':checked').data('url');
//        var albumType = $('#select-album-type').val();
//        var keyword = $("#filter-keyword").val().trim();
//        var nextUrl = albumAreaUrl;
//        if (albumType) {
//            nextUrl += "?type=" + albumType;
//            if (keyword.length !== 0) {
//                nextUrl += "?keyword=" + keyword;
//            }
//        } else if (keyword.length !== 0) {
//            nextUrl += "?keyword=" + keyword;
//        }
//        window.location = nextUrl;
//    });
</script>
@stop