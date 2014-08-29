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
            <div class="row">
                <div class="col-sm-8">
                    <div class="bs-example bs-example-tabs">
                    <ul role="tablist" class="nav nav-tabs" id="detail-tour-tab">
                        <li class="active"><a data-toggle="tab" role="tab" href="#tour-detail-itinerary">ITINERARY</a></li>
                        <li class=""><a data-toggle="tab" role="tab" href="#tour-detail-pricing">PRICING</a></li>
                    </ul>
                    <div class="tab-content" id="detail-tour-tab-content">
                    <div id="tour-detail-itinerary" class="tab-pane fade active in">
                        <div class="cleafix tour-itinerary-item">
                            <div class="">
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
                        </div>
                    </div>
                    <div id="tour-detail-pricing" class="tab-pane fade">
                        <p>
                            {{$tour->include}}
                        </p>
                        <p>
                            {{$tour->not_include}}
                        </p>
                    </div>
                </div>
                </div>
                </div>
                <div class="col-sm-4">
                    <div class="tour-itinerary-des">
                        <p><b>Duration : {{$tour->duration}}  days</b></p>
                        <p><b> Tour Code: {{$tour->code}}</b></p>
                        <p><b>Destinations : {{implode(',',$tour->places()->lists('name'))}}</b></p>
                        <p><b> Great For: <span class="great-for">{{implode(',',$tour->travelStyles->lists('name'))}}</span></b></p>
                        <p><b>*Starting at  ${{$tour->price_from}}</b></p>
                        11-day/8-night tour of Thailand, Tour priced per person and based on double occupancy
                        <br/>
                        Send A Enquiry & Receive reply within 59 minutes<br/>
                        After receiving your online enquiry, one of our professional travel consultant will go to work for you. He/she will prepare a very reasonable itinerary and quote our best price. If there is no itinerary in our ready-made tours that meets your needs, just click “Customize Your Indochina Trip” to send us your requirements. More detailed information is highly appreciated as it will help us optimize your customized tour plan more effectively.
                        We will be pleased to make any changes as per your requests. No matter how long the tour discussion may take, our aim is to make you completely satisfied with the final tour plan
                        <br/>
                        Bravo Special Discount (View more)<br/>
                        offering an exclusive 5% group discount for paties of 7 or more that are booking a tours of 2 or more day
                        We are pleased to offer a 3% to 10% discount on the total price for early bird bookings (30 Days - 90 Days prior to the trip)
                        Book 2 and get 1 free for city packages<br/>
                        Repeat Travelers or their recommendation save an additional 5% on any 2014 or 2015 vacation
                        <br/>
                        Deposit & Reservation<br/>
                        Only 10% Refundable Deposit (usually 30%) to secure the reservation for you and keep the price unchanged.
                        <br/>
                        Cancellation policy & fees<br/>
                        You do not have to pay any cancellation fee if you cancel your reservation no less than 30 days prior to scheduled departure date, 20% for 29 -15 days notice, 50% for 14- 7days notice; 50% for 6-0 days notice.
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
@stop