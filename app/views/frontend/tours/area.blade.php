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
                    <input type="checkbox" disabled checked>
                    <label id="select-package-label">Select the package</label>
                    <input type="checkbox" class="selected-package-checkbox" id="select-package-1" name="select_packages[]" />
                    <input type="checkbox" class="selected-package-checkbox" name="select_packages[]"  id="select-package-2" />
                    <input type="checkbox" class="selected-package-checkbox" name="select_packages[]"  id="select-package-1" />
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
                <?php foreach($tours as $tour): 
                    
                ?>
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
                                <a href="{{route('tour.show', array($tour->area->slug, $tour->slug))}}">{{$tour->name;}} </a>
                            </h3>
                            <div class="row">
                                <div class="col-sm-7">
                                    <p>Tour Duration : {{$tour->duration}}  days</p>
                                    <p>Tour Code : {{$tour->code}} </p>
                                    <p>Destinations : {{implode(',',$tour->places()->lists('name'))}}</p>
                                    <p>Great for : <span class="great-for">{{implode(',',$tour->travelStyles->lists('name'))}}</span></p>
                                    <div>
                                        <?php $options = array('url'=>route('tour.show', array($tour->area->slug, $tour->slug))); ?>
                                        {{ Shareable::facebook($options) }}
                                        {{ Shareable::googlePlus($options)}}
                                        {{ Shareable::twitter($options) }}
                                    </div>
                                </div>
                                <div class="col-sm-2 clearfix">
                                    <input class="pull-left compare-package-checkbox" type="checkbox" name="select_packages[]" value="{{$tour->id}}"/>
                                    <label  class="pull-lef complare-package-label">Compare package</label>
                                </div>
                                <div class="col-sm-3">
                                    <p class="tour-price">START AT ${{$tour->price_from}} </p>
                                    <p class="tour-note">per person, without air</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 clearfix">
                            <div class="col-sm-6 no-padding-left">
                                <div data-id="{{$tour->id}}" id="tour-map-{{$tour->id}}" class="tour-map" style="width: 156px;height: 156px">
                                </div>
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
           <div class="modal fade" id="map-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                      <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                    </div>
                    <div class="modal-body">
                        <div id='map-modal-content' style="width: 100%;height: 400px"></div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
            </div>
@stop
@section('addon_js')
<script src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
@stop
@section('inline_scripts')
<script>
    function showMap(dom,locations,zoom){
            var map = new google.maps.Map(dom, {
             zoom:zoom,
             center: new google.maps.LatLng(locations[0][1],locations[0][2]),
             mapTypeId: google.maps.MapTypeId.ROADMAP
           });

           var infowindow = new google.maps.InfoWindow();
           var marker, i;

            for (i = 0; i < locations.length; i++) {  
                marker = new google.maps.Marker({
                  position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                  map: map,
                  icon: "{{ URL::asset('/frontend/images/common/map.png')}}",
                });

                google.maps.event.addListener(marker, 'click', (function(marker, i) {
                  return function() {
                    infowindow.setContent(locations[i][0]);
                    infowindow.open(map, marker);
                  }
                })(marker, i));
           }
        }
    <?php foreach($tours as $tour):
        $places = [];
        foreach($tour->places as $place){
            $places[] = [$place->name,$place->lat,$place->lng];
        }
    ?>
        var tour{{$tour->id}}_places = {{json_encode($places)}};
        showMap(document.getElementById('tour-map-{{$tour->id}}'),tour{{$tour->id}}_places,3); 
    <?php endforeach;?>
    $('.tour-map').on('click',function(){
         var id = $(this).data('id');
         var localtionModal = eval("tour"+id+"_places");
         var title = $(this).parents('.tour-content').find('h3').text();
         $('#map-modal .modal-title').text(title);
         $('#map-modal').modal('show');
         $('#map-modal').on('shown.bs.modal', function (e) {
             showMap(document.getElementById('map-modal-content'),localtionModal,7);
         });
    });
    
    //check to compare
    $('.compare-package-checkbox').on('ifChecked', function(){
        var freeCheckboxes = $('#package-check .icheckbox_square-orange:not(.checked)');
        if(freeCheckboxes.length==0){
            alert('You may only compare 2 or 3 packages. After selecting your packages, click the Compare button at the top of the page')
            $(this).iCheck('uncheck');
        }
      });
</script>
@stop