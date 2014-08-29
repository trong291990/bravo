<!DOCTYPE html>
<html>
    <head>
        <title>Bravo Indochina Tour</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic' rel='stylesheet' type='text/css'>
        {{ HTML::style('/shared/css/bootstrap.min.css') }}
        {{ HTML::style('/fonts/font-awesome.min.css') }}
        {{ HTML::style('/fonts/augushand.css') }}
        {{ HTML::style('/frontend/css/site.css') }}
        {{ HTML::style('/frontend/css/media.css') }}
        {{ HTML::style('/plugins/bootstrap-select/bootstrap-select.min.css') }}
        {{ HTML::style('/plugins/icheck/skins/all.css') }}
        
        {{ HTML::script('/shared/js/jquery-2.0.3.min.js') }}
        {{ HTML::script('/shared/js/bootstrap.min.js') }}
        {{ HTML::script('/frontend/js/layout.js') }} 
        {{ HTML::script('/frontend/js/functions.js') }}  
    </head>
    <body>
        <div id="intro_wrapper">
            <div class="container">
                <div id="intro_wrapper_cell">
                    <div id="intro">
                        <div id="intro-header-wrapper">
                            <div id="intro-header">
                                <h1>A BRAND UNDER VIETNAMTOURISM</h1>
                                <p class="sub">Management</p>
                            </div>
                        </div>
                        <div id="intro-logo" class="col-sm-12">
                                <a href="#">
                                    <img src="images/page/logo.png" alt="BRAVO TOUR" class="img-responsive" />
                                    <span class="sr-only">BRAVO TOUR</span>
                                </a>
                        </div>
                        <div class="country-nav" id="intro-country-nav">
                            <ul class="list-unstyled list-inline">
                                <li><a href="{{Request::root()}}/tours/indochina-tours">Indochina</a></li>
                                <li><a href="{{Request::root()}}/tours/vietnam-tours">Vietnam</a></li>
                                <li><a href="{{Request::root()}}/tours/cambodia-tours">Cambodia</a></li>
                                <li><a href="{{Request::root()}}/tours/laos-tours">Lao</a></li>
                            </ul>
                        </div>
                        <div class="row" id="intro-description">
                            <div class="col-sm-9 clearfix">
                                <p id="intro-des-text">
                                    Since tailor-made private touring is fundamentally different from group tours, Bravo Indochina Tours was born focusing on the needs of individual travellers who seeks a real experience of Indochina including Vietnam, Laos, Cambodia. and to show that the itineraries we create can be truly unique and flexible. Founded in early 2013 Bravo Indochina Tours, the tailor-made travel service by Vietnamtourism has been developing rapidly and established good brand image among travellers worldwide.
                                </p>
                                <p id="intro-des-readmore" class="pull-right"><a href="#">Read more</a></p>
                            </div>
                            <div class="col-sm-3">
                                <img src="{{Request::root()}}/frontend/images/page/bravo_us.png" alt="Bravo us" class="img-responsive" />
                            </div>
                        </div>
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
            </div>
        </div>
</html>


