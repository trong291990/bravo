@section('header_content')
<h1>New Album</h1>
@stop

@section('breadcrumbs')
@include('admin/partials/breadcrumbs', array('breadcrumbs' => Breadcrumbs::generate('albums')))
@stop


@section('content')
<div class="box box-primary">
    <div class="box-header">
    </div>
    {{ Former::open(route('admin.album.store'))->class('form-horizontal') }}
    <div class="box-body">
        {{ View::make('admin.album._form')->with('categories', $categories) }}
    </div>
    <div class="box-footer text-center">
        <button class="btn btn-primary">Save</button>
        <a class="btn btn-default" href="{{route('admin.album.index')}}">Back to list</a>
    </div>
    {{ Former::close()}}
</div>
@stop

@section('inline_scripts')
<script type='text/javascript'>
    $(document).ready(function() {
        $("#upload-files-area").uploadFile({
            url: "",
            multiple: true,
            fileName: "myfile",
            showStatusAfterSuccess: false,
            showAbort: false,
            showDone: false
        });
    });
</script>

@stop