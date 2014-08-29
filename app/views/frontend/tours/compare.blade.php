@section('content')
<div class="row">
    <?php foreach ($tours as $tour):?>
    <div class="col-sm-4">
        <div class="compare-item">
            <h2 class="compare-name"> <a href="{{route('tour.show', array($tour->area->slug, $tour->slug))}}">{{$tour->name;}} </a></h2>
            <div data-id='{{$tour->id}}' style="height: 300px;" class="compare-map" id="compare-map-{{$tour->id}}"></div>
            <h3 class="compare-price">
               Starting at ${{$tour->price_from}}
            </h3>
        </div>
    </div>
    <?php endforeach;?>
</div>

<div class="modal fade" id="map-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
     <div class="modal-dialog">
       <div class="modal-content">
         <div class="modal-header">
           <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
           <h4 class="modal-title" id="myModalLabel">Modal title</h4>
         </div>
         <div class="modal-body">
             <div id='map-modal-content' style="width: 100%;height: 400px;"></div>
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
<script type="text/javascript">
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
        showMap(document.getElementById('compare-map-{{$tour->id}}'),tour{{$tour->id}}_places,3); 
    <?php endforeach;?>
    $('.compare-map').on('click',function(){
         var id = $(this).data('id');
         var localtionModal = eval("tour"+id+"_places");
         var title = $(this).parents('.tour-content').find('h3').text();
         $('#map-modal .modal-title').text(title);
         $('#map-modal').modal('show');
         $('#map-modal').on('shown.bs.modal', function (e) {
             showMap(document.getElementById('map-modal-content'),localtionModal,7);
         });
    });
</script>
@stop