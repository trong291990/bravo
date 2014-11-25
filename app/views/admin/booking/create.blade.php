
@section('content')

<div class='container'>
	{{ Form::open(['url' => 'admin/booking', 'method' =>'post', 'class'=>'form', 'role'=>'form']) }}
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
				{{ Form::text('booking[tour_name]', Input::old('booking.tour_name'), ['class'=>'form-control']) }}
			</div>
			<div class='form-group'>
				<!-- `Travel date` Field -->
				{{ Form::label('travel_date', 'Travel date') }}
				{{ Form::text('booking[travel_date]', Input::old('booking.travel_date'), ['class'=>'form-control']) }}
			</div>
			<div class='form-group'>
				<!-- `Room type` Field -->
				{{ Form::label('room_type', 'Room type') }}
				{{ Form::text('booking[room_type]', Input::old('booking.room_type'), ['class'=>'form-control']) }}
			</div>
			<div class='form-group'>
				<!-- `Main contact` Field -->
				{{ Form::label('main_contact', 'Main contact') }}
				{{ Form::text('booking[main_contact]', Input::old('booking.main_contact'), ['class'=>'form-control']) }}
			</div>
			<div class='form-group'>
				<!-- `Email` Field -->
				{{ Form::label('email', 'Email') }}
				{{ Form::text('booking[email]', Input::old('booking.email'), ['class'=>'form-control']) }}
			</div>
			<div class='form-group'>
				<!-- `Contact number` Field -->
				{{ Form::label('contact_number', 'Contact number') }}
				{{ Form::text('booking[contact_number]', Input::old('booking.contact_number'), ['class'=>'form-control']) }}
			</div>
			<div class='form-group'>
				<!-- `Arrival date` Field -->
				{{ Form::label('arrival_date', 'Arrival date') }}
				{{ Form::text('booking[arrival_date]', Input::old('booking.arrival_date'), ['class'=>'form-control']) }}
			</div>
			<div class='form-group'>
				<!-- `Airline flight no` Field -->
				{{ Form::label('airline_flight_no', 'Airline flight no') }}
				{{ Form::text('booking[airline_flight_no]', Input::old('booking.airline_flight_no'), ['class'=>'form-control']) }}
			</div>
			<div class='form-group'>
				<!-- `Arrival time` Field -->
				{{ Form::label('arrival_time', 'Arrival time') }}
				{{ Form::text('booking[arrival_time]', Input::old('booking.arrival_time'), ['class'=>'form-control']) }}
			</div>
			<div class='form-group'>
				<!-- `Departure date` Field -->
				{{ Form::label('departure_date', 'Departure date') }}
				{{ Form::text('booking[departure_date]', Input::old('booking.departure_date'), ['class'=>'form-control']) }}
			</div>
			<div class='form-group'>
				<!-- `Departure flight no` Field -->
				{{ Form::label('departure_flight_no', 'Departure flight no') }}
				{{ Form::text('booking[departure_flight_no]', Input::old('booking.departure_flight_no'), ['class'=>'form-control']) }}
			</div>
			<div class='form-group'>
				<!-- `Departure time` Field -->
				{{ Form::label('departure_time', 'Departure time') }}
				{{ Form::text('booking[departure_time]', Input::old('booking.departure_time'), ['class'=>'form-control']) }}
			</div>
			<div class='form-group'>
				<!-- `Passenger` Field -->
				{{ Form::label('passenger', 'Passenger') }}
				{{ Form::text('booking[passenger]', Input::old('booking.passenger'), ['class'=>'form-control']) }}
			</div>
			<div class='form-group'>
				<!-- `Addition comment` Field -->
				{{ Form::label('addition_comment', 'Addition comment') }}
				{{ Form::textarea('booking[addition_comment]', Input::old('booking.addition_comment'), ['class'=>'form-control']) }}
			</div>
			<div class='form-group'>
				<!-- `Contribute` Field -->
				{{ Form::label('contribute', 'Contribute') }}
				{{ Form::text('booking[contribute]', Input::old('booking.contribute'), ['class'=>'form-control']) }}
			</div>
			<div class='form-group'>
				<!-- `Total` Field -->
				{{ Form::label('total', 'Total') }}
				{{ Form::text('booking[total]', Input::old('booking.total'), ['class'=>'form-control']) }}
			</div>
			<div class='form-group'>
				<!-- `Deposit` Field -->
				{{ Form::label('deposit', 'Deposit') }}
				{{ Form::text('booking[deposit]', Input::old('booking.deposit'), ['class'=>'form-control']) }}
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
