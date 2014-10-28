@section('header_content')
<h1>List Categories</h1>
@stop

@section('breadcrumbs')
@include('admin/partials/breadcrumbs', array('breadcrumbs' => Breadcrumbs::generate('albums')))
@stop

@section('content')
<div class="box box-primary">
    <div class="box-header">
        <div class="box-tools text-right">
            <a href="#" id='btn-add-category' class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Add Category</a>
        </div>
    </div>
    <div class="box-body">
        <table class="table table-bordered table-hover">
            <tbody>
                <tr>
                    <th>Name</th>
                    <th>Albums</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
                <?php foreach ($categories as $category): ?>
                    <tr>
                        <td>{{ $category->name }}</td>
                        <td>
                            <a href="{{route('admin.album.index', ['category_id' => $category->id])}}">{{ $category->albums()->count() }}</a>
                        </td>
                        <td>{{ $category->created_at->format('M d, Y \a\t H:i')}}</td>
                        <td>
                            <a class="btn btn-primary btn-xs" href="#">Edit</a>
                            <a href="#" class='btn btn-xs btn-danger btn-action-with-confirm' data-method="DELETE" 
                               data-url="{{route('admin.album_category.destroy', $category->id)}}" 
                               data-message="Are you sure want to delete this category?">
                                <i class="fa fa-times"></i> Delete
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>      
    </div>   
</div>
@stop

@section('inline_scripts')
<script type='text/javascript'>
    $('#btn-add-category').click(function(e) {
        e.preventDefault();
        bootbox.prompt('Enter category name', function(cat) {
            if (cat !== null && cat.trim().length > 3) {
                $.post('{{route("admin.album.add_category")}}', {name: cat.trim()})
                        .done(function(data) {
                    bootbox.alert(data.message);
                    location.reload();
                });
            }
        });
    });
</script>
@stop