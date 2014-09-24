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
        @foreach($reviews as $review)
        <div class="client-review-item row">
            <div class="col-sm-3">
                <img style="width: 120px;margin: auto" src="{{gravatar_url($review->email)}}" class="img-responsive img-circle" />
                <div class="client-review-data-meta">
                    <h4 class="center">{{$review->first_name}} {{$review->last_name}}</h4>
                    @if($review->departure_date) 
                    <h4>Travel with us from <?php echo date('Y', strtotime($review->departure_date)) ?></h4>
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

    <div class='cleafix'>
        <h3>BEEN TO BRAVO TOURS? SHARE YOUR EXPERIENCES AND BRAVO US</h3>
        <div class="cleafix">
            <div class='col-sm-2'>
                <a class='btn btn-warning btn-block'> BRAVO US</a>
            </div>
            <div class="col-sm-2">
                <a class='btn btn-primary btn-block'> TRIPADVISOR</a>
            </div>
        </div>
        <div class='cleafix'>
            <div class='col-sm-10 col-sm-offset-2'>
                <hr class='divider' />
                <h3>CONTACT INFORMATION</h3>
                <form action="{{route('review_submit')}}" id="review-form" method='POST'>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label >First name</label>
                                <input name='first_name' type="text" required="required" class="form-control"/>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label >Last name</label>
                                <input name='last_name' type="text" required="required" class="form-control" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Email Address</label>
                        <input name='email' type="email" required="required" class="form-control"  />
                    </div>
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
                        <textarea class="form-control html5-editor" name="content">
                        </textarea>
                    </div>      
                    <div class="form-group">
                        <button class="btn btn-primary pull-right" type="submit">Submit</button>
                    </div>     
                </form>
            </div>
        </div>
    </div>
</div>
@stop
@section('addon_js')
{{ HTML::script('/plugins/raty/jquery.raty.js') }}
@stop
@section('inline_scripts')
<script>
    $('.client-ratied').each(function() {
        var dataRaty = $(this).data('ratied');
        $(this).raty({starType: 'i', 'score': dataRaty, readOnly: true});
    });
    $('#client-raty').raty({starType: 'i', 'score': 4});
    $('#review-form').removeAttr('novalidate');
</script>
@stop
