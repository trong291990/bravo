@section('title')
{{$page->title}} – Bravo Indochina Tours
@stop
@section('keyword')
{{$page->meta_keyword}}
@stop
@section('description')
{{$page->meta_description}}
@stop
@section('content')
<div class="row" style="margin-top: 20px;">
    <div class="col-sm-5">
        <ol class="breadcrumb page-breadcrumb" style="margin-bottom: 10px">
            <li><a href="{{Request::root()}}">Home</a></li>
            <li class="active">{{$page->title}}</li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-lg-12" style="margin-top: 30px;margin-bottom: 40px">
        {{ $page->content }}
    </div>
</div>
@stop