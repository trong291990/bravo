@section('title')
 | {{$area->name}} tours
@stop

@section('keyword')
 @if($area->keyword_inherit)
 ,{{$area->meta_keyword}}
 @else 
    {{$area->meta_keyword}}
 @endif
@stop

@section('description')
{{$area->meta_description}}
@stop

@section('content')
            <div class="row">
                <div class="col-sm-12">
                    <h1>Best of {{$area->name}}</h1>
                </div>
                <div class="col-sm-12">
                    {{$area->description}}
                </div>
            </div>
           @include('frontend.tours.partials.features')
            <div class="clearfix" id="view-cities">
                SEE CITIES TO VISITS  
                @foreach($searchPlaces as $p)
                <a href="{{route('area_tours',$area->slug)}}/?place={{$p->name}}-{{$p->id}}"> :: {{$p->name}} </a>
                @endforeach
            </div>
            <div class="clearfix" id="package-form">
                <div class="col-sm-4 no-padding" id="package-check">
                    <input type="checkbox">
                    <label id="select-package-label">Select the package</label>
                    <input type="checkbox" />
                    <input type="checkbox" />
                    <input type="checkbox" />
                    <button type="submit" class="btn btn-primary">Compare</button>
                </div>
                <div class="col-sm-8 no-padding">
                    <div class="row">
                        <div class="col-sm-4">
                            <select>
                                <option value="">Sort by travel style</option>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <select>
                                <option value="">Sort by price</option>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <select>
                                <option value="">Sort by duration</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div id="tours-list">
                <?php foreach($tours as $tour): ?>
                <div class="tour-item" data-places='<?php echo json_encode($tour->places->lists('name')) ?>'>
                    <div class="tour-sliders">
                        @if($tour->photo)
                        <a class="thumbnail" href="{{route('tour.show', array($tour->area->slug, $tour->slug))}}">
                            <img src="{{$tour->photoUrl()}}" class="img-responsive" />
                        </a>
                        @endif
                    </div>
                    <div class="tour-content clearfix">
                        <div class="col-sm-8 clearfix">
                            <h3 class="tour-title">
                                {{$tour->name;}} 
                            </h3>
                            <div class="row">
                                <div class="col-sm-8">
                                    <p>Tour Duration : {{$tour->duration}}  days</p>
                                    <p>Tour Code : {{$tour->code}} </p>
                                    <p>Destinations : {{implode(',',$tour->places()->lists('name'))}}</p>
                                    <p>Great for : <span class="great-for">{{implode(',',$tour->travelStyles->lists('name'))}}</span></p>
                                    <p><img src="{{URL::asset('/')}}frontend/images/page/likes.png" /></p>
                                </div>
                                <div class="col-sm-4">
                                    <p class="tour-price">START AT ${{$tour->price_from}} </p>
                                    <p class="tour-note">per person, without air</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 clearfix">
                            <div class="col-sm-6 no-padding-left">
                                <img src="{{URL::asset('/')}}frontend/images/page/map_small.jpg" class="img-responsive" />
                            </div>
                            <div class="col-sm-6 no-padding-right tour-actions">
                                <button class="btn btn-block btn-warning tour-booking">Booking now</button>
                                <p><i class="fa fa-envelope"></i> EMAIL TO FRIEND</p>
                                <p><i class="fa fa-print"></i> PRINT THIS PAGE</p>
                                <p><i class="fa fa-phone-square"></i> 19008198</p>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach;?>
            </div>
            <div class="clearfix">
                <?php echo $tours->links(); ?>
            </div>
@stop
@section('inline_scripts')
<script>
</script>
@stop