<!DOCTYPE html>
<html>
    <head>
        <title>{{$tour->name}}</title>
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
                font-size: 0.9em;
                text-align: center;
                padding:10px
              }
              h1 {
                  font-size: 18px;
                   font-weight: bold
              }
              h2,h3 {
                  font-size: 14px;
                  font-weight: bold
              }
              footer ,footer a {
                  color: #fff;
              }
              .l-h4 {
                  font-size: 18px !important;
                  font-weight: bold !important
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
                <div class="cleafix">
                    <div style="width: 190mm;margin:auto">
                        <img id="scissors" src="{{Request::root()}}/frontend/images/scissors.png" alt="{{$tour->name}}" />           
                        <div id="print-page-wrapper">
                            <div class="row">
                            <div class="col-xs-3">
                                <a style="padding: 0" href="#" class="">
                                    <img style="width:140px;max-width: 100%" alt="Bravo Indochina Tour logo" class="img-responsive" src="{{ URL::asset('/') }}frontend/images/page/main_logov2.jpg">
                                    <span class="sr-only">Bravo Tour Since 2009</span>
                                </a>
                            </div>
                            <div  style="text-align:center" class="col-xs-3 col-xs-offset-6">
                                <img  style="width:150px;margin:auto;max-width: 100%"  src="{{Request::root()}}/frontend/images/barcode.png" alt="{{$tour->name}}" />
                                <p style="text-align:center">{{$tour->code}}</p>
                            </div>
                            </div>
                            <hr style="margin-top:25px;" class="divider" />
                            <div id="print-tour-content">
                                <h1>{{$tour->name}}</h1>
                                <div id="map"></div>
                            </div>
                            <div class="row" style="margin-top:30px">
                                <div class="col-sm-6">
                                    <p><b>Duration : {{$tour->duration}}  days</b></p>
                                    <p><b> Tour Code: {{$tour->code}}</b></p>
                                    <p><b>Destinations : {{implode(',',$tour->places()->lists('name'))}}</b></p>
                                    <p><b> Great For: <span class="great-for">{{implode(',',$tour->travelStyles->lists('name'))}}</span></b></p>
                                </div>
                                <div class="col-sm-6">
                                    <a class="thumbnail" href="#">
                                        <img  src="{{$tour->photoUrl()}}" alt="{{$tour->name}}" class="img-responsive" />
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
                                <h2 class="l-h4">ITINERARY</h2>
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
                            <h2 style="margin: 20px 0px;text-align: center">
                                --- Service end ---
                            </h2>
                            <div>
                                <h2  class="l-h4">
                                    TERM & CONDITION 
                                </h2>
                                <h3>Deposit</h3>
                                <p>A deposit of $100.00 per person is required upon accepted confirmation of your booking.  Once a deposit is received it will be understood that you have read and accepted the conditions of the booking.  Balance is due 60 days prior to departure.  Payment can be made by credit card (Master or Visa Card only), bank cheque or telegraphic transfer.  

                                <h3>Insurance</h3>
                                <p>Insurance is not included in your tour cost.  We strongly recommend that, at the time of booking, you purchase a comprehensive Travel Insurance policy.  With medical costs being so high and cancellation fees expensive, we strongly recommend that you discuss with your Travel Agent the most all-inclusive travel insurance policy available, which will fully cover your holiday requirements.

                                <h3>Cancellation and Refunds</h3>
                                <p>Cancellation must be received in writing and will be subject to the following cancellation fees applied per person, per arrangement:
                                </p>
                                <div class="row">
                                    <div class="col-xs-5">
                                        <p>More than 30 days before departure</p>
                                        <p>Less than 30 days before departure<br/><br/></p>
                                        <p>Less than 21 days before departure</p>
                                        <p>Less than 14 days before departure</p>
                                        <p>After the tour has started</p>
                                    </div>
                                    <div class="col-xs-2" style="text-align: center">
                                        <p>-</p>
                                        <p>-<br/><br/></p>
                                        <p>-</p>
                                        <p>-</p>
                                        <p>-</p>
                                    </div>
                                    <div class="col-xs-5">
                                        <p>deposit</p>
                                        <p>25% of the full price of the tour or $500 whichever is the greater. </p>
                                        <p>50% of the full price of the tour. </p>
                                        <p>80% of the full price of the tour.</p>
                                        <p>100% of the full price of the tour.</p>
                                    </div>
                                </div>
                                <p>These are nominal charges only and Bravo Indochina ’s apologise for having to levy these fees but as these are individual tours all arrangements are made well in advance of your departure. 
                                 </p>   
                                <h3>Tax</h3>
                                <p>Packages do not include local & or airport taxes unless otherwise clearly stated.

                                <h3>Amendments</h3>
                                <p>Up to 30 days prior to departure one amendment per booking is permitted free of charge.  For all subsequent changes there may be a charge of $25 levied per change.  Within 30 days prior to departure, cancellation fees may also be charged.
                                </p>
                                <h3>Air Line Tickets</h3>
                                <p>Cancellation of air arrangements will be subject to fees charged in accordance with the type of airfare used and airline tariff regulations.  Refunds will not be given for unused or cancelled services after your tour arrangements have commenced.
                                </p>
                                <h3>Documents</h3>
                                <p>Pre-departure information will be dispatched on receipt of payment.  Travel documents will be issued after final payment has been received and are normally sent two or three weeks prior to departure.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        <footer style="padding: 10px;background:#146abd;text-align: center">
            <b>BRAVO INDOCHINA TOURS</b>   <br/>   support@bravoindochinatour.com |
            www.bravoindochinatour.com<br/>
        </footer>
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