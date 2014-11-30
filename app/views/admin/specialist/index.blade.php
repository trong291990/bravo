@section('header_content')
<h1>List Specialist</h1>
@stop

@section('breadcrumbs')
@include('admin/partials/breadcrumbs', array('breadcrumbs' => Breadcrumbs::generate('specialists')))
@stop


@section('content')
<div class="box box-primary">
    <div class="box-header">
        <div class="box-tools">

            <form method='GET' class='form-search'>
                <div class="col-md-4 col-sm-3 col-xs-3">
                    <a href="{{route('admin.specialist.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i> Add New</a>
                </div>
                <div class="col-sm-6 col-md-6 col-xs-6 no-padding">
                    <label for="keyword" class='col-xs-3'>Search</label>
                    <div class="col-xs-9 no-padding">
                        <input type="text" name="keyword" id='keyword' placeholder="Name or email ..." class="form-control" value='{{Input::get("keyword")}}'>
                    </div>
                </div>
                <div class="col-md-2 col-sm-3 col-xs-3">
                    <div class="input-group-btn">
                        <button class="btn btn-primary"><i class="fa fa-search"></i></button>
                        <a href="{{route('admin.specialist.index')}}" title="Clear filter" class="btn btn-sm btn-default"><i class='fa fa-times'></i></a>
                    </div>                         
                </div>  
            </form>
        </div>
    </div>
    <div class="box-body">
        <table class="table table-bordered table-hover">
            <tbody><tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Nationality</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
                <?php foreach ($specialists as $specialist): ?>
                    <tr>
                        <td>{{ $specialist->fullName() }}</td>
                        <td>{{ $specialist->email }}</td>
                        <td>{{ $specialist->nationality }}</td>
                        <td>{{ $specialist->created_at->format('M d, Y \a\t H:i')}}</td>
                        <td>
                            <a class="btn btn-primary btn-xs" href="{{ route('admin.specialist.show', $specialist->id) }}">Profile</a>
                            @if(false)
                            <a href="#" class='btn btn-xs btn-danger btn-action-with-confirm' data-method="DELETE" 
                               data-url="{{route('admin.specialist.destroy', $specialist->id)}}" data-message="Are you sure want to delete this specialist?">
                                <i class="fa fa-times"></i> Delete
                            </a>
                            @endif
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>      
    </div>   
    <div class="box-footer">
        <div class="row">
            <div class="col-md-12">
                <div class="text-left">
                    <?php echo View::make('partials._paging_info')->with('items', $specialists)->render() ?>
                </div>
                <div class="pull-right">
                    {{ $specialists->appends(Input::except('page'))->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@stop