@section('title')
About us – Bravo Indochina Tours
@stop
@section('description')
Bravo Indochina Tours are experts in travel throughout Indochina. Call one of our tailor-made specialists to discuss your travel plans and share ideas and discover how we can help to create your perfect holiday
@stop
@section('content')
<div class="container">
    <div id="about-us" class="tour-sub-page">
        <div class="row">
            <div class="col-sm-6">
                <ol class="breadcrumb">
                    <li><a href="{{Request::root()}}">Home</a></li>
                    <li class="">Tour</li>
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
            <div class="col-lg-3 col-md-12">
                <div id="contact-summary-infor">
                    <h3 class="has-dividor">About Us </h3>
                    <p class="small">Email us Directly</p>
                    <p style="font-size: 16px;"><a href="mailto: support@bravoindochinatour.com">support@bravoindochinatour.com</a></p>
                    <p class="small">Give us a call</p>
                    <p style="font-size: 16px;">(+84)917391106</p>
                </div>
                {{HTML::image('/frontend/images/paypal.jpg','Paypal Bravo',['class'=>'img-responsive'])}}
                <p>
                    <b>
                        Bravo Indochina Tours accepts the payment via Paypal, which is a safer, easier way to make an online payment.
                        If you own a Paypal account, please login to the account, and complete your transaction after confirming the cost you are supposed to pay with your travel consultant. If you do not have a Paypal account, you can still pay us at Paypal's website by providing your credit card information. Paypal accepts all the major credit cards and debit cards.
                        Our PayPal account is support@bravoindochinatour.comNote:
                        Please kindly mark up extra 3% Paypal service fee over the total cost if you choose to pay via Paypal.
                    </b>
                </p>
            </div>
            {{Former::open(route('booking.deposit'))}}
            {{Former::framework('Nude')}}
            {{Former::populate($booking)}}
            {{Former::hidden('token')}}
            <div class="col-lg-9 col-md-12">
                <h2>ABOUT US</h2>
                <div style="background:#428bca;padding:15px;font-weight: bold;color:#fff">
                    Thank you for your booking with Bravo IndochinaTours. To book/confirm
                    your trip please complete the form below and send to us a long with deposit $100/1 person
                </div>
                <div class="relative" id="custom-booking-form-wrapper">
                     <table class="table table-bordered" id="date-time-booking-tb">
                    <tr>
                        <td  colspan="4">
                            <h3 style="margin:5px 0px 0px 0px">
                                {{$booking->tour_name}}
                            </h3>
                        </td>
                        <td style="width: 35%">
                            <label>Booking reference</label>
                        </td>
                    </tr>
                    <tr>
                        <td  colspan="4">
                            <label>Travel Date</label>
                            <?php echo date('M d,Y',  strtotime($booking->travel_date)) ?>
                        </td>
                        <td  rowspan="3" id="booking-reference-td">
                            {{Former::inline_radios('room_type')->radios(Booking::getRoomTypes())}}
                            {{Former::text('main_contact')->label('Main contact')->placeholder('Your name')}}
                            {{Former::email('email')->placeholder('Your email')}}
                            {{Former::text('contact_number')->placeholder('Your phone number')}}
                        </td>
                    </tr>
                    <tr>
                        <td  rowspan="2" id="rotate-visible" style="width: 25px !important;text-align: center;vertical-align: middle;background: #000">
                           {{HTML::image('/frontend/images/flight_departure.png')}}
                        </td>
                        <td >
                            <label>Arrival Date</label>
                            {{Former::text('arrival_date')->class('form-control')->label(false)->div(false)->placeholder('Arrival Date')}}
                        </td>
                        <td>
                            <label>Airline Flight No</label>
                            {{Former::text('airline_flight_no')->class('form-control')->label(false)->div(false)->placeholder('Airline Flight No')}}
                        </td>
                        <td>
                            <label>Arrival time</label>
                            {{Former::text('arrival_time')->class('form-control')->label(false)->div(false)->placeholder('Arrival time')}}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Departure date</label>
                             {{Former::text('departure_date')->class('form-control')->label(false)->div(false)->placeholder('Departure date')}}
                        </td>
                        <td>
                            <label>Airline Flight No</label>
                             {{Former::text('airline_flight_no')->class('form-control')->label(false)->div(false)->placeholder('Airline Flight No')}}
                        </td>
                        <td>
                            <label>Departure time</label>
                             {{Former::text('departure_time')->class('form-control')->label(false)->div(false)->placeholder('Departure time')}}
                        </td>
                    </tr>
                  </table>
                <table >
                    <tr>
                        <td colspan="4"></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                    </tr>
                </table>
                    <div id="passengers">
                        <h2>Passengers</h2>
                        <p>Detail as per passport</p>
                        <div class="row passenger-item">
                            <div class="col-sm-1">
                                <label>Title</label>
                                <select class="form-control not-picker" name="passengers[title][]">
                                    <option value="Mr">Mr</option>
                                    <option value="Mrs">Mrs</option>
                                    <option value="Miss">Miss</option>
                                    <option value="Sir">Sir</option>
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <label>Sub name</label>
                                <input type="text" name="passengers[sub_name][]" class="form-control" />
                            </div>
                            <div class="col-sm-3">
                                <label>First and middle name</label>
                                <input type="text" name="passengers[first_middle_name][]" class="form-control" />
                            </div>
                            <div class="col-sm-2">
                                <label>Date of birthday</label>
                                <input type="text" name="passengers[birthday][]" class="form-control datepicker" />
                            </div>
                            <div class="col-sm-2">
                                <label>PP Number</label>
                                <input type="text" name="passengers[pp_number][]" class="form-control" />
                            </div>
                            <div class="col-sm-2">
                                <label>Nationality</label>
                                <input type="text" name="passengers[nationality][]" class="form-control" />
                            </div>
                        </div>
                    </div>

                    <div class="clearfix" style="margin: 10px 0px;">
                        <a id="passenger-add" href="javascript:void(0)" class="btn btn-primary" >Add passenger</a>
                    </div>
                    <div id="booking-conditions">
                        <p><input type="checkbox" name="booking_term_agree" />
                            I have read and agree to the Bravo Indochina Tours booking
                            conditions.
                        </p>
                        <p><input type="checkbox" name="booing_vaid_passports" />
                            All travellers will have valid passports at time of travel, and are
                            aware of visa requirements.
                        </p>
                        <p><input type="checkbox" name="booing_insurance_purchased" />
                            Travel insurance is strongly recommended when travelling with Bravo
                            Indochina Tours and should be purchased no later than when final balance is paid.
                        </p>
                        <p><input type="checkbox" name="booing_contribute " />
                            I would like to contribute 10$  to the Bravo Founđation
                        </p>
                    </div>
                    <div id="booking-addition-comment">
                        <label>ADDITION COMMENT</label>
                        <textarea placeholder="Please let us know of any specific requests, special occasions or anything else we might find useful to help us plan your trip" class="form-control" name="booking-addition-comment"></textarea>
                    </div>
                    <div class="form-actions" style="margin-top:20px;text-align: center">
                        <button class="btn btn-danger btn-lg">{{HTML::image('/frontend/images/paypal-icon.png')}} Pay with Paypal</button>
                    </div>
                </div>
        </div>
            {{Former::close()}}
        </div>
    </div>
    <div style="display: none" id="passenger-pattern">
        <div class="row passenger-item">
            <div class="col-sm-1">
                <label>Title</label>
                <select class="form-control not-picker" name="passengers[title][]">
                    <option value="Mr">Mr</option>
                    <option value="Mrs">Mrs</option>
                    <option value="Miss">Miss</option>
                    <option value="Sir">Sir</option>
                </select>
            </div>
            <div class="col-sm-2">
                <label>Sub name</label>
                <input type="text" name="passengers[sub_name][]" class="form-control" />
            </div>
            <div class="col-sm-3">
                <label>First and middle name</label>
                <input type="text" name="passengers[first_middle_name][]" class="form-control" />
            </div>
            <div class="col-sm-2">
                <label>Date of birthday</label>
                <input type="text" name="passengers[birthday][]" class="form-control datepicker" />
            </div>
            <div class="col-sm-2">
                <label>PP Number</label>
                <input type="text" name="passengers[pp_number][]" class="form-control" />
            </div>
            <div class="col-sm-2">
                <label>Nationality</label>
                <input type="text" name="passengers[nationality][]" class="form-control" />
            </div>
            <div class="col-sm-12">
                <a class="pull-right remove-passenger" href="javascript:void(0)">Remove</a>
            </div>
        </div>
    </div>
</div>
@stop
@section('inline_scripts')
<script type="text/javascript">
    $('#passenger-add').on('click',function(){
        $('#passengers').append($('#passenger-pattern').html());
        $('.datepicker').datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true
        });
    });
    $('#passengers').on('click','.remove-passenger',function(){
        //console.log('this is form remoe');
        $(this).parents('.passenger-item').remove();
    });
</script>
@stop

