@section('header_content')
<h1>
    New Booking
    <small>Create a new Booking</small>
</h1>
@stop
@section('content')

<div class="box-body">
    {{Former::vertical_open()->method("POST")->action(route('admin.booking.store'))}}
        {{Former::token()}}
        <div class="row">
            <div class="col-sm-12">
                {{Former::text('tour_name')}}
            </div>
            <div class="col-sm-4">
                {{Former::text('travel_date')->addClass('datepicker')->data_date_format('yyyy-mm-dd')}}
            </div>
            <div class="col-sm-4">
                {{Former::select('room_type')->options(Booking::getRoomTypes())}}
            </div>
            <div class="col-sm-4">
                {{Former::text('main_contact')}}
            </div>
            <div class="col-sm-4">
                {{Former::email('email')}}
            </div>
            <div class="col-sm-4">
                {{Former::text('contact_number')}}
            </div>
            <div class="col-sm-4">
                {{Former::text('arrival_date')->addClass('datepicker')->data_date_format('yyyy-mm-dd')}}
            </div>
            <div class="col-sm-4">
                {{Former::text('airline_flight_no')}}
            </div>
            <div class="col-sm-4">
                {{Former::text('arrival_time')->placeholder('00:00 AM')}}
            </div>
            <div class="col-sm-4">
                {{Former::text('departure_date')->addClass('datepicker')->data_date_format('yyyy-mm-dd')}}
            </div>
            <div class="col-sm-4">
                {{Former::text('departure_flight_no')}}
            </div>
            <div class="col-sm-4">
                {{Former::text('departure_time')->placeholder('00:00 AM')}}
            </div>
            <div class="col-sm-4">
                {{Former::text('passenger')}}
            </div>
            <div class="col-sm-4">
                {{Former::text('total')}}
            </div>
            <div class="col-sm-4">
                {{Former::text('deposit')}}
            </div>
            <div class="col-sm-4">
                {{Former::textarea('addition_comment')}}
            </div>
            <div class="col-sm-12 inline-radio">
                {{Former::radios('status')->radios(Booking::getStatus())}}
            </div>
            <div class='col-md-12 text-right'>
                    <!-- Form actions -->
                    <a href='{{URL::previous()}}' class='btn btn-default'>Cancel</a>
                    <button type='submit' class='btn btn-primary'>Submit</button>
            </div>
        </div>
    {{Former::close()}}
</div>
@stop
