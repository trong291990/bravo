@section('header_content')
  <h1>Static pages</h1>
@stop
@section('breadcrumbs')
  @include('admin/partials/breadcrumbs', array('breadcrumbs' => Breadcrumbs::generate('static_pages')))
@stop
@section('content')

@stop