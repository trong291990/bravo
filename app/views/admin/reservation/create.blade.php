@section('header_content')
<h1>New Reservation</h1>
@stop
@section('breadcrumbs')
@include('admin/partials/breadcrumbs', array('breadcrumbs' => Breadcrumbs::generate('create_reservation')))
@stop
@section('content')
<div class="box box-primary">
    <?php echo Former::open(route('admin.reservation.store')) ?>
    <div class="box-body">
        <div class="row">
            <?php echo View::make('admin.reservation._form')->with(compact('tours'))->render() ?>
        </div>
    </div> 
    <div class="box-footer text-right">
        <button type="reset" class="btn btn-default">Reset</button>
        <button type="submit" class="btn btn-primary">Save</button>
    </div> 
    <?php echo Former::close() ?>
</div>
@stop