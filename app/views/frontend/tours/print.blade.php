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
            #map {
                width:100%;height: 270px;border:1px solid #ccc
            }
            #print-page-wrapper {
                border:3px dotted #146070;
                padding:10px
            }
            .tour-detail-day {
                background: none repeat scroll 0 0 #146abd;
                color: #eab640;
                display: inline-block;
                font-size: 0.7em;
                text-align: center;
              }
        </style>
        
        {{HTML::script('/shared/js/jquery-2.0.3.min.js')}}
        
        {{ Minify::javascript(array(
               '/shared/bootstrap/3.0.0/js/bootstrap.js',
               '/plugins/jquery-print/jquery.printPage.js',
         )) }}
        <script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script>
    </head>
    <body>
        <div class="container">
                <div class="row">
                    <div class="col-sm-10 col-sm-offset-1">
                        <img id="scissors" src="{{Request::root()}}/frontend/images/scissors.png" alt="{{$tour->name}}" />           
                        <div id="print-page-wrapper">
                            <div class="row">
                            <div class="col-sm-2">
                                <a style="padding: 0" href="#" class="navbar-brand pull-right">
                                    <img style="width: 100%" alt="Bravo Indochina Tour logo" class="img-responsive" src="{{ URL::asset('/') }}frontend/images/page/main_logov2.jpg">
                                    <span class="sr-only">Bravo Tour Since 2009</span>
                                </a>
                            </div>
                            <div  style="text-align:center" class="col-sm-3 col-sm-offset-7">
                                <img  style="width:150px;margin:auto;"  src="{{Request::root()}}/frontend/images/barcode.png" alt="{{$tour->name}}" />
                                <p style="text-align:center">{{$tour->code}}</p>
                            </div>
                            </div>
                            <hr style="margin-top:25px;" class="divider" />
                            <div id="print-tour-content">
                                <h1>{{$tour->name}}</h1>
                                <div id="map"></div>
                            </div>
                            <div class="row" style="margin-top:10px">
                                <div class="col-sm-7">
                                    <p><b>Duration : {{$tour->duration}}  days</b></p>
                                    <p><b> Tour Code: {{$tour->code}}</b></p>
                                    <p><b>Destinations : {{implode(',',$tour->places()->lists('name'))}}</b></p>
                                    <p><b> Great For: <span class="great-for">{{implode(',',$tour->travelStyles->lists('name'))}}</span></b></p>
                                </div>
                                <div class="col-sm-5">
                                    <a class="thumbnail" href="#">
                                        <img  src="{{$tour->thumbnailURL()}}" alt="{{$tour->name}}" class="img-responsive" />
                                    </a>
                                </div>
                            </div>
                            <div id="print-tour-pricing" style="margin-top: 20px;margin-bottom: 20px;padding: 20px;background: #e0eff6">
                                <p>
                                    {{$tour->include}}
                                </p>
                                <p>
                                    {{$tour->not_include}}
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
                            
                        </div>
                    </div>
                </div>
        </div>
        <script type="text/javascript">
            var locations = {{json_encode($locations)}};
            var map = new google.maps.Map(document.getElementById('map'), {
              zoom: 6,
              center: new google.maps.LatLng(locations[0][1], locations[0][2]),
              mapTypeId: google.maps.MapTypeId.ROADMAP
            });

            var infowindow = new google.maps.InfoWindow();

            var marker, i;

            for (i = 0; i < locations.length; i++) {  
              marker = new google.maps.Marker({
                position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                map: map,
                icon: "/frontend/images/common/map.png"
              });

              google.maps.event.addListener(marker, 'click', (function(marker, i) {
                return function() {
                  infowindow.setContent(locations[i][0]);
                  infowindow.open(map, marker);
                }
              })(marker, i));
            }
          </script>
    </body>
</html>