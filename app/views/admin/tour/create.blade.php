@section('header_content')
<h1>
    <i class="fa fa-files-o"></i> New Tour
    <small>Create a new tour</small>
</h1>
@stop
@section('breadcrumbs')
    @include('admin/partials/breadcrumbs', array('breadcrumbs' => Breadcrumbs::generate('create_tour')))
@stop
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="box box-info">
            <div class="box-header">
            </div>
            {{
                Former::open_for_files()->method("POST")
                ->action('admin/tours')
            }}
            <div class="box-body pad">
                {{Former::select('area_id')->fromQuery($areas,'name','id')->class('form-control')->label('Country')->placeholder('Select country')->required()}}
                <div class='control-group' style="margin-top: 15px">
                    <label>Place</label>
                    <div id='travel-place-wrapper' class='cleafix'>
                    @foreach($areas as $area)
                        @if(count($area->places))
                        <div class="area-place-wrapper" data-area="{{$area->id}}">
                            <h5>{{$area->name}}</h5>
                            <div class="row">
                                @foreach($area->places as $place)
                                <div class='col-sm-4'>
                                    <input type="checkbox" name="places[]" value="{{$place->id}}" /> {{$place->name}} 
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @endif
                    @endforeach
                    </div>
                </div>
                {{Former::textarea('meta_keyword')->class('form-control')}}
                <div class="control-group" style="margin-top: 8px;">
                    <label>Keyword Inherit </label> <input type="checkbox" checked="checked" name="keyword_inherit" />
                </div>
                {{Former::text('meta_description')->class('form-control')->label('Meta Description')}}
                <label style="margin-top: 8px">Price From<sup>*</sup></label>
                <div class="input-group">
                    <span class="input-group-addon">$</span>
                    {{Former::text('price_from')->class('form-control')->div(false)->label(false)->required()}}
                </div>
                <label style="margin-top: 8px">Duration<sup>*</sup></label>
                <div class="input-group">
                    {{Former::text('duration')->class('form-control')->div(false)->label(false)->required()}}
                    <span class="input-group-addon">days</span>
                </div>
                {{Former::text('include')->class('form-control')}}
                {{Former::text('not_include')->class('form-control')}}
                {{Former::textarea('overview')->class('form-control')}}
                {{Former::file('photo')->accept('image')}}
            </div>
            <div class="box-footer">
                {{
                    Former::actions()
                    ->large_primary_submit('Submit')
                    ->large_inverse_reset('Reset')
                }}
            </div>
            {{Former::close()}}
        </div>
    </div>
</div>
@stop
@section('inline_scripts')
<script>
     $("#area_id").val('');
    $('#area_id').on('change',function(){
        var areaId = $(this).val();
        
    });
</script>