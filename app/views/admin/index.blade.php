@section('header_content')
<h1>
    <i class="fa fa-dashboard"></i> Dashboard
    <small>Bravo Tour Admin Panel</small>
</h1>
@stop
@section('breadcrumbs')
    @include('admin/partials/breadcrumbs', array('breadcrumbs' => Breadcrumbs::generate('dashboard')))
@stop
@section('content')
<div class="row">
    <div class="col-md-12">

    </div>
</div>
@stop