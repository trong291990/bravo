<!DOCTYPE html>
<html>
    <head>
        <title>Bravo Indochina Tour @yield('title')</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        <meta name="keyword" content="@yield('keyword')" />
        <meta name="description" content="@yield('description')" />
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic' rel='stylesheet' type='text/css'>
        {{ HTML::style('/shared/css/bootstrap.min.css') }}
        {{ HTML::style('/fonts/font-awesome.min.css') }}
        {{ HTML::style('/fonts/augushand.css') }}
        {{ HTML::style('/frontend/css/site.css') }}
        {{ HTML::style('/frontend/css/media.css') }}
        {{ HTML::style('/plugins/bootstrap-select/bootstrap-select.min.css') }}
        {{ HTML::style('/plugins/icheck/skins/all.css') }}
        {{ HTML::style('/plugins/html5wysiwyg/bootstrap-wysihtml5-0.0.2.css') }}
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
         @yield('addon_stylesheets')
    </head>
    <body>
        <div id="header">
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
                            <img class="img-responsive" src="{{ URL::asset('/') }}images/page/main_logov2.jpg">
                            <span class="sr-only">Bravo Tour Since 2009</span>
                        </a>
                    </div>
                    <div class="navbar-collapse collapse" id="main-nav">
                        <ul class="nav navbar-nav pull-right">
                          <li class="active"><a href="{{Request::root()}}">Home</a></li>
                          <li><a href="{{Request::root()}}/about-us">About</a></li>
                          <li><a href="{{Request::root()}}/contact">Contact</a></li>
                          <li>
                              <form id="search-form">
                                  <input type="text" placeholder="Search" />
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
                        <p>Customize your ecuador trip </p>
                        <p class="small">3 steps to a free <span class="underline">custom itinerary</span></p>
                        <div class="clearfix"><a class="btn btn-default btn-flat pull-right" href="#">Start now</a></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            @yield('content')
            <div id="footer" class="row">
                <div class="col-sm-8  clearfix" id="footer-left">
                    <div class="col-sm-3 no-padding-left">
                        <p>What other travel Bravo Us <br/> &nbsp;</p>
                        <div>
                            <a href="#">
                                <img class="img-responsive" src="{{ URL::asset('/') }}images/page/virtual_tourist.png">
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <p>Checkout what other travelers <br/>Bravo us On TripAdvisor</p>
                        <div>
                             <a href="#">
                                 <img class="img-responsive" src="{{ URL::asset('/') }}images/page/tripadvisor.png">
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-3">
                         <p>Checkout what our client said <br/> &nbsp;</p>
                        <div>
                             <a href="#">
                                 <img class="img-responsive" src="{{ URL::asset('/') }}images/page/review_cente.png">
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-3 no-padding-right">
                        <p>Contact us for reservations and questions 19001578 </p>
                        <div id="intro-socials">
                            <ul class="list-unstyled list-inline">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div id="enewsletter-sign-up">
                        <h3>ENEWSLETTER SIGN UP</h3>
                        <form>
                            <input type="text" />
                            <button type="submit" class="btn btn-warning"> SIGN UP</button>
                        </form>
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
        {{ HTML::script('/plugins/html5wysiwyg/jbootstrap-wysihtml5-0.0.2.min.js') }}
        {{ HTML::script('/plugins/html5wysiwyg/wysihtml5-0.3.0.min.js') }}
        {{ HTML::script('/frontend/js/functions.js') }}       
        @yield('addon_js')
        
        @yield('inline_scripts')
    </body>
</html>
