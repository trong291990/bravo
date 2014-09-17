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
            <div class="row">
                <form method='GET' class='form-search'>
                    <div class="col-md-3 col-md-offset-5">
                        <label for="area_id" class='col-xs-3'>Area</label>
                        <div class="col-xs-9 no-padding">
                            {{
                            Former::select('area_id')->addOption('-- Select one --', null)
                            ->fromQuery($areas,'name','id')
                            ->label(false)
                            ->class('form-control submit-on-change')
                            }}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="keyword" class='col-xs-4'>Search</label>
                        <div class="col-xs-8 no-padding">
                            <div class="input-group">
                                <input type="text" name="keyword" id='keyword' placeholder="ID or name" class="form-control" value='{{Input::get("keyword")}}'>
                                <div class="input-group-btn">
                                    <button class="btn btn-primary"><i class="fa fa-search"></i></button>
                                    <a href="{{route('admin.tour.index')}}" title="Clear filter" class="btn btn-sm btn-default"><i class='fa fa-times'></i></a>
                                </div>
                            </div>  
                        </div>  
                    </div>
                    <div class=""></div>
                </form>
            </div>
        </div>
    </div><!-- /.box-header -->
    <div class="box-body table-responsive">
        <table class="table table-bordered table-hover">
            <tbody><tr>
                    <th>Tour ID</th>
                    <th style="width: 35%">Name</th>
                    <th>Area</th>
                    <th>Price From($)</th>
                    <th>Created At</th>
                    <th style='min-width: 180px;'>Action</th>
                </tr>
                <?php foreach ($tours as $tour): ?>
                    <tr>
                        <td>{{$tour->code}}</td>
                        <td><a href="{{route('admin.tour.edit', $tour->id)}}">{{$tour->name}}</a></td>
                        <td>{{$tour->area->name}}</td>
                        <td>{{$tour->price_from}}</td>
                        <td>{{$tour->created_at->format('M d, Y \a\t H:i')}}</td>
                        <td>
                            <a class='btn btn-xs btn-primary' href="{{route('tour.itinerary.index', $tour->id)}}">Itineraries</a>
                            <a class='btn btn-xs btn-warning' href="{{Route('admin.tour.edit',$tour->id)}}">Edit</a>
                            <a class='btn btn-xs btn-danger btn-delete-with-confirm' data-method="DELETE" data-url="{{route('admin.tour.destroy', $tour->id)}}">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div><!-- /.box-body -->
    <div class="box-footer">
        <div class="row">
            <div class="col-md-12">
                <div class="text-left">
                    <?php echo View::make('partials._paging_info')->with('items', $tours)->render() ?>
                </div>
                <div class="pull-right">
                    {{$tours->appends(Input::except('page'))->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@stop