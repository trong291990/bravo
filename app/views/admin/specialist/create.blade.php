@section('header_content')
<h1>Add Specialist</h1>
@stop

@section('breadcrumbs')
@include('admin/partials/breadcrumbs', array('breadcrumbs' => Breadcrumbs::generate('specialists')))
@stop

@section('content')
<div class="box box-primary">        
    {{ Former::open(route('admin.specialist.store'))->method('POST') }}
    <div class="box-body">
        <div class="row">
            <div class="col-md-12">
                <?php echo View::make('admin.specialist._base_fields', compact('areas'))->render(); ?>
                {{ Former::password('password')}}
                {{ Former::password('password_confirmation')->label('confirmation')}}                
            </div>
        </div>
    </div>
    <div class="box-footer text-center">
        <a class="btn btn-default" href="{{route('admin.specialist.index')}}">Back to list</a>
        <button class="btn btn-primary" type="submit">Save</button>
    </div>
    {{ Former::close() }}


</div>
@stop