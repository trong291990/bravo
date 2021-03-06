<!DOCTYPE html>
<html>
    <head>
        <title>@yield('title')</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        <meta name="keywords" content="@yield('keyword')" />
        <meta name="description" content="@yield('description')"/>
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic' rel='stylesheet' type='text/css'>
        <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-546dfa262e2da9aa" async="async"></script>
        <script type="text/javascript">var switchTo5x=true;</script>
        <script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
        <script type="text/javascript">
            stLight.options({
                publisher: "ur-a6195c9c-896b-1fbe-df4e-8ec7d00b8f9", 
                doNotHash: false, 
                doNotCopy: false, 
                hashAddressBar: false
            });
        </script>
        {{ Minify::stylesheet( array(
                        '/shared/bootstrap/3.0.0/css/bootstrap.css',
                        '/fonts/font-awesome.css',
                        '/fonts/augushand.css',
                        '/frontend/css/site.css',
                        '/frontend/css/album.css',
                        '/frontend/css/addon.css',
                        '/plugins/bootstrap-select/bootstrap-select.min.css',
                        '/plugins/bootstrap-datepicker/bootstrap-datepicker3.css',
                        '/plugins/icheck/skins/all.css',
                        '/plugins/justifiedgallery/justifiedgallery.css',
                        '/plugins/photor/photor.css'
                    )
            ) 
        }}
        
        {{HTML::style('/frontend/css/media.css')}}
        {{HTML::script('/shared/js/jquery-2.0.3.min.js')}}
        
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
        @yield('addon_stylesheets')
    </head>
    <body class="{{trim($__env->yieldContent('body_class'))}}">
        <header>
            <div class="container">
                <div class="col-sm-6">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="dropdown">
                          <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            USD($)  <span class="caret"></span>
                          </a>
                          <ul class="dropdown-menu" role="menu">
        
            <li><a class="txtC" onclick="changeCurrency('GBP');">GBP
                (£)</a></li>
            <li><a class="txtC" onclick="changeCurrency('EUR');">EUR
                (€)</a></li>
        
    
        
            <li><a class="txtC" onclick="changeCurrency('AUD');">AUD
                ($)</a></li>
        
    
        
            <li><a class="txtC" onclick="changeCurrency('CAD');">CAD
                ($)</a></li>
        
    
        
            <li><a class="txtC" onclick="changeCurrency('NZD');">NZD
                ($)</a></li>
        
    
    
                          </ul>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                              English  <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Deutsch</a></li>
                                <li><a href="#">Français</a></li>
                                <li><a href="#">Español</a></li>
                                <li><a href="#">Português (Brasil)</a></li>
                                <li><a href="#">Dansk</a></li>
                                <li><a href="#">Nederlands</a></li>
                                <li><a href="#">Norsk</a></li>
                                <li><a href="#">Svenska</a></li>
                                <li><a href="#">日本語</a></li>
                            
                            </ul>
                        </li>
                      </ul>
                </div>
                <div class="col-sm-6">
                    <ul class="nav nav-tabs pull-right" role="tablist">
                        <li class="dropdown">
                            <?php if(@$loggedCustomer || @$loggedSpecialist): ?>
                                <?php if(@$loggedCustomer) :?>
                                    <a href="#"> {{ Auth::customer()->get()->name }} <span class="caret"></span> </a>
                                <?php else: ?>
                                    <a href="#"> {{ Auth::specialist()->get()->first_name }} <span class="caret"></span> </a>
                                <?php endif; ?>
                            <?php else : ?>
                                <a href="#"><i class="fa fa-lock"></i> Login /Register <span class="caret"></span> </a>
                            <?php endif; ?>

                            <ul class="dropdown-menu" role="menu">
                                <?php if(!@$loggedCustomer && !@$loggedSpecialist): ?>
                                    <li>
                                        <a href="#modal-login" data-toggle='modal'><i class="icon icon-menu-avatar mrm"></i>Log In</a>
                                    </li>
                                    <li>
                                        <a href="#modal-register" data-toggle='modal'><i class="icon icon-menu-pen mrm"></i>Register</a>   
                                    </li>
                                <?php endif; ?>
                                <?php if(!@$loggedSpecialist): ?>   
                                <li>
                                    <a href="#"><i class="icon icon-menu-people mrm"></i>Refer a Friend</a>
                                </li>

                                <li>
                                    <a href="#">
                                        <i class="icon icon-menu-tag mrm"></i>Deals and Offers<span class="circle-number-s mlm" style="display:none;" id="offersCount">0</span>
                                    </a>
                                </li>
                                <?php endif; ?> 
                                <?php if(@$loggedCustomer || @$loggedSpecialist): ?>
                                    <?php 
                                    if(@$loggedCustomer) {
                                        $profile_url = route('customer.edit_profile');
                                    } else {
                                        $profile_url = route('specialist.edit_profile');
                                    }
                                    ?>
                                    <li>
                                        <a href="{{$profile_url}}">
                                            <i class="fa fa-user"></i> My Profile
                                        </a>
                                    </li>                                      
                                    <li>
                                        <a href="{{route('logout', ['back_url' => Request::url()])}}">
                                            <i class="fa fa-sign-out"></i> Log out
                                        </a>
                                    </li>                                
                                <?php endif; ?>    
                            </ul>
                        </li>
                        <?php if(@$loggedCustomer): ?>
                        <li>
                            <a href="{{route('wishlist.index')}}">
                                <span id="wishlist-span"><i class="fa fa-list"></i></span>
                                Wishlist
                            </a>
                        </li>
                        <?php endif; ?>   
                    </ul>
                </div>
            </div>
        </header>
        <div id="header" @yield('area_class')>
             <div role="navigation" class="navbar navbar-default" id="main-nav-warrper" >
                <div class="container">
                    <div class="navbar-header">
                        <button data-target="#main-nav" data-toggle="collapse" class="navbar-toggle" type="button">
                            <span class="sr-only">Bravo Tour</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a href="#" class="navbar-brand" id="main-logo">
                            <img alt="Bravo Indochina Tour logo" class="img-responsive" src="{{ URL::asset('/') }}frontend/images/page/main_logov2.jpg">
                            <span class="sr-only">Bravo Tour Since 2009</span>
                        </a>
                    </div>
                    <div class="navbar-collapse collapse" id="main-nav">
                        <ul class="nav navbar-nav pull-right">
                            <li class="active"><a href="{{Request::root()}}">Home</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">About Us <span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="{{route('about_us')}}">About Us</a></li>
                                    <li><a href="{{route('why_travel_with_us')}}">Why travel with us</a></li>
                                    <li><a href="{{route('join_our_team')}}">Join Our Team</a></li>
                                    <li><a href="{{route('responsible_policy')}}">Responsible Policy</a></li>
                                    <li><a href="{{route('terms_and_condition')}}">Term & Condition</a></li>
                                    <li><a href="{{route('faq')}}">FAQ</a></li>
                                    <li><a href="{{route('travel_album')}}">Travel Album</a></li>
                                </ul>
                            </li>      
                            <li><a href="{{Request::root()}}/indochina-travel-blog/">Blog</a></li>
                            <li><a href="{{route('review')}}">Reviews</a></li>
                            <li><a href="{{route('contact')}}">Contact</a></li>
                            <li>
                                <form id="search-form" action="{{route('tour.search')}}">
                                    <input type="text" placeholder="Search" name="keyword" value="{{Input::get('keyword')}}"/>
                                    <button type="submit"><i class="fa fa-search"></i></button>
                                </form>
                            </li>
                        </ul>
                    </div><!--/.nav-collapse -->
                    <div id="country-main-nav-wrapper">
                        <ul class="list-unstyled list-inline">
                            <li><a href="{{Request::root()}}/tours/indochina-tours">Indochina</a></li>
                            <li><a href="{{Request::root()}}/tours/vietnam-tours">Vietnam</a></li>
                            <li><a href="{{Request::root()}}/tours/cambodia-tours">Cambodia</a></li>
                            <li><a href="{{Request::root()}}/tours/laos-tours">Lao</a></li>
                            <li><a href="{{Request::root()}}/tours/thailand-tours">Thailand</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="container" id="main-captions">
                <div class="col-lg-3 col-lg-offset-9 col-sm-6 col-sm-offset-6 no-padding">
                    <div class="header-caption">
                        <p>Customize Your Indochina Trip </p>
                        <p class="small">Easy steps to a free <span class="underline">custom itinerary</span></p>
                        <div class="clearfix">
                            <a class="btn btn-default btn-flat pull-right" href="{{route('inquiry.create')}}">Start now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container {{trim($__env->yieldContent('container_class'))}}">
            @yield('content')
            @include('frontend.partials.order_book')
            <div id="footer" class="row" style="display: none">
                <div class="col-sm-8  clearfix" id="footer-left">
                   <div class="col-sm-3 no-padding-left">
                       <p style="text-align: center">What other travel Bravo Us <br/> &nbsp;</p>
                        <div>
                            <a href="http://www.yelp.com.sg/biz/bravo-indochina-tours-and-travel-singapore">
                                <img style="height: 50px;margin: auto" class="img-responsive" src="{{ URL::asset('/') }}frontend/images/page/badge.jpg">
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <p>Checkout what other travelers <br/>Bravo us On TripAdvisor</p>
                        <div>
                            <a target="_blank" href="http://www.tripadvisor.com/Attraction_Review-g293925-d7065652-Reviews-Bravo_Indochina_Tours_Day_Tours-Ho_Chi_Minh_City.html">
                                <img alt="Bravo us On TripAdvisor" class="img-responsive" src="{{ URL::asset('/') }}frontend/images/page/tripadvisor.png">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-2">
                        <p>Checkout what our client said <br/> &nbsp;</p>
                        <div>
                            <a href="http://www.reviewcentre.com/Tour-Companies/Bravo-Indochina-Tours-www-bravoindochinatour-com-reviews_2826805">
                                <img alt="Checkout what our client said " class="img-responsive" src="{{ URL::asset('/') }}frontend/images/page/review_cente.png">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-4 no-padding-right">
                        <p>Contact us for reservations and questions 19001578 </p>
                        <div id="intro-socials">
                            <ul class="list-unstyled list-inline">
                                <li><a href="https://facebook.com/bravoindochinatour"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="https://www.linkedin.com/company/bravo-indochina-tours"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="https://plus.google.com/+bravoindochina"><i class="fa fa-google-plus"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div id="enewsletter-sign-up">
                        <h3>ENEWSLETTER SIGN UP</h3>
                        <form action="{{ route('subscribe_newsletter') }}" method="POST">
                            <input type="text" required="required" name="email" />
                            <button type="submit" class="btn btn-warning"> SIGN UP</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <footer >
            <div class="container">
                <div class="row" id="bravo-tour-footer">
                    <?php 
                        $styles = TravelStyle::all();
                    ?>
                    <div class="col-sm-3" >
                        <h4>Viet Nam</h4>
                        <ul class="list-unstyled">
                            <?php foreach ($styles as $s) : ?>
                            <li><a href="<?php echo Request::root() ?>/tours/vietnam-tours/<?php echo $s->slug ?>"><?php echo $s->name ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <div class="col-sm-3">
                        <h4>Lao</h4>
                        <ul class="list-unstyled">
                            <?php foreach ($styles as $s) : ?>
                            <li><a href="<?php echo Request::root() ?>/tours/laos-tours/<?php echo $s->slug ?>"><?php echo $s->name ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <div class="col-sm-3">
                        <h4>Cambodia</h4>
                        <ul class="list-unstyled">
                           <?php foreach ($styles as $s) : ?>
                            <li><a href="<?php echo Request::root() ?>/tours/cambodia-tours/<?php echo $s->slug ?>"><?php echo $s->name ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <div class="col-sm-3">
                        <h4>Thailand</h4>
                        <ul class="list-unstyled">
                           <?php foreach ($styles as $s) : ?>
                            <li><a href="<?php echo Request::root() ?>/tours/thailand-tours/<?php echo $s->slug ?>"><?php echo $s->name ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
                <hr class="divider" />
                <div class="row" id="footer-ext">
                    <div class="col-sm-3">
                        <h4>Check out what clients Bravo us on </h4>
                        <ul class="list-unstyled" id="bravo-clients">
                            <li class="row">
                                <div class="col-xs-4">
                                    <img class="img-responsive" src="/frontend/images/footer/responsible.png" alt="Responsible Travel" />
                                </div>
                                <div class="col-xs-8 no-padding-left">
                                    <p> Responsible Travel</p>
                                    <p>A company registered in England and Wales with the company number 03902313</p>
                                </div>
                            </li>
                            <li class="row">
                                <a href="http://www.getyourguide.com/bravo-indochina-tour-s3531/">
                                <div class="col-xs-4">
                                    <img class="img-responsive" src="/frontend/images/footer/getyourguide.png" alt="Responsible Travel" />
                                </div>
                                <div class="col-xs-8 no-padding-left">
                                    <p>GetYourGuide</p>
                                    <p> From its founding in 2008, GetYourGuide has grown to be one of the world’s most successful online travel startups.</p>
                                </div>
                                </a>
                            </li>
                            <li class="row">
                                <a href="http://www.viator.com/search/6730">
                                <div class="col-xs-4">
                                    <img class="img-responsive" src="/frontend/images/footer/viator.png" alt="Responsible Travel" />
                                </div>
                                <div class="col-xs-8 no-padding-left">
                                    <p>Viator</p>
                                    <p>Viator is the world's leading resource for researching, finding and booking the best travel experiences worldwide</p>
                                </div>
                                </a>
                            </li>
                             <li class="row">
                                
                                <div class="col-xs-4">
                                    <a href="http://www.viator.com/search/6730">
                                    <img class="img-responsive" src="/frontend/images/footer/tripme_logo.png" alt="Trip.me" />
                                     </a>
                                </div>
                                <div class="col-xs-8 no-padding-left">
                                    <a href="http://www.viator.com/search/6730"><p>Trip.me</p> </a>
                                    <p id="footer-tripme">trip.me is a trusted internet platform where travelers looking for unique experiences can select, 
                                        <span style="display: none">personalize and book trips directly with local agencies all around the world.</span>
                                    </p>
                                </div>
                               
                            </li>
                        </ul>
                    </div>
                    <div class="col-sm-3">
                        <h4>Check out other travelers Bravo us On TripAdvisor</h4>
                        <ul class="list-unstyled" id="bravo-other">
                            <li class="row">
                                <a href="http://www.tripadvisor.com/Attraction_Review-g293925-d7065652-Reviews-Bravo_Indochina_Tours_Day_Tours-Ho_Chi_Minh_City.html">
                                <div class="col-sm-6">
                                    Ho Chi Minh
                                </div>
                                <div class="col-sm-6">
                                    <img src="/frontend/images/footer/tripadvisor.png" alt="Check out other travelers Bravo us On TripAdvisor" />
                                </div>
                                </a>
                            </li>
                            <li class="row">
                                <a href="http://www.tripadvisor.com/Attraction_Review-g293924-d7057241-Reviews-Bravo_Tours_Day_Tours-Hanoi.html">
                                <div class="col-sm-6">
                                    Ha Noi
                                </div>
                                <div class="col-sm-6">
                                    <img src="/frontend/images/footer/tripadvisor.png" alt="Check out other travelers Bravo us On TripAdvisor" />
                                </div>
                                </a>
                            </li>
                            <li class="row">
                                <div class="col-sm-6">
                                    Vientiane
                                </div>
                                <div class="col-sm-6">
                                    <img src="/frontend/images/footer/tripadvisor.png" alt="Check out other travelers Bravo us On TripAdvisor" />
                                </div>
                            </li>
                        </ul>
                        <h4>Cheap & Fun Vietnam</h4>
                        <ul class="list-unstyled" style="margin-left: 0;padding-left: 0">
                            <li class="row">
                                <div class="col-sm-12">
                                    <a href="{{Request::root()}}/tours/vietnam-tours/budget-travel">
                                        <img class="img-responsive" src="/frontend/images/footer/budgettravel.png" 
                                             alt="Cheap & Fun Vietnam" />
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="col-sm-3">
                        <h4>Check out travellers Bravo us on Google & Facebook</h4>
                        <ul class="list-unstyled" id="social-votes">
                            <li>
                                <div class="footer-social-logo">
                                    <img class="img-responsive" src="/frontend/images/footer/google_star.png" alt="Google Vote" />
                                </div>
                                <p>
                                    Bravo Indochina Tours is rated 5/5 from client reviews
                                </p>
                                <div class="footer-social-logo">
                                    <a href="http://plus.google.com/+Bravoindochinatour-BIT/reviews">
                                    <img width="130px" class="img-responsive" src="/frontend/images/footer/google.jpg" alt="Google Vote" />
                                    </a>
                                </div>
                            </li>
                            <li style="margin-bottom: 0">
                                <p>
                                    Bravo Indochina Tours is rated 5/5  from client reviews
                                </p>
                                <div class="footer-social-logo" style="padding-bottom: 0">
                                    <a href="http://facebook.com/bravoindochinatour">
                                        <img width="130px" class="img-responsive" src="/frontend/images/footer/facebook.png" alt="Facebook Vote" />
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="col-sm-3" id="bravo-contact">
                        <div class="row">
                            <div class="col-xs-2">
                                <img src="/frontend/images/footer/phone.png" alt="phone" />
                            </div>
                            <div class="col-xs-10">
                                <h5>Chat with us</h5>
                                <p>Tel/Fax:   +84-8-2299011</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-2">
                                <img src="/frontend/images/footer/email.png" alt="phone" />
                            </div>
                            <div class="col-xs-10">
                                <h5>Send us an Email</h5>
                                <p><a href="mailto:support@bravoindochinatour.com">support@bravoindochinatour.com</a></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-2">
                                <img src="/frontend/images/footer/user.png" alt="phone" />
                            </div>
                            <div class="col-xs-10">
                                <h5>Office Hours</h5>
                                <p>Monday to Friday: 9am - 5pm (UTC/GMT +7)</p>
                            </div>
                        </div>
                        <div id="intro-socials">
                            <ul class="list-unstyled list-inline pull-right">
                                <li><a href="https://facebook.com/bravoindochinatour"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="https://www.linkedin.com/company/bravo-indochina-tours"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="https://plus.google.com/+bravoindochina"><i class="fa fa-google-plus"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <hr class="divider" />
                <div id="copyright">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-5 col-sm-offset-3" style="line-height: 45px">
                                Copyright &copy; 2014 Bravo Tours Co.,Ltd. All rights reserved</div>
                            <div class="col-sm-4">
                                 <ul class="list-unstyled list-inline pull-right" id="bravo-member">
                                    <li><img src="/frontend/images/footer/pata.png" alt="Bravo Pata" /></li>
                                    <li><img src="/frontend/images/footer/skal.png" alt="Bravo Skal" /></li>
                                    <li><img src="/frontend/images/footer/iata.png" alt="Bravo Asta" /></li>
                                    <li><img src="/frontend/images/footer/asta.png" alt="Bravo Asta" /></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <?php
            $ignoredQickLinkActions = ['AlbumController@index','AlbumController@download',
                    'AlbumController@area','AlbumController@show'
                ];
            $action = Route::currentRouteAction();
            if(!in_array($action,$ignoredQickLinkActions)):
        ?>
        <a id="quick-contact-form" class="clearfix" href="{{route('travel_album')}}">
            <i class="" id="toggle-quick-contact-form"></i>
        </a>
        <?php endif ?>
        <div itemscope="itemscope" itemtype="http://schema.org/LocalBusiness" style="display:none">
			<span itemprop="name">Bravo Indochina Tours</span>
			<div itemprop="address" itemscope="itemscope" itemtype="http://schema.org/PostalAddress">
				<span itemprop="streetAddress">15751 Brookhurst St, Suite 203 Westminster</span>
				<span itemprop="addressLocality">California</span>,
				<span itemprop="addressRegion">CA</span>
				<span itemprop="postalCode">92683</span>
				<span itemprop="addressCountry">US</span>
			</div>
			Phone: <span itemprop="telephone">(714) 765-9999</span>
			Website: <a itemprop="URL">http://www.bravoindochinatour.com/</a>
		</div> 
        <div class="modal fade" id="booking-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h2 class="modal-title" style="font-size:25px;text-align: center;text-transform: uppercase;font-weight: bold" id="myModalLabel">Send us an Enquiry</h2>
                    </div>
                    <?php echo Former::open(route('tour.enquiry'))->novalidate(false) ;?>
                    {{Former::framework('Nude')}}
                    <div class="modal-body">
                        <div id='booking-modal-content' class='row clearfix'>
                            <div  class='col-sm-10 col-sm-offset-1'>
                                <input type="hidden" value="" id='booking-tour-id' name='tour_id' />
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Your name(*)</label>
                                    {{
                                        Former::text('customer_name')->label(false)
                                        ->class("form-control")
                                        ->requried('required')
                                        ->placeholder('Enter your name')
                                    }}
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Your email(*)</label>
                                    {{
                                        Former::text('customer_email')->label(false)
                                        ->class("form-control")
                                        ->requried('required')
                                        ->placeholder('Enter your email address')
                                    }}
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Phone number</label>
                                    {{
                                        Former::text('customer_phone')->label(false)
                                        ->class("form-control")
                                        ->placeholder('Enter your phone number')
                                    }}
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Travel date</label>
                                    {{
                                        Former::text('start_date')->label(false)
                                        ->class("form-control datepicker")
                                        ->requried('required')
                                        ->placeholder('Enter your travel date')
                                    }}
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">How many traveling ? (*)</label>
                                    {{
                                        Former::text('traveling')->label(false)
                                        ->class("form-control")
                                        ->requried('required')
                                        ->placeholder('Enter your number of  traveling')
                                    }}
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">For the tours I booked, please pick me up at the following hotel (adress, room number, phone ) or airport (flight number, arrival time)</label>
                                    <textarea name='pick_off' class="form-control" placeholder=" " style="min-height: 120px"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1"> Please leave any additional comments here.</label>
                                    <textarea name='message' class="form-control" placeholder="" style="min-height: 120px"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Send now</button>  
                        <button style="display:none"  type="submit" name='payment' class="btn btn-primary">
                            <img style="width: 18px" src="/frontend/images/paypal.png" alt='Paypal' />
                            Pay with Paypal</button> 
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                    <?php echo Former::close(); ?>
                </div>
            </div>
        </div>
        <div class="modal fade" id="booking-success" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h3>Your enquiry has been sent successful.</h3>
                    </div>
                    <div class="modal-body" style="padding: 0">
                        <div id='success-modal-content' style="margin-top:20px">
                            <div role="alert" class="alert alert-success">
                                <strong>Well done!</strong> Your booking request has been sent. We will contact with you in 2 hours.
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer" style="margin: 0">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="thanks-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h3>We have received your enquiry and one of our travel consultant will reply within 24 hours.</h3>
                    </div>
                    <div class="modal-body" style="padding: 0">
                        <div style="margin-top:20px;padding-left: 20px;padding-right: 20px">
                            <div class="row">
                                <div class="col-xs-4">
                                     <img style="max-width: 100%" alt="Bravo Indochina Tour logo" class="img-responsive" src="{{ URL::asset('/') }}frontend/images/page/main_logov2.jpg">
                                </div>
                                <div class="col-xs-8">
                                    <div id="thanks-modal-content">
                                        <p style="font-style: italic;font-size: .9em">
                                            If you have not received a reply within 1 working day, please email to 
                                            support@bravoindochinatour.com who will investigate the case. To ensure that you can receive a reply from Bravo Indochina, add the "www.bravoindochinatour.com" domain to your e-mail "safe list". If you do not receive a response please check your "bulk mail" or "junk mail" folders.
                                        </p>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <img src="{{Request::root()}}/frontend/images/thanks.png" style="height: 50px;position: relative;top:-15px" class="pull-right" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer" style="margin: 0">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="make-payment" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h3>Your enquiry has been sent successful. Please make a payment.</h3>
                    </div>
                    <div class="modal-body" style="padding: 0">
                        <div id='payment-modal-content' style="margin:30px 0px">
                            <form style="margin:auto;width:100px" action="https://www.paypal.com/cgi-bin/webscr" method="post">
                            <input type="hidden" name="cmd" value="_cart">
                            <input type="hidden" name="business" value="support@bravoindochinatour.com">
                            <input type="hidden" name="item_name" value="hat">
                            <input type="hidden" name="item_number" value="123">
                            <input type="hidden" name="amount" value="15.00">
                            <input type="hidden" name="first_name" value="Bravo">
                            <input type="hidden" name="last_name" value="Indochinatour">
                            <input type="hidden" name="address1" value="Ho Chi Minh">
                            <input type="hidden" name="address2" value="Ho Chi Minh">
                            <input type="hidden" name="city" value="Ho Chi Minh">
                            <input type="hidden" name="state" value="VN">
                            <input type="image" name="submit" border="0"
                            src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif"
                            alt="PayPal - The safer, easier way to pay online">
                            </form>
                        </div>
                    </div>
                    <div class="modal-footer" style="margin: 0">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modal-login" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Login</h4>
              </div>
              <div class="modal-body">
                <div class="row">
                {{ Former::open(route('login'))->id('form-login') }}
                    <div class="row">
                        <div class="col-sm-12 form-messages"></div>
                    </div>                
                    <div class="form-group">
                        <div class="col-sm-12">
                            <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
                              <input type="text" name="email" class="form-control" placeholder="Email">
                            </div>   
                        </div>   
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-key"></i></span>
                              <input type="password" name="password" class="form-control" placeholder="Password">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <button type="Submit" class="btn btn-primary btn-block">Login</button>
                            <br>
                            <p class="text-center">
                                Don't have a account? <a href="#modal-register" data-toggle='modal'>Register</a>
                                |
                                <a href="#">Forgot password?</a> 
                            </p>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <div class="col-sm-6 col-xs-6">
                            <a href="{{route('facebook_auth', ['back_url' => Request::url()])}}" class="btn btn-block btn-primary">
                                <i class="fa fa-facebook-square"></i> Facebook
                            </a>
                        </div>

                        <div class="col-sm-6 col-xs-6">
                            <a href="{{route('google_auth', ['back_url' => Request::url()])}}" class="btn btn-block btn-danger"><i class="fa fa-google-plus-square"></i> Google +</a>
                        </div>
                    </div>
                {{ Former::close() }}
                </div>
              </div>
            </div>
          </div>
        </div>     
        <!-- End modal login    -->
        <div class="modal fade" id="modal-register" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">Register</h4>
              </div>
              <div class="row">
              {{ Former::open(route('customer_register'))->id('form-register') }}
              <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12 form-messages"></div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-user"></i></span>
                              <input type="text" name='name' class="form-control" placeholder="Your Name">
                            </div>   
                        </div>   
                    </div>                
                    <div class="form-group">
                        <div class="col-sm-12">
                            <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
                              <input type="text" name='email' class="form-control" placeholder="Email">
                            </div>   
                        </div>   
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-key"></i></span>
                              <input type="password" name="password" class="form-control" placeholder="Password">
                            </div>
                        </div>
                    </div>                    
                    <div class="form-group">
                        <div class="col-sm-12">
                            <button type="Submit" class="btn btn-primary btn-block">Register</button>
                            <br/>
                            <p class="text-center">
                                Already have account? <a href="#modal-login" data-toggle='modal'>Login</a>
                            </p>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <div class="col-sm-6 col-xs-6">
                            <a href="{{route('facebook_auth', ['back_url' => Request::url()])}}" class="btn btn-block btn-primary">
                                <i class="fa fa-facebook-square"></i> Facebook
                            </a>
                        </div>

                        <div class="col-sm-6 col-xs-6">
                            <a href="{{route('google_auth', ['back_url' => Request::url()])}}" class="btn btn-block btn-danger"><i class="fa fa-google-plus-square"></i> Google +</a>
                        </div>
                    </div>
              </div>
              {{ Former::close() }}
              </div>
            </div>
          </div>
        </div> 
        <!-- End modal register -->

        {{ Minify::javascript(array(
               '/shared/bootstrap/3.0.0/js/bootstrap.js',
               '/frontend/js/layout.js',
               '/plugins/bootstrap-select/bootstrap-select.js',
               '/plugins/icheck/icheck.js',
               '/plugins/screwdefaultbuttons/jquery.screwdefaultbuttonsV2.min.js',
               '/plugins/bootstrap-datepicker/bootstrap-datepicker.js',
               '/plugins/jquery.validate.js',
               '/plugins/bootbox.js',
               '/plugins/justifiedgallery/justifiedgallery.js',
               '/plugins/photor/photor.js',
               '/plugins/galleria/galleria-1.4.2.js',
               '/plugins/jquery-print/jquery.printPage.js',
         )) }}
        {{ 
            Minify::javascript(array(
               '/backend/js/helper.js',
               '/frontend/js/functions.js',
               '/frontend/js/layout.js'
            ))
        }}
       
        @if(Session::has('booking_success'))
        <script>
            $('#thanks-modal').modal('show');
        </script>
        @endif
        @if(Session::has('booking_error'))
        <script>
            $('#booking-modal').modal('show');
        </script>
        @endif
        @if(Session::has('thanks'))
        <script>
           // $('#thanks-modal-content').html( {{Session::get('thanks')}});
            $('#thanks-modal').modal('show');
            function changeCurrency(type){
                
            }
           
        </script>
        @endif
        <script> 
            $('#footer-tripme').on('click',function(){
                $(this).find('span').slideToggle();
            });
        </script>
        @yield('addon_js')

        @yield('inline_scripts')
    </body>
</html>
