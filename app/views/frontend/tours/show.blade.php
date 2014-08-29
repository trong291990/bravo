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

@section('addon_js')
{{ HTML::script("https://maps.googleapis.com/maps/api/js") }}
@stop

@section('content')
<div id="tour-detail">
    <div class="row">
        <div class="col-sm-5">
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li><a href="#">Tours</a></li>
                <li class="active">{{$tour->name}}</li>
            </ol>
        </div>
        <div class='col-sm-2'>
            <button type="button" data-id='{{$tour->id}}' class="btn booking-tour btn-block btn-warning tour-booking">Booking now</button>
        </div>
        <div class="col-sm-5">
            <ul class="list-unstyled list-inline" id="tour-detail-actions">
                <li><i class="fa fa-envelope"></i> EMAIL TO FRIEND</li>
                <li><i class="fa fa-print"></i> PRINT THIS PAGE</li>
                <li><i class="fa fa-phone-square"></i> 19008198</li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-27">
            <p>
                {{$tour->overview}}
            </p>
            <div class="tour-map-container" data-url="{{route('tour.load_place_coordinates', $tour->id)}}"></div>
            <div id="map-des">
                <?php foreach ($places as $index => $place): ?>
                    <p>
                        <span class="badge"> {{$index + 1}} </span> <b>{{$place->name}}</b> <br/>
                    </p>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="col-sm-57">
            <div class="bs-example bs-example-tabs">
                <ul role="tablist" class="nav nav-tabs" id="detail-tour-tab">
                    <li class="active"><a data-toggle="tab" role="tab" href="#tour-detail-itinerary">ITINERARY</a></li>
                    <li class=""><a data-toggle="tab" role="tab" href="#tour-detail-pricing">PRICING</a></li>
                </ul>
                <div class="tab-content" id="detail-tour-tab-content">
                    <div id="tour-detail-itinerary" class="tab-pane fade active in">
                        <div class="cleafix tour-itinerary-item">
                            <div class="col-sm-8">
                                <!-- Itineraries List -->   
                                <?php foreach ($itineraries as $index => $itinerary) : ?>
                                    <div class="col-xs-1 no-padding">
                                        <div class="tour-detail-day">
                                            Day <br/> <span>{{$index + 1}}</span>
                                        </div>
                                    </div>
                                    <div class="col-xs-11">
                                        <h4>{{$itinerary->name}}</h4>
                                        <p>
                                            {{$itinerary->detail}}
                                        </p>
                                        <p>
                                            <?php if ($itinerary->hasAnyMeals()): ?>
                                                <img src="{{asset('frontend/images/page/dinner.png')}}" style="width: 20px" /> 
                                                <?php echo $itinerary->mealsInString() ?>   
                                            <?php endif; ?>
                                            &nbsp;
                                            &nbsp;
                                            <i class="fa fa-building"></i> NOVOTEL CAIRNS
                                        </p>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            <div class="col-sm-4">
                                <div class="tour-itinerary-des">
                                    Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem. Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius. 
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="tour-detail-pricing" class="tab-pane fade">
                        <h3>Price from: <strong>${{$tour->price_from}}</strong></h3>
                        <p>
                            <h3>Include:</h3>
                            {{$tour->include}}
                        </p>
                        <p>
                            <h3>Not Include:</h3>
                            {{$tour->not_include}}
                        </p>
                    </div>
                </div>
            </div>
            <div id="relationship-tours">
                <h3>YOU MAY BE ALSO LIKE</h3>
                <div class="cleafix">
                    <?php foreach ($otherTours as $tour) : ?>
                        <div class="col-sm-3">

                            <div class="relationship-tour-item">
                                <div class="img-thumbnail">
                                    <img src="{{$tour->photoUrl()}}" class="img-responsive" />
                                </div>
                                <div>
                                    <a href="{{route('tour.show', array($area->slug, $tour->slug))}}">
                                        <h4>{{$tour->name}}</h4>
                                    </a>
                                    <p class="price">
                                        STARTING AT ${{$tour->price_from}}
                                    </p>
                                    <p class="des">per person without air</p>
                                </div>
                            </div>

                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="gui-ebooks" class="clearfix">
    <div class="col-sm-6 no-padding">
        <a href="#">
            <img src="{{asset('frontend/images/page/ebook1.png')}}" class="img-responsive" />
        </a>
    </div>
    <div class="col-sm-6 no-padding">
        <a href="#">
            <img src="{{asset('frontend/images/page/ebook2.png')}}" class="img-responsive" />
        </a>
    </div>
</div>
@stop