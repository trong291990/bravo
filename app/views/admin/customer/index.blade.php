@section('header_content')
   <h1>List Customers</h1>
@stop

@section('breadcrumbs')
   @include('admin/partials/breadcrumbs', array('breadcrumbs' => Breadcrumbs::generate('customers')))
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
                           ->options(customer_sources_for_select())->label(false)->class('form-control submit-on-change') ?>
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
                <?php foreach ($customers as $customer): ?>
                    <tr>
                        <td>{{ $customer->name }}</td>
                        <td>{{ $customer->email }}</td>
                        <td>{{ $customer->nationality }}</td>
                        <td>{{ $customer->phone }}</td>
                        <td>{{ $customer->dob }}</td>
                        <td>{{ ucfirst($customer->source) }}</td>
                        <td>{{$customer->created_at->format('M d, Y \a\t H:i')}}</td>
                        <td>
                          <a class="btn btn-primary btn-xs" href="{{ route('admin.customer.show', $customer->id) }}">Edit</a>
                          <a href="#" class='btn btn-xs btn-danger btn-action-with-confirm' data-method="DELETE" 
                                data-url="{{route('admin.customer.destroy', $customer->id)}}" data-message="Are you sure want to delete this customer?">
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
                    <?php echo View::make('partials._paging_info')->with('items', $customers)->render() ?>
                </div>
                <div class="pull-right">
                    {{$customers->appends(Input::except('page'))->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@stop