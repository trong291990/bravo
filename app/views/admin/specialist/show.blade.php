@section('header_content')
<h1>{{ $specialist->fullName() }}'s profile</h1>
@stop

@section('breadcrumbs')
@include('admin/partials/breadcrumbs', array('breadcrumbs' => Breadcrumbs::generate('specialists')))
@stop

@section('content')
<div class="box box-primary">        
    {{ Former::open(route('admin.specialist.update', $specialist->id))->method('PUT') }}
    {{ Former::populate( $specialist ) }}
    <div class="box-body">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <?php echo View::make('admin.specialist._base_fields'); ?>
                {{ Former::textarea('bio')->rows(5)->readonly() }}
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