@section('header_content')
<h1>Static pages</h1>
@stop
@section('breadcrumbs')
@include('admin/partials/breadcrumbs', array('breadcrumbs' => Breadcrumbs::generate('static_pages')))
@stop
@section('content')
<div class="box box-primary">
    <div class="box-body">
        <table class="table table-bordered table-hover">
            <tbody>
                <tr>
                    <th style="width: 50%">Title</th>
                    <th>URL</th>
                    <th>Action</th>
                </tr>

                <?php foreach ($pages as $page): ?>
                    <tr>
                        <td>
                            {{$page->title}}
                        </td>
                        <td>
                            /{{$page->name}}
                        </td>
                        <td>
                            <a class="btn btn-xs btn-primary" href="{{route('admin.static_page.edit', ['page' => $page->name ])}}">Edit</a>
                            <a class="btn btn-xs btn-default" href="{{route(str_replace('-','_', $page->name))}}" target="_blank">Go to this page</a>
                        </td>
                    </tr>

                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
@stop