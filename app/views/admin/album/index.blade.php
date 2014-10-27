@section('header_content')
<h1>Travel Albums</h1>
@stop

@section('breadcrumbs')
@include('admin/partials/breadcrumbs', array('breadcrumbs' => Breadcrumbs::generate('albums')))
@stop


@section('content')
<div class="box box-primary">
    <div class="box-header">
        <div class="box-tools text-right">
            <a href="{{route('admin.album.create')}}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> New Album</a>
        </div>
    </div>
    <div class="box-body">
        <ul>
            <?php foreach ($albums as $album): ?>
                <li>
                    <a href="{{route('admin.album.show', $album->id)}}">
                        {{ $album->name }}
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>
</div>
@stop