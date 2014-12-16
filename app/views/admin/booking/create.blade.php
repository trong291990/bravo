@section('header_content')
<h1>
    New Booking
    <small>Create a new Booking</small>
</h1>
@stop
@section('content')

<div class="box-body">
    {{Former::vertical_open()->method("POST")->action(route('admin.booking.store'))}}
        {{Former::token()}}
        <div class="row">
            <div class="col-sm-8">
                {{Former::text('tour_name')}}
            </div>
            <div class="col-sm-4">
                {{Former::text('travel_date')->addClass('datepicker')->data_date_format('yyyy-mm-dd')}}
            </div>
            <div class="col-sm-4">
                {{Former::select('room_type')->options(Booking::getRoomTypes())}}
            </div>
            <div class="col-sm-4">
                {{Former::text('main_contact')}}
            </div>
            <div class="col-sm-4">
                {{Former::email('email')}}
            </div>
            <div class="col-sm-4">
                {{Former::text('contact_number')}}
            </div>
            <div class="col-sm-4">
                {{Former::text('arrival_date')->addClass('datepicker')->data_date_format('yyyy-mm-dd')}}
            </div>
            <div class="col-sm-4">
                {{Former::text('airline_flight_no')}}
            </div>
            <div class="col-sm-4">
                {{Former::text('arrival_time')->placeholder('00:00 AM')}}
            </div>
            <div class="col-sm-4">
                {{Former::text('departure_date')->addClass('datepicker')->data_date_format('yyyy-mm-dd')}}
            </div>
            <div class="col-sm-4">
                {{Former::text('departure_flight_no')}}
            </div>
            <div class="col-sm-4">
                {{Former::text('departure_time')->placeholder('00:00 AM')}}
            </div>
            <div class="col-sm-4">
                {{Former::text('total')}}
            </div>
            <div class="col-sm-4">
                {{Former::text('deposit')}}
            </div>
            <div class="col-sm-12">
                {{Former::textarea('addition_comment')}}
            </div>
            <div id="passengers" style="margin-left: 15px;margin-right: 15px;">
                <h4>Passengers</h4>
                <p>Detail as per passport</p>
                <div class="row passenger-item">
                    <div class="col-sm-1">
                        <label>Title</label>
                        <select class="form-control not-picker" name="passengers[title][]">
                            <option value="Mr">Mr</option>
                            <option value="Mrs">Mrs</option>
                            <option value="Miss">Miss</option>
                            <option value="Sir">Sir</option>
                        </select>
                    </div>
                    <div class="col-sm-2">
                        <label>Sub name</label>
                        <input type="text" name="passengers[sub_name][]" class="form-control" />
                    </div>
                    <div class="col-sm-3">
                        <label>First and middle name</label>
                        <input type="text" name="passengers[first_middle_name][]" class="form-control" />
                    </div>
                    <div class="col-sm-2">
                        <label>Date of birthday</label>
                        <input type="text" name="passengers[birthday][]" class="form-control datepicker" />
                    </div>
                    <div class="col-sm-2">
                        <label>PP Number</label>
                        <input type="text" name="passengers[pp_number][]" class="form-control" />
                    </div>
                    <div class="col-sm-2">
                        <label>Nationality</label>
                        <input type="text" name="passengers[nationality][]" class="form-control" />
                    </div>
                </div>
            </div>
            <div class="clearfix" style="margin: 10px 15px;">
                <a id="passenger-add" href="javascript:void(0)" class="btn btn-primary btn-sm" >Add passenger</a>
            </div>
            <div class="col-sm-12 inline-radio">
                {{Former::radios('status')->radios(Booking::getStatus())}}
            </div>
            <div class='col-md-12 text-right'>
                    <!-- Form actions -->
                    <a href='{{URL::previous()}}' class='btn btn-default'>Cancel</a>
                    <button type='submit' class='btn btn-primary'>Submit</button>
            </div>
        </div>
    {{Former::close()}}
</div>
<div style="display: none" id="passenger-pattern">
        <div class="row passenger-item">
            <div class="col-sm-1">
                <label>Title</label>
                <select class="form-control not-picker" name="passengers[title][]">
                    <option value="Mr">Mr</option>
                    <option value="Mrs">Mrs</option>
                    <option value="Miss">Miss</option>
                    <option value="Sir">Sir</option>
                </select>
            </div>
            <div class="col-sm-2">
                <label>Sub name</label>
                <input type="text" name="passengers[sub_name][]" class="form-control" />
            </div>
            <div class="col-sm-3">
                <label>First and middle name</label>
                <input type="text" name="passengers[first_middle_name][]" class="form-control" />
            </div>
            <div class="col-sm-2">
                <label>Date of birthday</label>
                <input type="text" name="passengers[birthday][]" class="form-control datepicker" />
            </div>
            <div class="col-sm-2">
                <label>PP Number</label>
                <input type="text" name="passengers[pp_number][]" class="form-control" />
            </div>
            <div class="col-sm-2">
                <label>Nationality</label>
                <input type="text" name="passengers[nationality][]" class="form-control" />
            </div>
            <div class="col-sm-12">
                <a class="pull-right remove-passenger" href="javascript:void(0)">Remove</a>
            </div>
        </div>
    </div>
@stop

@section('inline_scripts')
<script type="text/javascript">
    $('#passenger-add').on('click',function(){
        $('#passengers').append($('#passenger-pattern').html());
        $('.datepicker').datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true
        });
    });
    $('#passengers').on('click','.remove-passenger',function(){
        //console.log('this is form remoe');
        $(this).parents('.passenger-item').remove();
    });
</script>
@stop