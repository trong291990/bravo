@section('title')
My Profile
@stop
@section('body_class')
staff-page
@stop
@section('content')
<div class="container">
    <div class="row staff-edit-profile-page">
        <div class="col-md-12">
            {{ View::make('partials._form_errors')->render() }}
            <div class='col-md-7 col-xs-12'>
                <h3>Update Profile</h3>
                {{ Former::framework('Nude') }}
                {{ Former::populate($specialist) }}
                {{ Former::open(route('specialist.update_profile'))->method('POST')->class('') }}
                <div class="form-group">
                    <label>Email address</label>
                    {{ Former::text('email')->class('form-control') }}
                </div>                
                <div class="form-group">
                    <label>First name</label>
                    {{ Former::text('first_name')->class('form-control') }}
                </div>
                <div class="form-group">
                    <label>Last name</label>
                    {{ Former::text('last_name')->class('form-control') }}
                </div>
                <div class="form-group">
                    <label>Nationality</label>
                    {{ Former::text('nationality')->class('form-control') }}
                </div>                 
                <div class="form-group">
                    <label>Languages</label>
                    {{ Former::text('languages')->class('form-control') }}
                </div>        
                <div class="form-group">
                    <label>About me</label>
                    {{ Former::textarea('bio')->class('form-control')->rows(7) }}
                </div>                 
                <button type="submit" class="btn btn-primary">Update</button>
                {{Former::close() }}                
            </div>
            <div class='col-md-5 col-xs-12'>
                <h3>Change password</h3>
                {{ Former::populate($specialist) }}
                {{ Former::open(route('specialist.update_password'))->method('POST')->class('') }}
                <div class="form-group">
                    <label>New password</label>
                    {{ Former::password('password')->class('form-control') }}
                </div>
                <div class="form-group">
                    <label>Vefiry password</label>
                    {{ Former::password('password_confirmation')->class('form-control') }}
                </div>
                <button type="submit" class="btn btn-primary">Update Password</button>
                {{Former::close() }}                
            </div>

        </div>
    </div>
</div>
@stop