@section('header_content')
<h1>Travel Albums</h1>
@stop

@section('breadcrumbs')
@include('admin/partials/breadcrumbs', array('breadcrumbs' => Breadcrumbs::generate('albums')))
@stop


@section('content')
<div class="text-right">

</div>
<div class="box box-primary">
    <div class="box-header mt-10">
        <div class="col-md-3">
            <a href="{{route('admin.album.create')}}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Album</a>
            <a href="#" id='btn-add-category' class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Category</a>
        </div>
        <div class="col-md-9">
            {{Former::open()->method('GET')->class('form-filter')}}
            <div class="row">
                <div class="col-md-5">
                    {{Former::select('category_id')->label(false)->addOption('All categories', 'all')->options(categories_for_select($categories))->class('form-control submit-on-change')}}
                </div>
                <div class="col-md-5">
                    {{Former::text('keyword')->label(false)->placeholder('Keyword ...')}}
                </div>
                <div class="col-md-2">
                    <button class="btn btn-primary"><i class="fa fa-search"></i></button>
                    <a href='{{route("admin.album.index")}}' class="btn btn-sm btn-default"><i class="fa fa-times"></i></a>
                </div>
            </div>
            {{Former::close()}}
        </div>
    </div>
    <div class="box-body">
        <div class="row">
            <?php foreach ($albums as $album): ?>
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-6">
                    <div class="album-box">
                        <h5 class='album-name'>
                            {{$album->category->name or 'Uncategorized'}}
                            <br> 
                            <b class='text-info'>{{truncate_words($album->name, 5)}}</b>
                        </h5>
                        <?php $thumb_url = asset('backend/images/no-image.gif') ?>
                        <?php
                        if ($album->primaryPhoto()) {
                            $thumb_url = asset($album->primaryPhoto()->thumb_path);
                        }
                        ?>
                        <img class='album-thumb' src='{{$thumb_url}}'>
                        <div class="album-controls">
                            <a href="{{route('admin.album.show', $album->id)}}" class='btn btn-xs btn-primary'>
                                <i class="fa fa-pencil"></i> Edit
                            </a>  
                            <button class="btn btn-xs btn-danger btn-action-with-confirm" 
                                    data-url='{{route("admin.album.destroy", $album->id)}}'
                                    data-method="DELETE" data-message="Are you sure want to delete this album?">
                                <i class="fa fa-trash-o"></i>
                            </button>
                            <span class='text-muted pull-right'>{{$album->photos->count()}} pics</span>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="box-footer">
        <div class="row">
            <div class="col-md-12">
                <div class="pull-left">
                    <?php echo View::make('partials._paging_info')->with('items', $albums)->render() ?>
                </div>
                <div class="pull-right">
                    {{$albums->appends(Input::except('page'))->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@stop

@section('inline_scripts')
<script type='text/javascript'>
    $('#btn-add-category').click(function(e) {
        e.preventDefault();
        bootbox.prompt('Enter category name', function(cat) {
            if (cat !== null && cat.trim().length > 3) {
                $.post('{{route("admin.album.add_category")}}', {name: cat.trim()})
                        .done(function(data) {
                    bootbox.alert(data.message);
                });
            }
        });
    });
</script>
@stop