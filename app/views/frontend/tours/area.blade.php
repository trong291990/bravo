@section('title')
 | {{$area->name}} tours
@stop

@section('keyword')
 @if($area->keyword_inherit)
 ,{{$area->meta_keyword}}
 @else 
    {{$area->meta_keyword}}
 @endif
@stop

@section('description')
{{$area->meta_description}}
@stop

@section('content')
            <div class="row">
                <div class="col-sm-12">
                    <h1>Best of {{$area->name}}</h1>
                </div>
                <div class="col-sm-12">
                    {{$area->description}}
                </div>
            </div>
           @include('frontend.tours.partials.features')
            <div class="clearfix" id="view-cities">
                SEE CITIES TO VISITS  
                @foreach($searchPlaces as $p)
                <a href="{{route('area_tours',$area->slug)}}/?place={{$p->name}}-{{$p->id}}"> :: {{$p->name}} </a>
                @endforeach
            </div>
            <div class="clearfix" id="package-form">
                <div class="col-sm-4 no-padding" id="package-check">
                    <input type="checkbox">
                    <label id="select-package-label">Select the package</label>
                    <input type="checkbox" />
                    <input type="checkbox" />
                    <input type="checkbox" />
                    <button type="submit" class="btn btn-primary">Compare</button>
                </div>
                <div class="col-sm-8 no-padding">
                    <div class="row">
                        <div class="col-sm-4">
                            <select>
                                <option value="">Sort by travel style</option>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <select>
                                <option value="">Sort by price</option>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <select>
                                <option value="">Sort by duration</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div id="tours-list">
                <?php foreach($tours as $tour): ?>
                <div class="tour-item" >
                    <div class="tour-sliders">
                        @if($tour->photo)
                        <a class="thumbnail" href="{{route('tour.show', array($tour->area->slug, $tour->slug))}}">
                            <img src="{{$tour->photoUrl()}}" class="img-responsive" />
                        </a>
                        @endif
                    </div>
                    <div class="tour-content clearfix">
                        <div class="col-sm-8 clearfix">
                            <h3 class="tour-title">
                                {{$tour->name;}} 
                            </h3>
                            <div class="row">
                                <div class="col-sm-8">
                                    <p>Tour Duration : {{$tour->duration}}  days</p>
                                    <p>Tour Code : {{$tour->code}} </p>
                                    <p>Destinations : {{implode(',',$tour->places()->lists('name'))}}</p>
                                    <p>Great for : <span class="great-for">{{implode(',',$tour->travelStyles->lists('name'))}}</span></p>
                                    <p><img src="{{URL::asset('/')}}frontend/images/page/likes.png" /></p>
                                </div>
                                <div class="col-sm-4">
                                    <p class="tour-price">START AT ${{$tour->price_from}} </p>
                                    <p class="tour-note">per person, without air</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 clearfix">
                            <div class="col-sm-6 no-padding-left">
                                <canvas class="tour-map" style="width: 156px;height: 156px" data-places='<?php echo json_encode($tour->places->lists('name')) ?>'>
                                </canvas>
                            </div>
                            <div class="col-sm-6 no-padding-right tour-actions">
                                <button class="btn btn-block btn-warning tour-booking">Booking now</button>
                                <p><i class="fa fa-envelope"></i> EMAIL TO FRIEND</p>
                                <p><i class="fa fa-print"></i> PRINT THIS PAGE</p>
                                <p><i class="fa fa-phone-square"></i> 19008198</p>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach;?>
            </div>
            <div class="clearfix">
                <?php echo $tours->links(); ?>
            </div>
@stop
@section('inline_scripts')
<script>
    jQuery(function($) {
        // Asynchronously Load the map API 
        var script = document.createElement('script');
        script.src = "http://maps.googleapis.com/maps/api/js?sensor=false&callback=initialize";
        document.body.appendChild(script);
        function showMap(dom) {
            var map;
            var bounds = new google.maps.LatLngBounds();
            var mapOptions = {
                mapTypeId: 'roadmap'
            };

            // Display a map on the page
            map = new google.maps.Map(dom, mapOptions);
            map.setTilt(45);

            // Multiple Markers
            var markers = [
                ['London Eye, London', 51.503454,-0.119562],
                ['Palace of Westminster, London', 51.499633,-0.124755]
            ];

            // Info Window Content
            var infoWindowContent = [
                ['<div class="info_content">' +
                '<h3>London Eye</h3>' +
                '<p>The London Eye is a giant Ferris wheel situated on the banks of the River Thames. The entire structure is 135 metres (443 ft) tall and the wheel has a diameter of 120 metres (394 ft).</p>' +        '</div>'],
                ['<div class="info_content">' +
                '<h3>Palace of Westminster</h3>' +
                '<p>The Palace of Westminster is the meeting place of the House of Commons and the House of Lords, the two houses of the Parliament of the United Kingdom. Commonly known as the Houses of Parliament after its tenants.</p>' +
                '</div>']
            ];

            // Display multiple markers on a map
            var infoWindow = new google.maps.InfoWindow(), marker, i;

            // Loop through our array of markers & place each one on the map  
            for( i = 0; i < markers.length; i++ ) {
                var position = new google.maps.LatLng(markers[i][1], markers[i][2]);
                bounds.extend(position);
                marker = new google.maps.Marker({
                    position: position,
                    map: map,
                    title: markers[i][0]
                });

                // Allow each marker to have an info window    
                google.maps.event.addListener(marker, 'click', (function(marker, i) {
                    return function() {
                        infoWindow.setContent(infoWindowContent[i][0]);
                        infoWindow.open(map, marker);
                    }
                })(marker, i));

                // Automatically center the map fitting all markers on the screen
                map.fitBounds(bounds);
            }

            // Override our map zoom level once our fitBounds function runs (Make sure it only runs once)
            var boundsListener = google.maps.event.addListener((map), 'bounds_changed', function(event) {
                this.setZoom(14);
                google.maps.event.removeListener(boundsListener);
            });
        }
        
        $('.tour-map').each(function(){
            showMap(this);
        });
    });
    
</script>
@stop