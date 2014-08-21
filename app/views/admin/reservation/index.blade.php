@section('header_content')
<h1>List Reservations</h1>
@stop
@section('breadcrumbs')
@include('admin/partials/breadcrumbs', array('breadcrumbs' => Breadcrumbs::generate('index_reservations')))
@stop
@section('content')
<div class="box box-primary">
    <div class="box-header">
        <div class="box-tools">
            <div class="input-group">
                <input type="text" placeholder="Search" style="width: 150px;" class="form-control input-sm pull-right" name="table_search">
                <div class="input-group-btn">
                    <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                </div>
            </div>
        </div>
    </div><!-- /.box-header -->
    <div class="box-body table-responsive no-padding">
        <table class="table table-hover">
            <tbody>
            <thead>
                <tr>
                    <th>Booking ID</th>
                    <th>Customer Name</th>
                    <th>Tour</th>
                    <th>Created At</th>
                    <th>Confirmed</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($reservations as $re) : ?>
                    <tr>
                        <td>
                            <a href="{{Route('admin.reservation.edit',$re->id)}}">{{$re->booking_id}}</a>
                        </td>
                        <td>{{$re->customer_name}}</td>
                        <td>{{$re->tour->name}}</td>
                        <td>{{$re->created_at->format('M d, Y \a\t H:i')}}</td>
                        <td>
                            <?php if ($re->is_confirmed()) : ?>
                                <span class="text-success"><i class="fa fa-check"></i></span>
                            <?php else : ?>
                                <span class="text-muted"><i class="fa fa-times"></i></span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <a class='btn btn-xs btn-primary' href="{{Route('admin.reservation.edit',$re->id)}}">Edit</a>
                            <a class='btn btn-xs btn-danger btn-delete-with-confirm' data-method="DELETE" data-url="{{route('admin.reservation.destroy', $re->id)}}">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            </tbody>
        </table>
    </div><!-- /.box-body -->
    <div class="box-footer">
        <div class="row">
            <div class="col-md-12">
                <div class="pull-left">
                    <?php echo View::make('partials._paging_info')->with('items', $reservations)->render() ?>
                </div>
                <div class="pull-right">
                    {{$reservations->links()}}
                </div>

            </div>
        </div>
        @stop