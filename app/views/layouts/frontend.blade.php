<!DOCTYPE html>
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="css/bootstrap.min.css"/>
        <link rel="stylesheet" href="css/fonts.css"/>
        <link rel="stylesheet" href="css/site.css"/>
        <link rel="stylesheet" href="css/media.css"/>
        <link rel="stylesheet" href="plugins/bootstrap-select/bootstrap-select.min.css" />
        <link rel="stylesheet" href="plugins/icheck/skins/all.css" />
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
                            <img src="images/page/main_logo.png" alt="Bravo Tour" />
                            <span class="sr-only">Bravo Tour Since 2009</span>
                        </a>
                    </div>
                    <div class="navbar-collapse collapse" id="main-nav">
                        <ul class="nav navbar-nav pull-right">
                          <li class="active"><a href="#">Home</a></li>
                          <li><a href="#about">About</a></li>
                          <li><a href="#contact">Contact</a></li>
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
                            <li><a href="#">Indochina</a></li>
                            <li><a href="#">Vietnam</a></li>
                            <li><a href="#">Kampot</a></li>
                            <li><a href="#">Lao</a></li>
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
                                <img src="images/page/virtual_tourist.png" class="img-responsive" />
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <p>Checkout what other travelers <br/>Bravo us On TripAdvisor</p>
                        <div>
                             <a href="#">
                                 <img src="images/page/tripadvisor.png" class="img-responsive" />
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-3">
                         <p>Checkout what our client said <br/> &nbsp;</p>
                        <div>
                             <a href="#">
                                 <img src="images/page/review_cente.png" class="img-responsive" />
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
        <script src="{{Request::root()}}/js/jquery-2.0.3.min.js"></script>
        <script src="{{Request::root()}}/js/bootstrap.min.js"></script>
        <script src="{{Request::root()}}/plugins/bootstrap-select/bootstrap-select.min.js"></script>
        <script src="{{Request::root()}}/plugins/icheck/icheck.min.js"></script>
        <script src="{{Request::root()}}/plugins/screwdefaultbuttons/jquery.screwdefaultbuttonsV2.min.js"></script>
        <script src="{{Request::root()}}/js/layout.js"></script>
        <script src="{{Request::root()}}/js/functions.js"></script>
        @yield('addon_js')
        
        @yield('inline_scripts')
    </body>
</html>
