@section('title')
Travel Album – Bravo Indochina Tours
@stop
@section('content')
<div id="content">
    <h1 class="title" style="margin-top:20px">Search for a photo/video</h1>
    <p>
        A multi-country Indochina tour can be rewarding and time-efficient, as Vietnam, Cambodia, Laos, Myanmar and Thailand in this land all has their unique charm in such a close proximity. All of our itineraries are designed with maximized experience quality and flexibility. All you need to do is tell us your travel interests & needs, and show up to enjoy the beautiful culture diversity and nature sceneries across Southeast Asia & Indochina regions. Start with a look at our most popular multi-country South Asia tours, or simply send us a tailor-made trip inquiry free of charge
    </p>
    <?php echo View::make('frontend.album._form_search', compact('areas')) ?>
    
    <div id="album-index-list">
        <div class="panel panel-default album">
            <div class="panel-heading">TOP CITIES IN INDOCHINA
                <a class="view-more pull-right" href="{{route('travel_album',['type' => Album::TYPE_CITY])}}">View more</a>
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
                <a class="view-more pull-right" href="{{route('travel_album',['type' => Album::TYPE_HOTEL])}}">View more</a>
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
                <a class="view-more pull-right" href="{{route('travel_album',['type' => Album::TYPE_TRAVELLER])}}">View more</a>
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