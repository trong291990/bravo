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

    <!--<h2 id="album-city-heading">HA NOI</h2>-->
    <div id="album-city" class="clearfix">
        <?php foreach ($albums as $album) : ?>
            <?php
            $thumb_url = asset('backend/images/no-image.gif');
            if ($album->primaryPhoto()) {
                $thumb_url = asset($album->primaryPhoto()->thumb_path);
            }
            ?>        
        <a href="{{ show_album_url($album) }}" title="{{ $album->name }}">
                <img alt="{{ $album->name }}" src="{{$thumb_url}}" />
            </a>
        <?php endforeach; ?>
    </div>
</div>
@stop

@section('inline_scripts')
<script type="text/javascript">
    $(document).ready(function() {
        Helper.scroll_to($('#content'));
    });
    $('#album-city').justifiedGallery({
        lastRow: 'nojustify',
        rowHeight: 200,
        rel: 'gallery1', //replace with 'gallery1' the rel attribute of each link
        margins: 1
    });
</script>
@stop