@if ($breadcrumbs)
    <ol class="breadcrumb">
        <li><a href="{{Request::root()}}"><i class="fa fa-home"></i> Home</a></li>
        @foreach ($breadcrumbs as $breadcrumb)
            @if (!$breadcrumb->last)
                <li><a href="{{{ $breadcrumb->url }}}">{{{ $breadcrumb->title }}}</a></li>
            @else
                <li class="active">{{{ $breadcrumb->title }}}</li>
            @endif
        @endforeach
    </ol>
@endif
