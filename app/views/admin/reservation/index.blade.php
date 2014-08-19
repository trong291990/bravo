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
                        <th>ID</th>
                        <th>Customer Name</th>
                        <th>Tour</th>
                        <th>Booked At</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($reservations as $re) : ?>
                        <tr>
                            <td>{{$re->id}}</td>
                            <td></td>
                            <td></td>
                            <td>
                                <a class='btn btn-sm btn-warning' href="{{Route('admin.reservation.edit',$re->id)}}">Edit</a>
                                <a class='btn btn-sm btn-danger btn-delete' data-method="DELETE" data-url="{{route('admin.reservation.destroy', $re->id)}}">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </tbody>
            </table>
    </div><!-- /.box-body -->
    <div class="box-footer">
        {{$reservations->links()}}
    </div>
</div>
@stop

@section('inline_scripts')
<script type='text/javascript'>
    $('.btn-delete').click(function(e) {
        e.preventDefault();
        var $_this = $(this);
        if (confirm('Are you sure?')) {
            var form = '<form id="form-delete" method="POST" action="' + $_this.data('url') + '">' +
                    '<input type="hidden" name="_method" value="' + $_this.data('method') + '">' +
                    '</form>';
            $(this).append(form);
            $('#form-delete').submit();
        }
    });
</script>
@stop