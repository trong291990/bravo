@section('header_content')
<h1>New Reservation</h1>
@stop
@section('breadcrumbs')
@include('admin/partials/breadcrumbs', array('breadcrumbs' => Breadcrumbs::generate('index_reservations')))
@stop
@section('content')
<div class="box box-primary">
    <?php echo Former::open(route('admin.reservation.store')) ?>
	    <div class="box-body">
	  		
	  			<div class="row">
	  				<div class="col-md-5">
	  					<fieldset>
	  						<legend>Customer Info</legend>
	  						<?php echo Former::text('customer_name')->label('Name')->required() ?>
	  						<?php echo Former::email('customer_email')->label('Email')->required() ?>
	  						<?php echo Former::text('customer_phone')->label('phone') ?>				
	  					</fieldset>
	  				</div>
	  				<div class="col-md-7">
		  				<fieldset>
		  					<legend>Booking Info</legend>
		  					<?php echo Former::select('tour_id')->addOption('-- Select one --', null)->fromQuery($tours, 'name', 'id')->addClass('select2-able') ?>
		  					<?php echo Former::text('start_date')->addClass('datepicker')->data_date_format('yyyy-mm-dd') ?>
		  					<?php echo Former::select('status')->options(Reservation::statusesForSelect()) ?>
		  				</fieldset>
		  			</div>
	  			</div>

	  		
	    </div> 
	    <div class="box-footer text-right">
	    	<button type="reset" class="btn btn-default">Reset</button>
	    	<button type="submit" class="btn btn-primary">Save</button>
	    </div> 
    <?php echo Former::close() ?>
</div>
@stop