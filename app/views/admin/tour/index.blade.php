@section('header_content')
<h1>List Tours</h1>
@stop
@section('breadcrumbs')
@include('admin/partials/breadcrumbs', array('breadcrumbs' => Breadcrumbs::generate('list_tours')))
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
    <div class="box-body table-responsive">
        <table class="table table-bordered table-hover">
            <tbody><tr>
                    <th>Tour ID</th>
                    <th style="width: 50%">Name</th>
                    <th>Area</th>
                    <th>Price From($)</th>
                    <th>Action</th>
                </tr>
                <?php foreach ($tours as $tour): ?>
                    <tr>
                        <td>{{$tour->code}}</td>
                        <td><a href="{{route('admin.tour.edit', $tour->id)}}">{{$tour->name}}</a></td>
                        <td>{{$tour->area->name}}</td>
                        <td>{{$tour->price_from}}</td>
                        <td>
                            <a class='btn btn-xs btn-primary' href="{{route('tour.itinerary.index', $tour->id)}}">Itineraries</a>
                            <a class='btn btn-xs btn-warning' href="{{Route('admin.tour.edit',$tour->id)}}">Edit</a>
                            <a class='btn btn-xs btn-danger btn-delete-with-confirm' data-method="DELETE" data-url="{{route('admin.tour.destroy', $tour->id)}}">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody></table>
    </div><!-- /.box-body -->
    <div class="box-footer">
        <div class="row">
            <div class="col-md-12">
                <div class="text-left">
                    <?php echo View::make('partials._paging_info')->with('items', $tours)->render() ?>
                </div>
                <div class="pull-right">
                    {{$tours->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@stop