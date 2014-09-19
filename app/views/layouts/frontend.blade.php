<!DOCTYPE html>
<html>
    <head>
        <title>@yield('title')</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        <meta name="keyword" content="@yield('keyword')" />
        <meta name="description" content="@yield('description')"/>
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic' rel='stylesheet' type='text/css'>
        {{ HTML::style('/shared/css/bootstrap.min.css') }}
        {{ HTML::style('/fonts/font-awesome.min.css') }}
        {{ HTML::style('/fonts/augushand.css') }}
        {{ HTML::style('/frontend/css/site.css') }}
        {{ HTML::style('/frontend/css/media.css') }}
        {{ HTML::style('/plugins/bootstrap-select/bootstrap-select.min.css') }}
        {{ HTML::style('/plugins/bootstrap-datepicker/bootstrap-datepicker3.css') }}
        {{ HTML::style('/plugins/icheck/skins/all.css') }}
        {{ HTML::style('/plugins/html5wysiwyg/bootstrap-wysihtml5-0.0.2.css') }}
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
        @yield('addon_stylesheets')
    </head>
    <body>
        <div id="header" @yield('area_class')>
             <div role="navigation" class="navbar navbar-default" id="main-nav-warrper" >
                <div class="container">
                    <div class="navbar-header">
                        <button data-target="#main-nav" data-toggle="collapse" class="navbar-toggle" type="button">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a href="#" class="navbar-brand" id="main-logo">
                            <img class="img-responsive" src="{{ URL::asset('/') }}frontend/images/page/main_logov2.jpg">
                            <span class="sr-only">Bravo Tour Since 2009</span>
                        </a>
                    </div>
                    <div class="navbar-collapse collapse" id="main-nav">
                        <ul class="nav navbar-nav pull-right">
                            <li class="active"><a href="{{Request::root()}}">Home</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">About Us <span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="{{route('why_travel_with_us')}}">Why travel with us</a></li>
                                    <li><a href="{{route('terms_and_condition')}}">Term & Condition</a></li>
                                    <li><a href="{{route('faq')}}">FAQ</a></li>
                                    <li><a href="{{route('join_our_team')}}">Join Our Team</a></li>
                                    <li><a href="{{route('travel_album')}}">Travel Album</a></li>
                                    <li><a href="{{route('responsible_policy')}}">Responsible Policy</a></li>
                                    <li><a href="{{route('about_us')}}">About Us</a></li>
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
        <div class="container">
            @yield('content')
            @include('frontend.partials.order_book')
            <div id="footer" class="row">
                <div class="col-sm-8  clearfix" id="footer-left">
                    <div class="col-sm-3 no-padding-left">
                        <p>What other travel Bravo Us <br/> &nbsp;</p>
                        <div>
                            <a href="http://www.yelp.com.sg/biz/bravo-indochina-tours-and-travel-singapore">
                                <img class="img-responsive" src="{{ URL::asset('/') }}frontend/images/page/yelp.png">
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <p>Checkout what other travelers <br/>Bravo us On TripAdvisor</p>
                        <div>
                            <a target="_blank" href="http://www.tripadvisor.com/Attraction_Review-g293924-d7057241-Reviews-Bravo_Tours_Day_Tours-Hanoi.html">
                                <img class="img-responsive" src="{{ URL::asset('/') }}frontend/images/page/tripadvisor.png">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-2">
                        <p>Checkout what our client said <br/> &nbsp;</p>
                        <div>
                            <a href="http://www.reviewcentre.com/Tour-Companies/Bravo-Indochina-Tours-www-bravoindochinatour-com-reviews_2826805">
                                <img class="img-responsive" src="{{ URL::asset('/') }}frontend/images/page/review_cente.png">
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
        <div id="quick-contact-form" class="clearfix">
            <div class="toggle">
                <span>
                    <i class="fa fa-envelope"></i>
                </span>
            </div>
            <div class="contact-content">
                {{Former::open('quick-contact')->class('validate')}}
                <div class="form-group">
                    <input type="email" class="form-control" name="email" placeholder="Your email" required="required" />
                </div>
                <div class="form-group">
                    <textarea class="form-control" required="required" placeholder="The message"></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary pull-right" > Send </button>
                </div>
                {{Former::close()}}
            </div>
        </div>
            
        <div class="modal fade" id="booking-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h2 class="modal-title" style="text-align: center" id="myModalLabel">Send us an Enquiry</h2>
                    </div>
                    <?php echo Former::open('/booking') ?>
                    <div class="modal-body">
                        <div id='booking-modal-content' class='row clearfix'>
                            <div  class='col-sm-10 col-sm-offset-1'>
                                <input type="hidden" value="" id='booking-tour-id' name='tour_id' />
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Your name(*)</label>
                                    <input type="text" class="form-control" name='customer_name' required="required"  placeholder="Enter your name">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Your email(*)</label>
                                    <input type="email" name='customer_email' class="form-control" required="required"  placeholder="Enter your email">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Travel date</label>
                                    <input name='start_date' type="text" 
                                           class="form-control datepicker" 
                                           placeholder="Enter your travel date">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">How many traveling ?</label>
                                    <input name='travelling' type="text" 
                                           class="form-control"
                                           placeholder="Enter your number of  traveling">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Message</label>
                                    <textarea name='message' class="form-control" placeholder="Your message" style="min-height: 120px"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Send now</button>   
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
                        <h3>Booking success</h3>
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
                        <h3>Thank you !.</h3>
                    </div>
                    <div class="modal-body" style="padding: 0">
                        <div style="margin-top:20px">
                            <div id="thanks-modal-content" role="alert" class="alert alert-success">
                               
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer" style="margin: 0">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        {{ HTML::script('/shared/js/jquery-2.0.3.min.js') }}
        {{ HTML::script('/shared/js/bootstrap.min.js') }}
        {{ HTML::script('/plugins/bootstrap-select/bootstrap-select.min.js') }}
        {{ HTML::script('/plugins/icheck/icheck.min.js') }}
        {{ HTML::script('/plugins/screwdefaultbuttons/jquery.screwdefaultbuttonsV2.min.js') }}
        {{ HTML::script('/plugins/screwdefaultbuttons/jquery.screwdefaultbuttonsV2.min.js') }}
        {{ HTML::script('/plugins/html5wysiwyg/wysihtml5-0.3.0.min.js') }}
        {{ HTML::script('/plugins/html5wysiwyg/bootstrap-wysihtml5-0.0.2.min.js') }} 
        {{ HTML::script('/plugins/bootstrap-datepicker/bootstrap-datepicker.js') }}
        {{ HTML::script('/plugins/jquery.validate.min.js') }}
        {{ HTML::script('/frontend/js/functions.js') }}
        {{ HTML::script('/frontend/js/layout.js') }}
        @if(Session::has('booking_success'))
        <script>
            $('#booking-success').modal('show');
        </script>
        @endif
        @if(Session::has('thanks'))
        <script>
            $('#thanks-modal-content').html( {{Session::get('thanks')}});
            $('#thanks-modal').modal('show');
        </script>
        @endif
        @yield('addon_js')

        @yield('inline_scripts')
    </body>
</html>
