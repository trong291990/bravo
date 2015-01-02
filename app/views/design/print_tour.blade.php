<!DOCTYPE html>
<html>
    <head>
        <title>{{$tour->name}} | Bravo Indochina Tours</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        <meta name="description" content="{{$tour->meta_description}}"/>
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
                    <div id="print-header" class="row">
                        <div class="col-sm-4">
                            <a href="">Print</a>
                        </div>
                        <div class="col-sm-4">
                            <a href="">Email</a>
                        </div>
                        <div class="col-sm-4">
                            <a href="">Close</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-10">
                            <h1>{{ $tour->area->name}} tour</h1>
                            <p>{{$tour->name}}</p>
                        </div>
                        <div class="col-sm-2">
                            <a style="padding: 0" href="#" class="navbar-brand pull-right">
                                <img style="width: 100%" alt="Bravo Indochina Tour logo" class="img-responsive" src="{{ URL::asset('/') }}frontend/images/page/main_logov2.jpg">
                                <span class="sr-only">Bravo Tour Since 2009</span>
                            </a>
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
                        <?php foreach ($itineraries as $index => $itinerary) : ?>
                        <div class="row">
                            <div class="col-xs-1 no-padding">
                                <div class="tour-detail-day">
                                    Day <br/> <span>{{$index + 1}}</span>
                                </div>
                            </div>
                            <div class="col-xs-11">
                                <h4>{{$itinerary->name}}</h4>
                                <p>
                                    {{$itinerary->detail}}
                                </p>
                                <p>
                                    <?php if ($itinerary->hasAnyMeals()): ?>
                                        <img src="{{asset('frontend/images/page/dinner.png')}}" style="width: 20px" /> 
                                        <?php echo $itinerary->mealsInString() ?>   
                                    <?php endif; ?>
                                    &nbsp;
                                    &nbsp;
                                    <i class="fa fa-building"></i> {{$itinerary->hotel}}
                                </p>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    <div id="print-tour-pricing">
                        <h2>Pricing</h2>
                        <p>
                            {{$tour->include}}
                        </p>
                        <p>
                            {{$tour->not_include}}
                        </p>
                    </div>
                    <br/><br/><br/>
                </div>
            </div>
        </div>
    </body>
</html>