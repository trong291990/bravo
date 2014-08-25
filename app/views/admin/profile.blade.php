@section('header_content')
<h1>
    Profile
</h1>
@stop

@section('breadcrumbs')
    @include('admin/partials/breadcrumbs', array('breadcrumbs' => Breadcrumbs::generate('profile')))
@stop

@section('content')
<div class="row">
	<div class="col-lg-12">
	<div class="col-lg-6">
		<div class="box box-primary">
			<div class="box-header">
				<h3 class="box-title">
					Account information
				</h3>
			</div>
			{{ Former::open(route('admin.profile.update'))->method('POST') }}	
				<div class="box-body">
					{{ Former::populate($adminAccount) }}
					{{ Former::text('name') }}
					{{ Former::text('email') }}
				</div>
				<div class="box-footer  text-right">
			        <button type="reset" class="btn btn-default">Reset</button>
			        <button type="submit" class="btn btn-primary">Save</button>				
				</div>
			{{ Former::close() }}
		</div>
	</div>	
	<div class="col-lg-6">
		<div class="box box-primary">
			<div class="box-header">
				<h3 class="box-title">
					Change password
				</h3>
			</div>
			{{ Former::open(route('admin.profile.update_password'))->method('POST') }}	
			<div class="box-body">
				{{ Former::password('password')->label('New password') }}
				{{ Former::password('password_confirmation')->label('Confirmation') }}
			</div>
			<div class="box-footer text-right">
		        <button type="submit" class="btn btn-primary">Save</button>				
			</div>
			{{ Former::close() }}
		</div>		
	</div>

    </div>
</div>
@stop