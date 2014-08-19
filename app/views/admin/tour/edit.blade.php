@section('header_content')
<h1>
    Edit tour
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
            ->action(route('admin.tour.update', $tour->id))
            ->populate($tour)
            }}
            <div class="box-body pad">
                {{Former::text('name')->class('form-control')->required()}}
                {{Former::select('area_id')->fromQuery($areas,'name','id')->class('form-control')->label('Area')->placeholder('-- Select one --')->required()}}
                <div class="form-group">
                    <label for="travel_styles" class="control-label col-lg-2 col-sm-4">Travel styles<sup>*</sup></label>
                    <div class="col-lg-10 col-sm-8 travel-style-boxes">
                        <?php
                        
                        $travelStyleIdsSelected = Input::old('travel_styles', []);
                        if(empty($travelStyleIdsSelected)) {
                            $travelStyleIdsSelected = $travelStyleIds;
                        }
                        ?>
                        <?php foreach ($travelStyles as $index => $ts) : ?>
                            <label class="col-md-5 checkbox"> <input name="travel_styles[]" value="{{ $ts->id }}" type="checkbox" <?php echo in_array($ts->id, $travelStyleIdsSelected) ? 'checked' : '' ?>>{{ $ts->name }}</label>
                        <?php endforeach; ?>
                    </div>
                </div>
                
                <div class='form-group'>
                    <label class="control-label col-lg-2 col-sm-4">Place</label>
                    <div id='travel-place-wrapper' class='col-lg-10 col-sm-8'>
                        @foreach($areas as $area)
                        @if(count($area->places))
                        <div class="area-place-wrapper" data-area="{{$area->id}}">
                            <h5>{{$area->name}}</h5>
                            <div class="row">
                                <?php
                                $placeIdsSelected = Input::old('places', []);
                                ?>                                    
                                @foreach($area->places as $place)
                                <div class='col-sm-4'>
                                    <label>
                                        <input type="checkbox" name="places[]" value="{{$place->id}}" <?php echo in_array($place->id, $placeIds) ? 'checked' : '' ?>/> {{$place->name}} 
                                    </label>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @endif
                        @endforeach
                    </div>
                </div>
                {{Former::textarea('meta_keyword')->class('form-control')}}
                {{Former::checkbox('keyword_inherit')}}
                {{Former::text('meta_description')->class('form-control')->label('Meta Description')}}
                {{Former::text('price_from')->class('form-control')->placeholder('$')->required()}}
                {{Former::text('duration')->class('form-control')->placeholder('days')->required()}}
                {{Former::text('include')->class('form-control  ckeditor')}}
                {{Former::text('not_include')->class('form-control  ckeditor')}}
                {{Former::textarea('overview')->class('form-control')}}
                {{Former::file('photo')->accept('image')}}
                @if($tour->photo)
                <div class="row" style="margin-bottom: 15px;">
                    <div class="col-sm-8 col-sm-offset-2">
                        <a target="_blank" href="{{Request::root()}}/{{Tour::PHOTO_PATH}}/{{$tour->id}}/{{$tour->photo}}">
                            <i class="fa fa-chain"> </i> {{$tour->photo}}
                        </a>
                    </div>
                </div>
                @endif
                {{Former::file('thumbnail')->accept('image')}}
                @if($tour->thumbnail)
                <div class="row" style="margin-bottom: 15px;">
                    <div class="col-sm-8 col-sm-offset-2">
                        <a target="_blank" href="{{Request::root()}}/{{Tour::PHOTO_PATH}}/{{$tour->id}}/{{$tour->thumbnail}}">
                            <i class="fa fa-chain"> </i> {{$tour->thumbnail}}
                        </a>
                    </div>
                </div>
                @endif
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
