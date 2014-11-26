<div id="album-index-search">
    <form action="" method="GET" class="row" id="form-filter-album">
        <div class=" form-group col-sm-3">
            <label>Select Country</label>
            <select class="form-control no-br not-picker" id="select-album-country" name="country">
                <option value="">-- All --</option>
                <?php foreach ($areas as $area): ?>
                    <option value='{{strtolower($area->name)}}' <?php echo (Input::get('country') == strtolower($area->name)) ? 'selected' : '' ?> 
                            data-url="{{route('album.area', slug_string($area->name))}}">{{$area->name}}</option>
                        <?php endforeach; ?>
            </select>
        </div>
        <div class=" form-group col-sm-3">
            <label>Album type</label>
            <select class="form-control no-br not-picker" id="select-album-type" name="type">
                <option value="">-- All --</option>
                <?php foreach (Album::typesLabelsMap(false) as $key => $val): ?>
                    <option value='{{$key}}' <?php echo (Input::get('type') == $key) ? 'selected' : '' ?>>{{$val}}</option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group col-sm-3">
            <label>Keyword</label>
            <input type="text" class="form-control no-br" id="filter-keyword" name="keyword" value="{{trim(Input::get('keyword'))}}"/>
        </div>
        <div class="form-group col-sm-3">
            <label style="display: block">&nbsp;</label>
            <button class="btn btn-primary no-br" type="submit"><i class="fa fa-search"></i> Search</button>
            <?php if (inputHasAny(['country', 'type', 'keyword'])) : ?>
                <a class="btn btn-default btn-xs no-br" href="{{route('travel_album')}}"> <i class="fa fa-times"></i></a>
            <?php endif; ?>
        </div>
    </form>
</div>