@section('header_content')
<h1>Edit Reservation
    <small><?php echo $reservation->booking_id ?></small>
</h1>
@stop
@section('breadcrumbs')
@include('admin/partials/breadcrumbs', array('breadcrumbs' => Breadcrumbs::generate('index_reservations')))
@stop
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="box box-primary">
            <?php Former::populate($reservation) ?>
            <?php echo Former::open(route('admin.reservation.update', $reservation->id))->method('PUT') ?>
            <div class="box-body">
                <div class="row">
                    <?php 
                        $payment = $reservation->include_payment;
                        $paymentStatus = $reservation->payment_status;
                        echo View::make('admin.reservation._form')->with(compact('tours','payment','paymentStatus'))->render() 
                    ?>
                </div>
            </div> 
            <div class="box-footer">
                <div class="row">
                    <div class="col-md-12">
                        <div class="pull-left">
                            Created at: <span class="text-info text-i"><?php echo $reservation->created_at->format('M d, Y \a\t H:i') ?></span>
                        </div>
                        <div class="pull-right">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </div>
            </div> 
            <?php echo Former::close() ?>
        </div>
    </div>
</div>

@stop
@section('inline_scripts')
<script>
    $('#include_payment').on('click',function(){
        if($(this).prop('checked')){
            $('#toggle-payment').slideDown();
        }else{
            $('#toggle-payment').slideUp();
        }
    })
</script>
@stop