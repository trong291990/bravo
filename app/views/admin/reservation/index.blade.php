@section('header_content')
<h1>List Reservations</h1>
@stop
@section('breadcrumbs')
@include('admin/partials/breadcrumbs', array('breadcrumbs' => Breadcrumbs::generate('index_reservations')))
@stop
@section('content')
<div class="box box-primary">
    <div class="box-header">
        <div class="row">
            <form method='GET' class='form-search'>
                <div class="col-md-4">
                    <label for="tour_id" class='col-xs-3'>Tour</label>
                    <div class="col-xs-9 no-padding">
                        {{
                        Former::select('tour_id')->addOption('-- Select one --', null)
                        ->fromQuery($tours,'name','id')
                        ->label(false)
                        ->class('select2-able submit-on-change')
                        }}
                    </div>                
                </div>

                <div class="col-md-4 no-padding">
                    <label for="keyword" class='col-xs-3'>Keyword</label>
                    <div class="col-xs-9 no-padding">
                       <input type="text" name="keyword" id='keyword' placeholder="Booking ID, customer name .." class="form-control" value='{{Input::get("keyword")}}'>
                    </div>
                </div>

                <div class="col-md-4 no-padding">
                    <div class="col-sm-8">
                        <label class="col-xs-4" for="status">Status</label>
                        <div class="col-xs-8 no-padding">
                           <?php echo Former::select('status')->options(reservation_statuses_for_select())->label(false)->class('form-control submit-on-change') ?>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="input-group-btn">
                            <button class="btn btn-primary"><i class="fa fa-search"></i></button>
                            <a href="{{route('admin.reservation.index')}}" title="Clear filter" class="btn btn-sm btn-default"><i class='fa fa-times'></i></a>
                        </div>                         
                    </div>                    
                </div>                    
            </form>    
        </div>
    </div><!-- /.box-header -->
    <div class="box-body table-responsive">
        <table class="table table-hover table-bordered">
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
                        <td>{{$re->tour->name or 'Deleted'}}</td>
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