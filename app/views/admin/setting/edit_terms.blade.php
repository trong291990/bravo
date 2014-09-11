@section('header_content')
<h1>
    Terms and condition
</h1>
@stop

@section('breadcrumbs')
@include('admin/partials/breadcrumbs', array('breadcrumbs' => Breadcrumbs::generate('setting')))
@stop

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">
                    Enter content
                </h3>
            </div>
            {{ Former::open(route('admin.setting.update_terms'))->method('POST') }}
            <div class="box-body">
                <textarea class="form-control wysihtml5" rows="20" name='content'>
                {{ $content }}
                </textarea>
            </div>
            <div class="box-footer text-center">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
            {{ Former::close() }}

        </div>

    </div>
</div>

@stop