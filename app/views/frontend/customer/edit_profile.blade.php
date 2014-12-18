@section('title')
My profile
@stop
@section('body_class')
staff-page
@stop
@section('content')
<div class="container">
  <div class="row staff-edit-profile-page">
      <div class="col-md-12">
          {{ View::make('partials._form_errors')->render() }}
          {{ View::make('partials._flash_messages')->render() }}
          <div class='col-md-7 col-xs-12'>
            <h3>Update infomation</h3>
            {{ Former::framework('Nude') }}
            {{ Former::populate($loggedCustomer) }}          
            {{ Former::open(route('customer.update_profile'))->method('POST')->class('') }}
                <div class="form-group">
                    <label>Email address</label>
                    {{ Former::text('email')->class('form-control') }}
                </div>
                <div class="form-group">
                    <label>Full name</label>
                    {{ Former::text('name')->class('form-control') }}
                </div>
                <div class="form-group">
                    <label>Date of birth</label>
                    {{ Former::text('dob')->class('form-control datepicker') }}
                </div>
                <div class="form-group">
                    <label>Nationality</label>
                    {{ Former::text('nationality')->class('form-control') }}
                </div>
                <div class="form-group">
                    <label>Phone number</label>
                    {{ Former::text('phone')->class('form-control') }}
                </div>                
            <button class="btn btn-primary" type="submit">Update</button>    
            {{ Former::close() }}              
          </div>
          <div class='col-md-5 col-xs-12'>
            <h3>Change password</h3>
            {{ Former::open(route('customer.update_password'))->method('POST')->class('') }}
                <div class="form-group">
                    <label>New password</label>
                    {{ Former::password('password')->class('form-control') }}
                </div>
                <div class="form-group">
                    <label>Vefiry password</label>
                    {{ Former::password('password_confirmation')->class('form-control') }}
                </div>
                <button type="submit" class="btn btn-primary">Update Password</button>          
            {{ Former::close() }}  
          </div>
      </div>
  </div>
</div>
@stop
