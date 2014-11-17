<!DOCTYPE html>
<html>
    <head>
        <title>Private Tours & Holidays in Indochina | Bravo Indochina Tours</title>
        <meta charset="UTF-8">
        <meta name="keyword" content="Indochina Tours, Indochina Travel, Indochina Holidays, Bravo Indochina Tour, Bravo Indochina Tours, Bravo Tours"/>
        <meta name="description" content="Bravo Indochina Tours are the  leading experts in private tours and tailor-made holidays to Indochina including Vietnam, Laos, Cambodia. Your best choice for Indochina Travel"/>
        <meta name="viewport" content="width=device-width">
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic' rel='stylesheet' type='text/css'>
        {{ Minify::stylesheet( array(
                        '/shared/css/bootstrap.css',
                        '/fonts/font-awesome.css',
                        '/fonts/augushand.css',
                        '/frontend/css/site.css',
                        '/plugins/bootstrap-select/bootstrap-select.min.css',
                        '/plugins/bootstrap-datepicker/bootstrap-datepicker3.css',
                        '/plugins/icheck/skins/all.css'
                    )
            ) 
        }}
        {{HTML::style( '/frontend/css/media.css')}}
    </head>
    <body>
        <div id="intro_wrapper">
            <div class="container">
                <div id="intro_wrapper_cell">
                    <div id="intro">
                        <div id="intro-header-wrapper">
                            <div id="intro-header">
                                <h1>YOUR BEST CHOICE FOR INDOCHINA </h1>
                                <p class="sub">Truly Unique, Flexible Itineraries, Affordable Price</p>
                            </div>
                        </div>
                        <div id="intro-logo" class="col-sm-12">
                                <a href="#">
                                    <img alt="Bravo Tour" src="{{Request::root()}}/frontend/images/page/logo.png" alt="BRAVO TOUR" class="img-responsive" />
                                    <span class="sr-only">BRAVO TOUR</span>
                                </a>
                        </div>
                        <div class="country-nav" id="intro-country-nav">
                            <ul class="list-unstyled list-inline">
                                <li><a href="{{Request::root()}}/tours/indochina-tours">Indochina</a></li>
                                <li><a href="{{Request::root()}}/tours/vietnam-tours">Vietnam</a></li>
                                <li><a href="{{Request::root()}}/tours/cambodia-tours">Cambodia</a></li>
                                <li><a href="{{Request::root()}}/tours/laos-tours">Lao</a></li>
                                <li><a href="{{Request::root()}}/tours/thai-tours">Thailand</a></li>
                            </ul>
                        </div>
                        <div class="row" id="intro-description">
                            <div class="col-sm-9 clearfix">
                                <p id="intro-des-text">
                                    Since tailor-made private touring is fundamentally different from group tours, Bravo Indochina Tours was born focusing on the needs of individual travellers who seeks a real experience of Indochina including Vietnam, Laos, Cambodia. and to show that the itineraries we create can be truly unique and flexible. 
                                
                                </p>
                                <p id="intro-des-readmore" class="pull-right"><a href="{{Request::root()}}/about-us">Read more</a></p>
                            </div>
                            <div class="col-sm-3">
                                <img src="{{Request::root()}}/frontend/images/page/bravo_us.png" alt="Bravo us" class="img-responsive" />
                            </div>
                        </div>
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
            </div>
        </div>
        {{ Minify::javascript(array(
               '/shared/js/jquery-2.0.3.min.js',
               '/shared/js/bootstrap.min.js',
               '/frontend/js/layout.js'
         )) }}        
</html>


