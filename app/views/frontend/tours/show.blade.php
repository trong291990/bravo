@section('title')
 {{$tour->name}} | Bravo Indochina Tours
@stop

@section('keyword')
<?php if($tour->keyword_inherit) 
    {
        echo ($area && isset($area->meta_keyword)) ?  $area->meta_keyword.','.$tour->meta_keyword : $tour->meta_keyword;
    }
       else echo $tour->meta_keyword;?>
@stop

@section('description')
{{$tour->meta_description}}
@stop

@section('addon_js')
{{ HTML::script("https://maps.googleapis.com/maps/api/js") }}
{{ HTML::script('/plugins/raty/jquery.raty.js') }}
@stop

@section('content')
<div id="tour-detail">
    <div class="row">
        <div class="col-sm-7">
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li><a href="#">Tours</a></li>
                <li class="active">{{$tour->name}}</li>
            </ol>
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
            <div class="row" style="margin-bottom: 20px;">

            </div>
            <div id="tour-staffs">
                <h4>{{ $tour->area->name }} DESTINATION EXPERT</h4>
                <!-- Update here -->
                @foreach($specialists as $specialist)
                <div class="row staff-item">
                    <div class="col-sm-3 no-padding-right">
                        <img class="img-responsive" src="{{ $specialist->avatarURL() }}" />
                    </div>
                    <div class="col-sm-9">
                        <a href="{{ route('specialist.profile', $specialist->parameterize()) }}">{{ $specialist->fullName() }}</a>
                        <br>
                        {{ $tour->area->name }} Travel Specialist
                        <div class="cleafix">
                            <div class='staff-ratied' data-ratied="{{ $specialist->avgRate() }}"></div>
                        </div>
                    </div>
                    <div class='col-sm-12 text-right'>
                        <a href="{{ route('specialist.profile', $specialist->parameterize()) }}">Read More <i class="fa fa-plus-square"></i></a>
                    </div>
                </div>
                @endforeach
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
                                            <i class="fa fa-building"></i> {{$itinerary->hotel}}
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
                        <p><b>{{$tour->name}}</b></p>
                        <p><b>Send A Enquiry & Receive reply within 59 minutes</b></p>
                        <ul class="list-unstyled">
                            <li>
                                    After receiving your online enquiry, one of our professional travel consultant will go to work for you. He/she will prepare a very reasonable itinerary and quote our best price. If there is no itinerary in our ready-made tours that meets your needs, just click “Customize Your Indochina Trip” to send us your requirements. More detailed information is highly appreciated as it will help us optimize your customized tour plan more effectively.
                            </li>
                            <li style="margin-top: 10px;">
                                    We will be pleased to make any changes as per your requests. No matter how long the tour discussion may take, our aim is to make you completely satisfied with the final tour plan.  
                            </li>
                        </ul>
                        <p><b>Bravo Special Discount (View more)</b></p>
                        <ul class="list-unstyled">
                            <li><i class="fa fa-hand-o-right"></i> Offering an exclusive 5% group discount for paties of 7 or more that are booking a tours of 2 or more day. </li>
                            <li>
                                <i class="fa fa-hand-o-right"></i> We are pleased to offer a 3% to 10% discount on the total price for early bird bookings (30 Days - 90 Days prior to the trip).
                            </li>
                            <li>
                                <i class="fa fa-hand-o-right"></i> Book 2 and get 1 free for city packages.
                            </li>
                            <li>
                                <i class="fa fa-hand-o-right"></i> Repeat Travelers or their recommendation save an additional 5% on any 20
                                14 or 2015 vacation.
                            </li>
                        </ul>
                        
                        <p><b>Deposit & Reservation</b></p>
                        Only 10% Refundable Deposit (usually 30%) to secure the reservation for you and keep the price unchanged.
                        <br/><br/>
                        <p><b>Cancellation policy & fees</b></p>
                        You do not have to pay any cancellation fee if you cancel your reservation no less than 30 days prior to scheduled departure date, 20% for 29 -15 days notice, 50% for 14- 7days notice; 50% for 6-0 days notice.
                        <p style="margin-top: 10px">
                        <?php if($loggedCustomer): ?>
                            <button type="button" 
                                data-add-url="{{route('wishlist.add', $tour->id)}}"
                                data-remove-url="{{route('wishlist.remove', $tour->id)}}"
                                class="btn btn-sm {{in_array($tour->id, $wishlist_items) ? 'btn-remove-wishlist' : 'btn-add-wishlist' }}">
                                {{in_array($tour->id, $wishlist_items) ? 'Remove from Wishlist' : 'Add to Wishlist'}}
                            </button>
                         <?php endif; ?>                 
                        <button type="button" data-id='{{$tour->id}}' 
                        class="btn btn-sm booking-tour btn-warning tour-booking">Enquiry Now</button>
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
                                    <img alt="{{$tour->name}}" src="{{$tour->thumbnailURL()}}" class="img-responsive" />
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
@section('addon_stylesheets')
{{ HTML::style('/plugins/raty/jquery.raty.css') }}
@stop
@section('inline_scripts')
<script>
    $('.staff-ratied').each(function() {
        var dataRaty = $(this).data('ratied');
        $(this).raty({starType: 'i', 'score': dataRaty,'readOnly':true});
    });
</script>   
@stop