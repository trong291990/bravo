@section('title')
 Customize your trip  | Bravo Indochina  
@stop

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
                    <p><a style="font-size: 13px" href="mailto:support@bravoindochinatour.com"><i class="fa fa-envelope"></i> support@bravoindochinatour.com</a></p>
                    <p class="small">Give us a call</p>
                    <p style="font-size: 13px"> <i class="fa fa-phone"></i> (+84)917391106</p>
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
                {{ Former::open(route('inquiry.store'))->id('request-tour-form')->class('just-form') }}
                    <div class="row">
                        <div class="form-group col-sm-6 {{$errors->has('first_name') ? 'has-error' : ''}}">
                            <label class="control-label">First Name</label>
                            {{ Former::text('first_name')->class('form-control')->maxlength(25) }}
                            @if($errors->has('first_name'))
                            <span class="help-block">{{$errors->get('first_name')[0]}}</span>
                            @else
                            <p class="form-help">0 of 25 max character</p>
                            @endif
                        </div>
                        <div class="form-group col-sm-6 {{$errors->has('last_name') ? 'has-error' : ''}}">
                            <label class="control-label">Last Name</label>
                            {{ Former::text('last_name')->class('form-control')->maxlength(25)}}
                            @if($errors->has('last_name'))
                            <span class="help-block">{{$errors->get('last_name')[0]}}</span>
                            @else
                            <p class="form-help">0 of 25 max character</p>
                            @endif
                        </div>
                    </div>
                    <div class="form-group {{$errors->has('email') ? 'has-error' : ''}}">
                        <label class="control-label">Email address</label>
                        {{ Former::email('email')->class('form-control') }}
                        @if($errors->has('email'))
                        <span class="help-block">{{$errors->get('email')[0]}}</span>
                        @endif
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-6 {{$errors->has('phone_number') ? 'has-error' : ''}}">
                            <label class="control-label">Phone number</label>
                            {{ Former::text('phone_number')->class('form-control')->maxlength(25)  }}
                            @if($errors->has('phone_number'))
                            <span class="help-block">{{$errors->get('phone_number')[0]}}</span>
                            @else                           
                            <p class="form-help">0 of 25 max character</p>
                            @endif
                        </div>
                        <div class="form-group col-sm-6 {{$errors->has('best_time_call') ? 'has-error' : ''}}">
                            <label class="control-label">Best time to call</label>                       
                            {{ Former::text('best_time_call')->class('form-control')  }}
                            @if($errors->has('best_time_call'))
                            <span class="help-block">{{$errors->get('best_time_call')[0]}}</span> 
                            @endif                               
                        </div>
                    </div>
                    <h2>TRIP DETAIL</h2>
                     <div class="row">
                        <div class="form-group col-sm-6 {{$errors->has('number_of_participants') ? 'has-error' : ''}}">
                            <label class="control-label">HOW MANY IN YOUR PARTY?</label>   
                            {{ Former::select('number_of_participants')->options(range(1,100,1))->class('form-control')->placeholder('-- Select one --')  }}
                            @if($errors->has('number_of_participants'))
                            <span class="help-block">{{$errors->get('number_of_participants')[0]}}</span> 
                            @endif                                    
                        </div>
                        <div class="form-group col-sm-6 {{$errors->has('estimate_budget') ? 'has-error' : ''}}">
                            <?php
                                $option = [
                                    "$100 -> $300" => "$100 -> $300",
                                    "$300 -> 500"  => "$300 -> 500",
                                    "$500 -> $700" =>  "$500 -> $700",
                                    "$700 -> $1000" =>  "$700 -> $1000",
                                    "$1000 -> $1200" => "$1000 -> $1200",
                                    "$1200 -> $1500" => "$1200 -> $1500",
                                    "$1500 -> $1700" => "$1500 -> $1700",
                                    "$1700 -> $2000" => "$1700 -> $2000",
                                    "$3000 -> $4000" => "$3000 -> $4000"
                                ]
                                
                            ?>
                            <label class="control-label">TOTAL ESTIMATE FOR BUDGET</label>  
                            {{ Former::select('estimate_budget')->options($option)->class('form-control')->placeholder('-- Select one --')  }}
                            @if($errors->has('estimate_budget'))
                            <span class="help-block">{{$errors->get('estimate_budget')[0]}}</span> 
                            @endif                              
                        </div>
                    </div>
                     <div class="row">
                        <div class="form-group col-sm-6 {{$errors->has('departure_city') ? 'has-error' : ''}}">
                            <label class="control-label">Departure city</label>
                            {{ Former::select('departure_city')->class('form-control')->placeholder('-- Select one --')
                            ->options(area_cities_options_for_select($areas)) }}
                            @if($errors->has('departure_city'))
                            <span class="help-block">{{$errors->get('departure_city')[0]}}</span> 
                            @else                               
                            <p class="form-help">0 of 30 max character</p>
                            @endif
                        </div>
                        <div class="form-group col-sm-6 {{$errors->has('departure_date') ? 'has-error' : ''}}">
                            <label class="control-label">DEPARTURE DATE</label>
                            <div class="input-group">
                              {{ Former::text('departure_date')->class('form-control datepicker')  }}
                              <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                            </div>
                            @if($errors->has('departure_date'))
                            <span class="help-block">{{$errors->get('departure_date')[0]}}</span>                               
                            @endif                            
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-6 {{$errors->has('destinations') ? 'has-error' : ''}}">
                            <label class="control-label">DESTINATION(S)</label>
                            {{ Former::text('destinations')->class('form-control')->maxlength(50) }}
                            @if($errors->has('destinations'))
                            <span class="help-block">{{$errors->get('destinations')[0]}}</span>                               
                            @endif                            
                        </div>
                        <div class="form-group col-sm-6 {{$errors->has('length_of_trip') ? 'has-error' : ''}}">
                            <label class="control-label">LENGTH OF YOUR TRIP</label>
                            {{ Former::select('length_of_trip')->options(range(1,30,1))->class('form-control')  }}
                            @if($errors->has('length_of_trip'))
                            <span class="help-block">{{$errors->get('length_of_trip')[0]}}</span>                               
                            @endif                                
                        </div>
                    </div>
                    <h2>CLASS OF SERVICE</h2>
                    <div class="row">
                        <div class="form-group col-sm-12">
                            <label class="control-label">CHOOSE CRUISE LINE</label>
                            <?php 
                            $cruiseLineOpts = [
                                "Standard Hotels - generally 1-2 star" => "Standard Hotels - generally 1-2 star",
                                'First Class Hotels - generally 2-3 star' => 'First Class Hotels - generally 2-3 star',
                                'Superior Hotels - generally 3-4 star' => 'Superior Hotels - generally 3-4 star',
                                'Deluxe Hotels - generally 4-5 star' => 'Deluxe Hotels - generally 4-5 star',
                                'Super Deluxe Hotels - generally 5-6 star' => 'Super Deluxe Hotels - generally 5-6 star'
                            ]
                             ?>
                            {{ Former::select('cruise_line')->class('form-control')->placeholder('-- Select one --')->options($cruiseLineOpts) }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-12">
                            <label class="checkbox">
                                {{ Former::checkbox('keep_update')}}
                                KEEP ME UPDATED WITH FUTURE OFFERS RELATED TO MY INTERESTS
                            </label>    
                        </div>
                    </div>       
                    <div class="row">
                        <div class="form-group col-sm-6 {{$errors->has('find_us_from') ? 'has-error' : ''}}">
                            <label>HOW DID YOU FIND US?(OPT)</label>
                            {{ Former::text('find_us_from')->class('form-control') }}
                            @if($errors->has('find_us_from'))
                            <span class="help-block">{{$errors->get('find_us_from')[0]}}</span>                               
                            @endif                              
                        </div>
                        <div class="form-group col-sm-6 {{$errors->has('preferred_consultant') ? 'has-error' : ''}}">
                            <label>PREFERRED TRAVEL CONSULTANT(OPT)</label>
                            {{ Former::text('preferred_consultant')->class('form-control') }}
                            @if($errors->has('preferred_consultant'))
                            <span class="help-block">{{$errors->get('preferred_consultant')[0]}}</span>                               
                            @endif                                 
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-sm-12 {{$errors->has('additional_comment') ? 'has-error' : ''}}">
                            <label>ADDITIONAL COMMENT</label>
                            {{ Former::textarea('additional_comment')->class('form-control')->rows(5) }}
                            @if($errors->has('additional_comment'))
                            <span class="help-block">{{$errors->get('additional_comment')[0]}}</span>                               
                            @endif                             
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