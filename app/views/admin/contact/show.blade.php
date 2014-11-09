@section('header_content')
   <h1>Contact Info</h1>
@stop

@section('breadcrumbs')
   @include('admin/partials/breadcrumbs', array('breadcrumbs' => Breadcrumbs::generate('contacts')))
@stop


@section('content')
<div class="box box-primary">
  <div class="box-header">
  </div>
  {{ Former::populate($contact) }}
  {{ Former::open(route('admin.contact.update', $contact->id))->method('PUT') }}
    <div class="box-body">
      <div class="row">
        <div class="col-md-6">
          {{ Former::text('name') }}
        </div>
        <div class="col-md-6">
          {{ Former::text('email') }}
        </div>    
      </div> 

      <div class="row">
        <div class="col-md-6">
          {{ Former::text('phone') }}
        </div>
        <div class="col-md-6">
          {{ Former::text('nationality') }}
        </div>
      </div>

      <div class="row">
        <div class="col-md-6">
          {{ Former::text('dob')->class('form-control datepicker') }}
        </div>
        <div class="col-md-6">
          {{ Former::textarea('note')->rows(3) }}
        </div>        
      </div>
    </div>

    <div class="box-footer text-center">
      <a href="{{route('admin.contact.index')}}" class="btn btn-sm btn-default">Back to list</a>
      <button type="submit" class="btn btn-sm btn-primary">Update</button>  
    </div>    
  {{ Former::close() }}
</div>

@stop