@section('header_content')
   <h1>List Contacts</h1>
@stop

@section('breadcrumbs')
   @include('admin/partials/breadcrumbs', array('breadcrumbs' => Breadcrumbs::generate('contacts')))
@stop


@section('content')
<div class="box box-primary">
    <div class="box-header">
      <div class="box-tools">
        <form method='GET' class='form-search'>
                    <div class="col-md-4 col-md-offset-8">
                        <label class="col-xs-4" for="status">Status</label>
                        <div class="col-xs-8 no-padding">
                           <?php echo Former::select('source')
                           ->options(contact_sources_for_select())->label(false)->class('form-control submit-on-change') ?>
                        </div>
                    </div>
        </form>
      </div>
    </div>
    <div class="box-body">
        <table class="table table-bordered table-hover">
            <tbody><tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Nationality</th>
                    <th>Phone</th>
                    <th>Birthday</th>
                    <th>Source</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
                <?php foreach ($contacts as $contact): ?>
                    <tr>
                        <td>{{ $contact->name }}</td>
                        <td>{{ $contact->email }}</td>
                        <td>{{ $contact->nationality }}</td>
                        <td>{{ $contact->phone }}</td>
                        <td>{{ $contact->dob }}</td>
                        <td>{{ ucfirst($contact->source) }}</td>
                        <td>{{$contact->created_at->format('M d, Y \a\t H:i')}}</td>
                        <td>
                          <a class="btn btn-primary btn-xs" href="{{ route('admin.contact.show', $contact->id) }}">Edit</a>
                          <a href="#" class='btn btn-xs btn-danger btn-action-with-confirm' data-method="DELETE" 
                                data-url="{{route('admin.contact.destroy', $contact->id)}}" data-message="Are you sure want to delete this contact?">
                                <i class="fa fa-times"></i> Delete
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>      
    </div>   
    <div class="box-footer">
        <div class="row">
            <div class="col-md-12">
                <div class="text-left">
                    <?php echo View::make('partials._paging_info')->with('items', $contacts)->render() ?>
                </div>
                <div class="pull-right">
                    {{$contacts->appends(Input::except('page'))->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@stop