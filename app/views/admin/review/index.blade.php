@section('header_content')
  <h1>List Reviews</h1>
@stop
@section('breadcrumbs')
  @include('admin/partials/breadcrumbs', array('breadcrumbs' => Breadcrumbs::generate('list_reviews')))
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
                           ->options(review_statuses_for_select())->label(false)->class('form-control submit-on-change') ?>
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
                    <th>Destination</th>
                    <th>Content</th>
                    <th>Status</th>
                    <th>Created At</th>
                    <th style='min-width: 180px;'>Action</th>
                </tr>
                <?php foreach ($reviews as $review): ?>
                    <tr>
                        <td>{{$review->fullName()}}</td>
                        <td>{{$review->email}}</td>
                        <td>{{$review->departure_date}}</td>
                        <td>{{$review->destination}}</td>
                        <td>
                        	{{truncate_words($review->content, 10)}}
                        	<a href="#" class="btn-show-review-detail" data-content="{{$review->content}}">>> More</a>
                        </td>
                        <td>{{$review->statusString()}}</td>
                        <td>{{$review->created_at->format('M d, Y \a\t H:i')}}</td>
                        <td>

                        	@unless($review->is_approved)
                            <a href="#" class='btn btn-xs btn-success btn-action-with-confirm' data-method="POST" 
                            	data-url="{{route('admin.review.approve', $review->id)}}" data-message="Are you sure want to approve this review?" >
                            	<i class="fa fa-check"></i> Approve
                            </a>
                            @endunless
                            <a href="#" class='btn btn-xs btn-danger btn-action-with-confirm' data-method="POST" 
                            	data-url="{{route('admin.review.reject', $review->id)}}" data-message="Are you sure want to reject this review?">
                            	<i class="fa fa-times"></i> Reject
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
                    <?php echo View::make('partials._paging_info')->with('items', $reviews)->render() ?>
                </div>
                <div class="pull-right">
                    {{$reviews->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('inline_scripts')
	<script type="text/javascript">
		$('.btn-show-review-detail').on('click',function(){
			bootbox.alert($(this).data('content'));
		});
	</script>
@stop