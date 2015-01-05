<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        <meta name="keywords" content="" />
        <meta name="description" content=""/>
        {{ Minify::stylesheet( array(
                        '/shared/css/bootstrap.css',
                        '/fonts/font-awesome.css',
                        '/fonts/augushand.css'
                    )
            ) 
        }}
        <style type="text/css">
            #print-header {
                background: #006EBF;
                margin-bottom: 20px;
                text-align: center;
                padding-top:15px;
                padding-bottom: 15px;
            }
            #print-header a {
                color: #fff;
                font-size: 1.3em;
                text-decoration: none
            }
            #print-header .col-sm-4:not(:last-child){
                border-right: 1px dotted #fff;
            }
        </style>
        {{HTML::script('/shared/js/jquery-2.0.3.min.js')}}
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2">
                    <div class="row">
                        <div class="col-sm-2">
                            <a style="padding: 0" href="#" class="navbar-brand pull-right">
                                <img style="width: 100%" alt="Bravo Indochina Tour logo" class="img-responsive" src="{{ URL::asset('/') }}frontend/images/page/main_logov2.jpg">
                                <span class="sr-only">Bravo Tour Since 2009</span>
                            </a>
                        </div>
                        <div class="col-sm-3 col-sm-offset-7">
                            <img src="{{route}}"
                        </div>
                    </div>
                    <hr class="divider" />
                    <div id="print-tour-content">
                        <img src="http://bravoindochinatour.com/uploads/tours/26/halong-bay-tour.jpg" class="img-responsive" alt="" />
                        <br/>
                        <p>
                          This full-day tour which departs from Hanoi is also available based from Ha Long, and will take you on a cruise among the awesome and bizarre limestone formations of Ha Long Bay - See more at: http://bravoindochinatour.com/tours/vietnam-tours/halong-bay---a-unesco-world-heritage-site#sthash.QdEqcxgy.dpuf
                        </p>
                    </div>
                    <div id="print-tour-itinerary">
                        <h2>Itinerary</h2>
                        <h3>Day 1</h3>
                        <p>
                            This full-day tour which departs from Hanoi is also available based from Ha Long, and will take you on a cruise among the awesome and bizarre limestone formations of Ha Long Bay - See more at: http://bravoindochinatour.com/tours/vietnam-tours/halong-bay---a-unesco-world-heritage-site#sthash.QdEqcxgy.dpuf
                        </p>
                    </div>
                    <div id="print-tour-pricing">
                        <h2>Pricing</h2>
                        <p>
                            </p><div><b>ALWAYS INCLUDED IN THE PACKAGES</b></div><div><b>Accomodation </b>(Not Included for Day Tour)</div><div>We've carefully screened and selected the right hotels in the heart of the destination and you can choose your accommodations to match with your style and budget. Hotels are convenient for shopping and sightseeing.</div><div><b>Transportation Made Easy</b></div><div>Whether it's flight arrangements, transfers from the airport to your hotel, sightseeing, or traveling between cities, we can take care of your transportation needs and can include it in your package price.</div><div><b>Sightseeing and Activities</b></div><div>Packages feature sightseeing and orientation in each city, so you don't miss the must-see sights. You can also personalize your trip by adding more activities and excursions that will make your vacation…exclusively yours.</div><div><b>Local Guide Service</b></div><div>Throughout your vacation, we provide you with a friendly, knowledgeable insider in each destination to offer hints and recommendations, steer you off the beaten path, and help you maximize every moment of your time.</div><div><b>Meals Included</b></div><div>Start your day off with an included breakfast. For lunch and dinner, immerse yourself in the local culture by sampling regional cuisine. After all, one of the best ways to learn about other cultures is to eat like the locals.</div>                        <p></p>
                        <p>
                        </p>
                    </div>
                    <br/><br/><br/>
                </div>
            </div>
        </div>
    </body>
</html>