@section('header_content')
<h1>
    <i class="fa fa-files-o"></i> Edit tour
    <small>{{$tour->name}}</small>
</h1>
@stop
@section('breadcrumbs')
    @include('admin/partials/breadcrumbs', array('breadcrumbs' => Breadcrumbs::generate('edit_tour',$tour)))
@stop
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="box box-info">
            <div class="box-header">
            </div>
            {{
                Former::open_for_files()->method("PUT")
                ->action('admin/tours/'.$tour->id)
                ->populate($tour)
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
                                    <input <?php if(in_array($place->id,$placeIds)) echo 'checked="checked"' ?> type="checkbox" name="places[]" value="{{$place->id}}" /> {{$place->name}} 
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @endif
                    @endforeach
                    </div>
                </div>
                {{Former::text('name')->class('form-control')->required()}}
                {{Former::text('slug')->class('form-control')}}
                <div class='input-group' style="margin-top: 15px">
                    <label>Travel Styles</label>
                    <div id='travel-style-wrapper' class='cleafix'>
                    <?php foreach (\TravelStyle::all() as $ts):?>
                        <div class='col-sm-4'>
                            <input  <?php if(in_array($ts->id,$travelStyleIds)) echo 'checked="checked"' ?> type="checkbox" name="travelStyle[]" value="{{$ts->id}}" /> {{$ts->name}} 
                        </div>
                    <?php endforeach;?>
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
                 <?php
                    if($tour->photo):
                ?>
                <div class="row">
                    <div class="col-sm-8 col-sm-offset-1" style="margin-top: 10px;margin-bottom: 10px">
                    <img src="<?php echo Request::root().\Tour::PHOTO_PATH.$tour->id.'/'.$tour->photo ?>" class="img-responsive" alt="" />
                </div>
                </div>
                <?php endif;?>
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
