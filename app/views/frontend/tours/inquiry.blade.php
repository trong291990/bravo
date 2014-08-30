@section('content')            
    <div id="tour-contact" class="tour-sub-page">
        <div class="row">
            <div class="col-sm-6">
                <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Tours</a></li>
                    <li class="active">Discovery Mekong Delta</li>
                </ol>
            </div>
            <div class="col-sm-6">
                <ul class="list-unstyled list-inline" id="tour-detail-actions">
                    <li><i class="fa fa-envelope"></i> EMAIL TO FRIEND</li>
                    <li><i class="fa fa-print"></i> PRINT THIS PAGE</li>
                    <li><i class="fa fa-phone-square"></i> 19008198</li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3">
                <div id="contact-summary-infor">
                    <h3 class="has-dividor">Interest ?</h3>
                    <p class="small">Email us Directly</p>
                    <p><a href="mailto:support@bravoindochinatour.com">support@bravoindochinatour.com</a></p>
                    <p class="small">Give us a call</p>
                    <p>(+84)917391106</p>
                </div>
            </div>
            <div class="col-sm-9">
                <div class="cleafix">
                   @if(Session::has('success'))
                   <div class="row">
                       @if(Session::has('success'))
                       <div class="alert alert-success">
                           {{Session::get('success')}}
                           <button type="button" class="close" data-dismiss="alert">&times;</button>
                       </div>
                       @endif
                   </div>
                   @endif
               </div>
                <h2>GET YOUR VACATION QUOTE</h2>
                <p>
                    We make planning your trip easy by doing all the work for you. Just complete a couple steps and a our Representative will get in touch with you shortly within 23,5 hours. You can also call us at 866.270.9841 to speak to someone right away.
                </p>
                <h2 class="has-dividor">CONTACT INFORMATION</h2>
                {{ Former::framework('Nude') }}
                {{ Former::open(route('inquiry.store'))->id('request-tour-form') }}
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label>First Name</label>
                            {{ Former::text('first_name')->class('form-control')->maxlength(25)->required() }}
                            <p class="form-help">0 of 25 max character</p>
                        </div>
                        <div class="form-group col-sm-6">
                            <label>Last Name</label>
                            {{ Former::text('last_name')->class('form-control')->maxlength(25)->required() }}
                            <p class="form-help">0 of 25 max character</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Email address</label>
                        {{ Former::email('email')->class('form-control')->required()  }}
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label>Phone number</label>
                            {{ Former::text('phone_number')->class('form-control')->maxlength(25)->required()  }}
                            <p class="form-help">0 of 25 max character</p>
                        </div>
                        <div class="form-group col-sm-6">
                            <label>Best time to call</label>
                            {{ Former::text('best_time_call')->class('form-control')  }}
                        </div>
                    </div>
                    <h2>TRIP DETAIL</h2>
                     <div class="row">
                        <div class="form-group col-sm-6">
                            {{ Former::select('number_of_participants')->options(range(1,100,1))->placeholder('HOW MANY IN YOUR PARTY?')->class('form-control')->required()  }}
                        </div>
                        <div class="form-group col-sm-6">
                            <?php
                                $option = [
                                    "$100 -> $300",
                                    "$300 -> 500",
                                    "$500 -> $700",
                                    "$700 -> $1000",
                                    "$1000 -> $1200",
                                    "$1200 -> $1500",
                                    "$1500 -> $1700",
                                    "$1700 -> $2000",
                                    "$3000 -> $4000"
                                ]
                                
                            ?>
                            {{ Former::select('estimate_budget')->options($option)->placeholder('TOTAL ESTIMATE FOR BUDGET')->class('form-control')->required()  }}
                        </div>
                    </div>
                     <div class="row">
                        <div class="form-group col-sm-6">
                            <label>Departure city</label>
                            {{ Former::text('departure_city')->class('form-control')->maxlength(30)->required()  }}
                            <p class="form-help">0 of 30 max character</p>
                        </div>
                        <div class="form-group col-sm-6">
                            <label>DEPARTURE DATE</label>
                            <div class="input-group">
                              {{ Former::text('departure_date')->class('form-control')->required()  }}
                              <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label>DESTINATION(S)</label>
                            {{ Former::text('destinations')->class('form-control')->maxlength(50)->required()  }}
                        </div>
                        <div class="form-group col-sm-6">
                            <label>LENGTH OF YOUR TRIP(S)</label>
                            {{ Former::select('length_of_trip')->options(range(1,30,1))->placeholder('LENGTH OF TRIP?')->class('form-control')->required()  }}
                        </div>
                    </div>
                    <h2>CLASS OF SERVICE</h2>
                    <div class="row">
                        <div class="form-group col-sm-12">
                            {{ Former::select('cruise_line')->class('form-control')->placeholder('CHOOSE CRUISE LINE') }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-12">
                            <label class="checkbox">
                                {{ Former::checkbox('keep_update')->class('checkbox') }}
                                KEEP ME UPDATED WITH FUTURE OFFERS RELATED TO MY INTERESTS
                            </label>    
                        </div>
                    </div>       
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label>HOW DID YOU FIND US?(OPT)</label>
                            {{ Former::text('find_us_from')->class('form-control') }}
                        </div>
                        <div class="form-group col-sm-6">
                            <label>PREFERRED TRAVEL CONSULTANT(OPT)</label>
                            {{ Former::text('preferred_consultant')->class('form-control') }}
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group  col-sm-12">
                            <label>ADDITIONAL COMMENT</label>
                            {{ Former::textarea('additional_comment')->class('form-control')->rows(5) }}
                        </div>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-danger pull-right"> SUBMIT REQUEST </button>
                    </div>
                {{ Former::close() }}
            </div>
        </div>
    </div>
@stop