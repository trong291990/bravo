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