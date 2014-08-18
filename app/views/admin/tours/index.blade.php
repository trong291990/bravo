@section('header_content')
<h1>
    <i class="fa fa-files-o"></i> Listed Tours
    <small>All your tours</small>
</h1>
@stop
@section('breadcrumbs')
    @include('admin/partials/breadcrumbs', array('breadcrumbs' => Breadcrumbs::generate('list_tours')))
@stop
@section('content')
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
        <tbody><tr>
            <th>ID</th>
            <th>Name</th>
            <th>Country</th>
            <th>Price From</th>
            <th>Action</th>
        </tr>
        <?php foreach ($tours as $tour):?>
        <tr>
            <td>{{$tour->id}}</td>
            <td>{{$tour->name}}</td>
            <td>{{$tour->country}}</td>
            <td>{{$tour->price_from}}</td>
            <td>
                <a class='btn btn-primary'>Itineraries</a>
                <a class='btn btn-warning'>Edit</a>
                <a class='btn btn-danger'>Delete</a>
            </td>
        </tr>
        <?php endforeach;?>
    </tbody></table>
</div><!-- /.box-body -->
<div class="box-footer">
    <ul class="pagination">
      <li><a href="#">«</a></li>
      <li><a href="#">1</a></li>
      <li><a href="#">2</a></li>
      <li><a href="#">3</a></li>
      <li><a href="#">4</a></li>
      <li><a href="#">5</a></li>
      <li><a href="#">»</a></li>
    </ul>
</div>
</div>
@stop