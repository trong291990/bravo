<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
    <!-- category -->
    <div class="panel panel-default panel-category">
        <div class="panel-heading blue">Album Category</div>
        <div class="panel-body">
            <div class="list-group">
                <?php foreach ($areas as $area): ?>
                    <a href="{{route('album.area', slug_string($area->name))}}" class="list-group-item "><span class="badge">32</span>{{$area->name}}</a>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <!-- download -->
    <div class="panel panel-default download">
        <div class="panel-body">
            <p class="title1">Enjoy all your privileges</p>
            <p class="title2">Donload <br/> Free Full-size Photos!</p>
            <button type="button" class="btn btn-default">Create a new accout <i class="fa fa-arrow-circle-right"></i>
            </button>
        </div>
    </div>

    <!-- Search -->
    <div class="panel panel-default">
        <div class="panel-heading yellow">Search</div>
        <div class="panel-body">
            <form role="form">
                <div class="form-group">
                    <label Select Contry</label>
                    <select class="form-control">
                        <?php foreach ($areas as $area): ?>
                            <option value='{{$area->id}}'>{{$area->name}}</option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Keywork</label>
                    <input type="text" class="form-control" >
                </div>

                <button type="submit" class="btn btn-default">Search</button>
            </form>
        </div>
    </div>

</div>