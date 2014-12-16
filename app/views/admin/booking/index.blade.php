
@section('content')

<div  class="box-body">
	<div class='row'>
		<div class='col-md-12'>
			<table class='table'>
				<tr>
					<th>Tour name</th>
					<th>Travel date</th>
					<th>Main contact</th>
					<th>Email</th>
					<th>Total</th>
					<th>Deposit</th>
                                        <th style="width: 100px">Link</th>
                                        <th>&nbsp;</th>
					<th>&nbsp;</th>
					<th>&nbsp;</th>
				</tr>
				@foreach($bookings as $booking)
				<tr class="<?php if($booking->status) echo "success"?>">
					<td>{{ @$booking->tour_name }}</td>
					<td>{{ @$booking->travel_date }}</td>
					<td>{{ @$booking->main_contact }}</td>
					<td>{{ @$booking->email }}</td>
					<td>{{ @$booking->total }}</td>
					<td>{{ @$booking->deposit }}</td>
                                        <td>
                                        <td>{{route('booking.form',$booking->token)}}</td>   
					<td><a href='/admin/booking/{{$booking->id}}/edit' class='btn btn-primary'>Edit</a></td>
					<td>
						{{ Form::open(['url'=>'admin/booking/'.$booking->id, 'method'=>'delete']) }}
							<button type='submit' class='btn btn-default btn-danger'>Delete</button>
						{{ Form::close() }}
					</td>
				</tr>
				@endforeach
			</table>
		</div>
	</div>
</div>

@stop

