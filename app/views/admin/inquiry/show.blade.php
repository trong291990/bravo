@section('header_content')
   <h1>Inquiry Detail
	   <small>
	   	{{ $inquiry->statusString() }}
	   </small>   
   </h1>

@stop

@section('breadcrumbs')
   @include('admin/partials/breadcrumbs', array('breadcrumbs' => Breadcrumbs::generate('list_inquiries')))
@stop

@section('content')
<div class="box box-primary">
	<div class="box-body">
		<legend>Contact Info</legend>
		<div class="row">
			<div class="col-lg-12">
				<ul>
					<li>First name: {{ $inquiry->first_name }}</li>
					<li>Last name: {{ $inquiry->last_name }}</li>
					<li>Email address: {{ $inquiry->email }}</li>
					<li>Phone number: {{ $inquiry->phone_number }}</li>
					<li>Best time to call: {{ $inquiry->best_time_call }}</li>
				</ul>
			</div>
		</div>
		<legend>Trip Detail</legend>
		<div class="row">
			<div class="col-lg-12">
				<ul>
					<li>Number of participants: {{ $inquiry->number_of_participants }}</li>
					<li>Total etimate budget: {{ $inquiry->estimate_budget }}</li>
					<li>Departure date: {{ $inquiry->departure_date }}</li>
					<li>Departure city: {{ $inquiry->departure_city }}</li>
					<li>Destinations: {{ $inquiry->destinations }}</li>
					<li>Length of trip: {{ $inquiry->length_of_trip }}</li>
				</ul>			
			</div>
		</div>
		<legend>Class of Service</legend>
		<div class="row">
			<div class="col-lg-12">
				<ul>
					<li>Cruise line: {{ $inquiry->cruise_line }}</li>
					<li>Preferred consultant: {{ $inquiry->preferred_consultant }}</li>
					<li>Find us from: {{ $inquiry->find_us_from }}</li>
				</ul>	
			</div>			
		</div>	
		<legend>Additional Comment</legend>
		<div class="row">
			<div class="col-lg-12">
				{{$inquiry->additional_comment}}
			</div>
		</div>
	</div>
	<div class="box-footer">
		<div class="row">
			<div class="col-lg-12">
				Requested at: <span class="text-info">{{ $inquiry->created_at->format('M d, Y \a\t H:i') }}</span>

				<div class="pull-right">
					<a href="{{route('admin.inquiry.index')}}" class="btn btn-sm btn-primary">Back to list</a>
				</div>	
			</div>
		</div>
	</div>
</div>
@stop