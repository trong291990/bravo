@section('header_content')
   <h1>List Inquiries</h1>
@stop

@section('breadcrumbs')
   @include('admin/partials/breadcrumbs', array('breadcrumbs' => Breadcrumbs::generate('list_inquiries')))
@stop

@section('content')
<div class="box box-primary">
    <div class="box-header">
    	<div class="box-tools">
    		<form method='GET' class='form-search'>
                    <div class="col-md-4 col-md-offset-8">
                        <label class="col-xs-4" for="status">Status</label>
                        <div class="col-xs-8 no-padding">
                           <?php echo Former::select('status')
                           ->options(inquiry_statuses_for_select())->label(false)->class('form-control submit-on-change') ?>
                        </div>
                    </div>
    		</form>
    	</div>
    </div>
    <div class="box-body">
        <table class="table table-bordered table-hover">
            <tbody><tr>
                    <th style="width: 15%">Full name</th>
                    <th>Email</th>
                    <th>Departure date</th>
                    <th>Destinations</th>
                    <th>Status</th>
                    <th>Requested At</th>
                    <th style='min-width: 210px;'>Action</th>
                </tr>
                <?php foreach ($inquiries as $inquiry): ?>
                    <tr>
                        <td>{{$inquiry->fullName()}}</td>
                        <td>{{$inquiry->email}}</td>
                        <td>{{$inquiry->departure_date}}</td>
                        <td>{{$inquiry->destinations}}</td>
                        <td>{{$inquiry->statusString()}}</td>
                        <td>{{$inquiry->created_at->format('M d, Y \a\t H:i')}}</td>
                        <td>
                        <a href="{{route('admin.inquiry.show', $inquiry->id)}}" class="btn btn-xs btn-primary">Detail</a>
                        	@unless($inquiry->is_resolved)
                            <a href="#" class='btn btn-xs btn-success btn-action-with-confirm' data-method="POST" 
                            	data-url="{{route('admin.inquiry.mark_resolved', $inquiry->id)}}" data-message="Are you sure want to mark resolved this inquiry?" >
                            	<i class="fa fa-check"></i> Resolved
                            </a>
                            @endunless
                            <a href="#" class='btn btn-xs btn-danger btn-action-with-confirm' data-method="DELETE" 
                            	data-url="{{route('admin.inquiry.delete', $inquiry->id)}}" data-message="Are you sure want to delete this inquiry?">
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
                    <?php echo View::make('partials._paging_info')->with('items', $inquiries)->render() ?>
                </div>
                <div class="pull-right">
                    {{$inquiries->links()}}
                </div>
            </div>
        </div>
    </div>    
</div>
@stop