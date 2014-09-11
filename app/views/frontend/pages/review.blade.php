@section('addon_stylesheets')
{{ HTML::style('/plugins/raty/jquery.raty.css') }}
@stop
@section('content')
<div class='row' id="review-container">
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
            <p class="bravo-number-des">Number of tailor-made itineraries has personally designed in his lifetime</p>
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
        <div class="client-review-item row">
             <div class="col-sm-2">
                <img src="{{Request::root()}}/frontend/images/page/client.jpg" class="img-responsive" />
            </div>
            <div class="col-sm-10">
                <h3>The trip went brilliantly. Many thanks to all your staff involved.</h3>
                <p>
                Peter was a superb guide, bless you for allocating him to us. His English is great, his knowledge is phenomenal, not just historically, but I don't think there was one of the idiotic questions my group asked to which he did not know the answer. including the price of rubber per kilo! Both our drivers were incredibly pleasant guys too and very obliging.
                All of the hotels were superb. Outstanding ones were:
                Rimping Village - incredibly quiet location, nice resort atmosphere and very friendly staff. One can stroll to the best restaurants in town (on the river bank) and even the Night Markets.
                Lampang River Lodge - Quiet location, lovely resort atmosphere. OK, it is a long way from town, but there does not appear to be much in town anyway!
                Mae Kok River Village - The town of Thaton is of no interest, but, the setting for the resort is spectacular. The rooms are stunning and the gardens outstanding. Very nice owners.
                </p><p>
                Legend - Top place with gorgeous rooms. Lovely gardens, beaut public areas and lovely location. Good restaurants too (just don't order the steak!).
                </p>
                Thanks for all your help.<br/>
                Trevor<br/>
                (From Discover Asia)
                <div style="margin-top: 20px">
                    <div id='client-ratied'>

                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class='cleafix'>
        <h3>Been to BRAVO TOURS? Share your experiences and BRAVO US</h3>
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
                <?php echo Former::open(); ?>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label >First name</label>
                            <input name='first_name' type="text" class="form-control"/>
                         </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label >Last name</label>
                            <input name='first_name' type="text" class="form-control" />
                         </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Email Address</label>
                    <input name='first_name' type="text" class="form-control"  />
                 </div>  
                <div class="form-group">
                    <h4 style="display: inline">YOUR RATE ON OUR SERVICE</h4>
                    <div id="client-raty"></div>
                </div>
                <h3>TRIP DETAIL</h3>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label >Destinations</label>
                            <input name='destination' type="text" class="form-control" />
                         </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label >Departure day</label>
                            <input name='departure_day' type="text" class="form-control datepicker" />
                         </div>
                    </div>
                </div>
                <div class="form-group">
                    <label >Your review</label>
                    <textarea class="form-control">
                        
                    </textarea>
                </div>      
                     
                <?php echo Former::close();?>
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
    $('#client-ratied').raty({ starType: 'i','score':4,readOnly:true});
    $('#client-raty').raty({ starType: 'i','score':4});
</script>
@stop