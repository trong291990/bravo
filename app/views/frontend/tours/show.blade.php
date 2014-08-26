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
        <div class="col-sm-6">
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li><a href="#">Tours</a></li>
                <li class="active">{{$tour->name}}</li>
            </ol>
        </div>
        <div class="col-sm-6">
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
                This 11-day tour visits four of Thailand's best-known cities, from palaces in Bangkok to exotic zoos near the Gulf of Thailand. In between, you'll have some leisure time and the chance to take part in some optional tours.
            </p>
            <div class="tour-map-container" data-url="{{route('tour.load_place_coordinates', $tour->id)}}"></div>
            <div id="map-des">
                <p>
                    <span class="badge"> A </span> <b>Thai Lan</b> <br/>
                    9/1 Moo 3 Amphur Muang Amphur Muang Kanchanaburi, -
                </p>
                <p>
                    <span class="badge"> B </span> <b>Thai Lan</b> <br/>
                    9/1 Moo 3 Amphur Muang Amphur Muang Kanchanaburi, -
                </p>
                <p>
                    <span class="badge"> C </span> <b>Thai Lan</b> <br/>
                    9/1 Moo 3 Amphur Muang Amphur Muang Kanchanaburi, -
                </p>
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
                        <p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo booth letterpress, commodo enim craft beer mlkshk aliquip jean shorts ullamco ad vinyl cillum PBR. Homo nostrud organic, assumenda labore aesthetic magna delectus mollit. Keytar helvetica VHS salvia yr, vero magna velit sapiente labore stumptown. Vegan fanny pack odio cillum wes anderson 8-bit, sustainable jean shorts beard ut DIY ethical culpa terry richardson biodiesel. Art party scenester stumptown, tumblr butcher vero sint qui sapiente accusamus tattooed echo park.</p>
                    </div>
                </div>
            </div>
            <div id="relationship-tours">
                <h3>YOU MAY BE ALSO LIKE</h3>
                <div class="cleafix">
                    <div class="col-sm-3">
                        <div class="relationship-tour-item">
                            <div class="img-thumbnail">
                                <img src="{{asset('frontend/images/page/tour-item.jpg')}}" class="img-responsive" />
                            </div>
                            <div>
                                <h4>Tour Name</h4>
                                <p class="price">
                                    STARTING AT $340
                                </p>
                                <p class="des">per person without air</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="relationship-tour-item">
                            <div class="img-thumbnail">
                                <img src="{{asset('frontend/images/page/tour-item.jpg')}}" class="img-responsive" />
                            </div>
                            <div>
                                <h4>Tour Name</h4>
                                <p class="price">
                                    STARTING AT $340
                                </p>
                                <p class="des">per person without air</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="relationship-tour-item">
                            <div class="img-thumbnail">
                                <img src="{{asset('frontend/images/page/tour-item.jpg')}}" class="img-responsive" />
                            </div>
                            <div>
                                <h4>Tour Name</h4>
                                <p class="price">
                                    STARTING AT $340
                                </p>
                                <p class="des">per person without air</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="relationship-tour-item">
                            <div class="img-thumbnail">
                                <img src="{{asset('frontend/images/page/tour-item.jpg')}}" class="img-responsive" />
                            </div>
                            <div>
                                <h4>Tour Name</h4>
                                <p class="price">
                                    STARTING AT $340
                                </p>
                                <p class="des">per person without air</p>
                            </div>
                        </div>
                    </div>
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