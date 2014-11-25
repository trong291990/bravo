
@section('content')

<div class='container'>
	{{ Form::open(['url' => 'admin/booking/'.@$booking->id, 'method' =>'put', 'class'=>'form', 'role'=>'form']) }}
	@if(@$errors)
	<div role='alert' class='alert alert-danger'>
		{{ HTML::ul($errors->all()) }}
	</div>
	@endif
	<div class='row'>
		<div class='col-md-12'>
			<div class='form-group'>
				<!-- `Tour name` Field -->
				{{ Form::label('tour_name', 'Tour name') }}
				{{ Form::text('booking[tour_name]', @$booking->tour_name, ['class'=>'form-control']) }}
			</div>
                        <div class="row">
                            <div class='form-group col-sm-6'>
                                <!-- `Travel date` Field -->
                                {{ Form::label('travel_date', 'Travel date') }}
                                {{ Form::text('booking[travel_date]', @$booking->travel_date, ['class'=>'form-control']) }}
                            </div>
                            <div class='form-group col-sm-6'>
                                    <!-- `Room type` Field -->
                                    {{ Form::label('room_type', 'Room type') }}
                                    {{ Form::text('booking[room_type]', @$booking->room_type, ['class'=>'form-control']) }}
                            </div>
                        </div>
			<div class='form-group'>
				<!-- `Main contact` Field -->
				{{ Form::label('main_contact', 'Main contact') }}
				{{ Form::text('booking[main_contact]', @$booking->main_contact, ['class'=>'form-control']) }}
			</div>
			<div class='form-group'>
				<!-- `Email` Field -->
				{{ Form::label('email', 'Email') }}
				{{ Form::text('booking[email]', @$booking->email, ['class'=>'form-control']) }}
			</div>
			<div class='form-group'>
				<!-- `Contact number` Field -->
				{{ Form::label('contact_number', 'Contact number') }}
				{{ Form::text('booking[contact_number]', @$booking->contact_number, ['class'=>'form-control']) }}
			</div>
			<div class='form-group'>
				<!-- `Arrival date` Field -->
				{{ Form::label('arrival_date', 'Arrival date') }}
				{{ Form::text('booking[arrival_date]', @$booking->arrival_date, ['class'=>'form-control']) }}
			</div>
			<div class='form-group'>
				<!-- `Airline flight no` Field -->
				{{ Form::label('airline_flight_no', 'Airline flight no') }}
				{{ Form::text('booking[airline_flight_no]', @$booking->airline_flight_no, ['class'=>'form-control']) }}
			</div>
			<div class='form-group'>
				<!-- `Arrival time` Field -->
				{{ Form::label('arrival_time', 'Arrival time') }}
				{{ Form::text('booking[arrival_time]', @$booking->arrival_time, ['class'=>'form-control']) }}
			</div>
			<div class='form-group'>
				<!-- `Departure date` Field -->
				{{ Form::label('departure_date', 'Departure date') }}
				{{ Form::text('booking[departure_date]', @$booking->departure_date, ['class'=>'form-control']) }}
			</div>
			<div class='form-group'>
				<!-- `Departure flight no` Field -->
				{{ Form::label('departure_flight_no', 'Departure flight no') }}
				{{ Form::text('booking[departure_flight_no]', @$booking->departure_flight_no, ['class'=>'form-control']) }}
			</div>
			<div class='form-group'>
				<!-- `Departure time` Field -->
				{{ Form::label('departure_time', 'Departure time') }}
				{{ Form::text('booking[departure_time]', @$booking->departure_time, ['class'=>'form-control']) }}
			</div>
			<div class='form-group'>
				<!-- `Passenger` Field -->
				{{ Form::label('passenger', 'Passenger') }}
				{{ Form::text('booking[passenger]', @$booking->passenger, ['class'=>'form-control']) }}
			</div>
			<div class='form-group'>
				<!-- `Addition comment` Field -->
				{{ Form::label('addition_comment', 'Addition comment') }}
				{{ Form::textarea('booking[addition_comment]', @$booking->addition_comment, ['class'=>'form-control']) }}
			</div>
			<div class='form-group'>
				<!-- `Contribute` Field -->
				{{ Form::label('contribute', 'Contribute') }}
				{{ Form::text('booking[contribute]', @$booking->contribute, ['class'=>'form-control']) }}
			</div>
			<div class='form-group'>
				<!-- `Total` Field -->
				{{ Form::label('total', 'Total') }}
				{{ Form::text('booking[total]', @$booking->total, ['class'=>'form-control']) }}
			</div>
			<div class='form-group'>
				<!-- `Deposit` Field -->
				{{ Form::label('deposit', 'Deposit') }}
				{{ Form::text('booking[deposit]', @$booking->deposit, ['class'=>'form-control']) }}
			</div>
		</div>
		<div class='col-md-12 text-right'>
			<!-- Form actions -->
			<a href='{{URL::previous()}}' class='btn btn-default'>Cancel</a>
			<button type='submit' class='btn btn-default'>Submit</button>
		</div>
	</div>
	{{ Form::close() }}
</div>
@stop
