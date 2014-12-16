@section('addon_stylesheets')
{{ HTML::style('/plugins/raty/jquery.raty.css') }}
@stop
@section('title')
Indochina Tour Reviews, Indochina Travel Reviews - Bravo Indochina Tours
@stop
@section('keyword')
indochina travel reviews, indochina tour reviews, Bravo indochina Tours review, Bravo indochina Tours, Bravo Indochina Tripadvisor Reviews
@stop
@section('description')
Read what our clients Bravo about our Indochina Tours. Tour reviews submitted by past travellers on our Indochina Tours and Indochina holidays
@stop
@section('content')
<div class='row' id="review-container">
    @include('partials/_flash_messages_autohide')
    <div class='col-sm-12'>
        <h1>Bravo by numbers</h1>
        <p>These full and frank independent holiday reviews are from travellers who have booked directly through Bravo Tours. These holiday reviews are not edited by us or any of the companies we work with. Find the real story, from real travellers below.
        </p>
    </div>
    <div class='clearfix'>
        <div class='bravo-number-item'>
            <p class="bravo-number">10</p>
            <p class="bravo-number-des">Ten years in business</p>
        </div>
        <div class='bravo-number-item'>
            <p class="bravo-number">20000</p>
            <p class="bravo-number-des">Number of travellers</p>
        </div>
        <div class='bravo-number-item'>
            <p class="bravo-number">15</p>
            <p class="bravo-number-des">From countries</p>
        </div>
        <div class='bravo-number-item'>
            <p class="bravo-number">99%</p>
            <p class="bravo-number-des">Nothing perfect and we try to make perfect</p>
        </div>
        <div class='bravo-number-item' style="min-width: 190px">
            <p class="bravo-number">499</p>
            <p class="bravo-number-des">Number of tailor-made itineraries has
                personally designed in his lifetime</p>
        </div>
        <div class='bravo-number-item'>
            <p class="bravo-number">3</p>
            <p class="bravo-number-des">Countries Bravo Tours specialise in</p>
        </div>
        <div class='bravo-number-item'>
            <p class="bravo-number">216</p>
            <p class="bravo-number-des">Highly experienced destination specialists</p>
        </div>
    </div>
    <div class="clearfix" id="client-said-divider">
        <hr class="divider" />
        <span class="client-saild">WHAT OUR CLIENTS SAID</span>
    </div>
    <div id="client-reviewed-list">
        <!-- Old reviews -->
        <div class="client-review-item row">
            <div class="col-sm-3">
                <img style="width: 120px;margin: auto" src="http://www.gravatar.com/avatar/e1a5db7438d54aab2d6fa844293c875a?d=http%3A%2F%2Fbravoindochinatour.com%2Fimages%2Fdefault_avatar.png&amp;s=100" class="img-responsive img-circle">
                <div class="client-review-data-meta">
                    <h4 class="center">
                        Mina Reika 
                    </h4>

                    <h4>Travel with us from Oct 2013</h4>
                </div>
            </div>
            <div class="col-sm-9">
                The whole holiday was memorable. We had a wonderful guide, Charlie, our guide in Vietnam, who so obviously loved his country and made us love it too. Although the travelling was arduous the sights and experiences we had on route were worth it. I found the boat trip in Halung Bay the most relaxing being surrounded by such breathtaking scenery. It would have been nice to have spent more time there                <div style="margin-top: 20px">
                    <div class="client-ratied" data-ratied="5.00">
                    </div>
                </div>
            </div>
        </div>
        <div class="client-review-item row">
            <div class="col-sm-3">
                <img style="width: 120px;margin: auto" src="http://www.gravatar.com/avatar/d41d8cd98f00b204e9800998ecf8427e?d=http%3A%2F%2Fbravoindochinatour.com%2Fimages%2Fdefault_avatar.png&amp;s=100" class="img-responsive img-circle">
                <div class="client-review-data-meta">
                    <h4 class="center">
                        Moria Szuct 
                    </h4>

                    <h4>Travel with us from Nov -0001</h4>
                </div>
            </div>
            <div class="col-sm-9">
                <span><b>Thank you for an excellent holiday</b><span><div>Thank you for an excellent holiday you made for us to visit your beautiful country. The quality of the trip was above what we expected. We felt like we were being treated royally on your tour. We already miss Vietnam and want to come back your way</div><div>Moria Szucs, United Kingdom</div></span></span><br>                <div style="margin-top: 20px">
                    <div class="client-ratied" data-ratied="5.00">
                    </div>
                </div>
            </div>
        </div>
        <div class="client-review-item row">
            <div class="col-sm-3">
                <img style="width: 120px;margin: auto" src="http://www.gravatar.com/avatar/d41d8cd98f00b204e9800998ecf8427e?d=http%3A%2F%2Fbravoindochinatour.com%2Fimages%2Fdefault_avatar.png&amp;s=100" class="img-responsive img-circle">
                <div class="client-review-data-meta">
                    <h4 class="center">
                        Marc and Edie  
                    </h4>

                    <h4>Travel with us from Oct 2013</h4>
                </div>
            </div>
            <div class="col-sm-9">
                <span><b>Everything was wonderful</b><span><div>Everything was wonderful: every homestay, every guide, each activity, all the places we went... we thank you so much for planning this excellent adventure for us, we will recommend Footprint to anyone thinking of going to Vietnam.</div><div>Marc and Edie, USA</div></span></span><br>                <div style="margin-top: 20px">
                    <div class="client-ratied" data-ratied="5.00">
                    </div>
                </div>
            </div>
        </div>
        <div class="client-review-item row">
            <div class="col-sm-3">
                <img style="width: 120px;margin: auto" src="http://www.gravatar.com/avatar/d41d8cd98f00b204e9800998ecf8427e?d=http%3A%2F%2Fbravoindochinatour.com%2Fimages%2Fdefault_avatar.png&amp;s=100" class="img-responsive img-circle">
                <div class="client-review-data-meta">
                    <h4 class="center">
                        Nancy Mc Donal  
                    </h4>

                    <h4>Travel with us from Nov 2013</h4>
                </div>
            </div>
            <div class="col-sm-9">
                <span><b>I would highly recommend Bravo Tours</b><span><div>What an incredible trip! We would have liked to know areas at time the policy on tipping in Vietnam. Otherwise, it was perfect. I would highly recommend Footprint. We will never forget this beautiful country and the wonderful Vietnamese people. Thank you Footprint.</div><div>Nancy Mc Donald, United States</div></span></span><br>                <div style="margin-top: 20px">
                    <div class="client-ratied" data-ratied="5.00">
                    </div>
                </div>
            </div>
        </div>
        <div class="client-review-item row">
            <div class="col-sm-3">
                <img style="width: 120px;margin: auto" src="http://www.gravatar.com/avatar/d41d8cd98f00b204e9800998ecf8427e?d=http%3A%2F%2Fbravoindochinatour.com%2Fimages%2Fdefault_avatar.png&amp;s=100" class="img-responsive img-circle">
                <div class="client-review-data-meta">
                    <h4 class="center">
                        Asun Yadara  
                    </h4>

                    <h4>Travel with us from Dec 2013</h4>
                </div>
            </div>
            <div class="col-sm-9">
                <span><b>Excellent trip, amazing landscape</b><span><div>Everything was excellent. My special thanks to Ms. Nhan for helping me plan this trip. Without her, I would not have been able to do this. Another tour operators approached me but communicating with them was bad. I would not have enjoyed this trip without my two wonderful guides - Phong &amp; Thoi who took a very good care of us. Excellent trip, amazing landscape – will come back Vietnam and Footprint.</div><div>Asun Yadara, Australia</div></span></span>                <div style="margin-top: 20px">
                    <div class="client-ratied" data-ratied="5.00">
                    </div>
                </div>
            </div>
        </div>
        <!-- End old reviews -->
        @foreach($reviews as $review)
        <div class="client-review-item row">
            <div class="col-sm-3">
                <img style="width: 120px;margin: auto" src="{{gravatar_url($review->email)}}" class="img-responsive img-circle" />
                <div class="client-review-data-meta">
                    <h4 class="center">
                        {{$review->customer->name}}
                        @if($review->customer->nationality)
                        <span class="text-muted">({{$review->customer->nationality}})</span>
                        @endif
                    </h4>
                    @if($review->departure_date) 
                    <h4>Travel with us from <?php echo date('M Y', strtotime($review->departure_date)) ?></h4>
                    @endif
                </div>
            </div>
            <div class="col-sm-9">
                {{$review->content}}
                <div style="margin-top: 20px">
                    <div class='client-ratied' data-ratied="{{$review->score}}">
                    </div>
                </div>
            </div>
        </div>
        @endforeach

        <div class="clearfix" style="margin-top: 20px">
            <?php echo $reviews->links(); ?>
        </div>

    </div>

    <div class='clearfix'>
        <h3>BEEN TO BRAVO TOURS? SHARE YOUR EXPERIENCES AND BRAVO US</h3>
        <div class="clearfix">
            <div class='col-sm-2'>
                <a class='btn btn-warning btn-block'> BRAVO US</a>
            </div>
            <div class="col-sm-2">
                <a class='btn btn-primary btn-block'> TRIPADVISOR</a>
            </div>
        </div>
        <div class='row clearfix'>
            <?php if ($loggedCustomer): ?>
                <div class='col-sm-10 col-sm-offset-2'>
                    <hr class='divider'/>
                    <form action="{{route('review_submit')}}" id="review-form" method='POST'>
                        <div class="row">
                            <div class="col-sm-12">
                                <span style="font-size: 1.3em">YOUR RATE ON OUR SERVICE</span> <span id="client-raty"></span>
                            </div>
                        </div>
                        <h3>TRIP DETAIL</h3>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label >Destinations</label>
                                    <input required="required" name='destination' type="text" class="form-control" />
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label >Departure date</label>
                                    <input name='departure_date' type="text" required="required" class="form-control datepicker" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label >Your review</label>
                            <textarea class="form-control ckeditor" name="content" rows="10"></textarea>
                        </div>
                        <h3>UPLOAD YOUR TRIP PHOTOS</h3>      
                        <div class="form-group">
                            <input class="form-control bootstrap-input-file" type="file" multiple="true" name="photos"/>
                        </div>                        
                        <div class="form-group text-center">
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </div>     
                    </form>
                </div>


            <?php else: ?>
                <div class="clearfix">
                    <hr class='divider'/>
                </div>
                <h4 class="text-center">Please
                    <a href="#modal-login" data-toggle="modal">Sign in</a> to write your review
                </h4>
            <?php endif; ?>
        </div>
    </div>
</div>
@stop
@section('addon_js')
{{ HTML::script('/plugins/raty/jquery.raty.js') }}
{{ HTML::script('/plugins/ckeditor-bootstrap/ckeditor.js') }}
@stop
@section('inline_scripts')
<script>
    $('.client-ratied').each(function() {
        var dataRaty = $(this).data('ratied');
        $(this).raty({starType: 'i', 'score': dataRaty, readOnly: true});
    });
    $('#client-raty').raty({starType: 'i', 'score': 4});

    $('#review-form').removeAttr('novalidate');
    $('#review-form').on('submit', function() {
        if($(this).find('[name="content"]').val().trim().length === 0) {
            bootbox.alert("Please write your review");
            return false;
        }
    });
    $('.ckeditor').each(function(e) {
        CKEDITOR.replace(this);
    });
</script>
@stop
