@section('addon_js')
<script src="{{asset('plugins/ckeditor/ckeditor.js')}}"></script>
@stop
@section('header_content')
<h1>Static Page
    <small>{{$page->title}}</small>
</h1>
@stop

@section('breadcrumbs')
@include('admin/partials/breadcrumbs', array('breadcrumbs' => Breadcrumbs::generate('static_pages')))
@stop

@section('content')
<div class="box box-primary">
    {{ Former::populate($page) }}
    {{ Former::open(route('admin.static_page.update')) }}
    {{ Former::hidden('page')->forceValue($page->name)}}
    <div class="box-body">

        {{ Former::text('title') }}
        {{ Former::text('meta_keyword') }}
        {{ Former::textarea('meta_description')->rows(3) }}
        {{ Former::textarea('content')->class('form-control ckeditor')->rows(35) }}

    </div>
    <div class="box-footer text-center">
        <a href="{{route('admin.setting.static_pages')}}" class="btn btn-default">Back to list</a>
        <button type="submit" class="btn btn-primary">Update</button>
    </div>
    {{ Former::close() }}
</div>
@stop

@section('inline_scripts')
<script type="text/javascript">
    $('.ckeditor').each(function(e) {
        CKEDITOR.replace(this);
    });
</script>
@stop