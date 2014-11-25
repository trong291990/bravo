@section('title')
<?php if($place && isset($place->title)){
            echo $place->title;
        } else{
            echo $title;
        }
?>
@stop
@section('area_class')
  class="{{$area->slug}}"  
@stop
@section('keyword')
 <?php 
    echo ($place && isset($place->meta_keyword) && $place->meta_keyword ) ? $place->meta_keyword : $area->meta_keyword;
 ?>
@stop

@section('description')
<?php 
    echo ($place && isset($place->meta_description) && $place->meta_description ) ? $place->meta_description : $area->meta_description;
 ?>
@stop

@section('content')
            <div class="row fefef">
                <div class="col-sm-12">
                    <h1>Best of <?php echo ($place && isset($place->name) && $place->name ) ? $place->name :  $area->name ?></h1>
                </div>
                <div class="col-sm-12">
                    <?php echo ($place && isset($place->description) && $place->description ) ? $place->description :  $area->description ?>
                </div>
            </div>
           @include('frontend.tours.partials.features')
            <div class="clearfix" id="view-cities">
                SEE CITIES TO VISITS  
                @foreach($searchPlaces as $p)
                <a href="{{Request::root()}}/tours/{{$p->slug}}-tours"> :: {{$p->name}} </a>
                @endforeach
            </div>
            <div class="clearfix" id="package-form">
                <div class="col-md-4 col-sm-12 no-padding" id="package-check">
                     <?php echo Former::open(route('package_compare')) ?>
                    <input type="checkbox" id="checkbox-as-icon" class="css-checkbox" disabled checked>
                    <label class="css-label" id="select-package-label">Select the package</label>
                    <input type="checkbox" class="selected-package-checkbox css-checkbox" id="select-package-1" name="select_packages[]" />
                    <label class="css-label"></label>
                    <input type="checkbox" class="selected-package-checkbox css-checkbox" name="select_packages[]"  id="select-package-2" />
                    <label class="css-label"></label>
                    <input type="checkbox" class="selected-package-checkbox css-checkbox" name="select_packages[]"  id="select-package-1" />
                    <label class="css-label"></label>
                    <button type="submit" class="btn btn-primary">Compare</button>
                     <?php echo Former::close() ?>
                </div>
                <div class="col-md-8 col-sm-12 no-padding">
                    <div class="row" id="filter-container">
                        <div class="col-sm-4">
                            <select id='travel-style-sort'>
                                <option value="">Sort by travel style</option>
                                <?php foreach (TravelStyle::all() as $key => $style) :?>
                                <option <?php if($key==$sorts['travel_style']-1) echo 'selected="selected"'; ?> value="{{$style->id}}">{{$style->name}}</option>
                                <?php endforeach;?>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <select id='price-sort'>
                                <option value="">Sort by price</option>
                                <?php foreach (Tour::priceSorts() as $key => $v): ?>
                                <option <?php if($key==$sorts['price']) echo 'selected="selected"'; ?> value="{{$key}}">{{$v['label']}}</option>
                                <?php endforeach;?>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <select id='duration-sort'>
                                <option value="">Sort by duration</option> 
                                <?php foreach (Tour::durationSorts() as $key => $v): ?>
                                <option <?php if($key==$sorts['duration']) echo 'selected="selected"'; ?> value="{{$key}}">{{$v['label']}}</option>
                                <?php endforeach;?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div id="tours-list">
                <?php foreach($tours as $tour): 
                   $tour_url = route('tour.show', array($tour->area->slug, $tour->slug)); 
                ?>
                <div class="tour-item" >
                    <div class="tour-sliders">
                        @if($tour->photo)
                        <a class="thumbnail" href="{{ $tour_url }}">
                            <img  src="{{$tour->photoUrl()}}" alt="{{$tour->name}}" class="img-responsive" />
                        </a>
                        @endif
                    </div>
                    <div class="tour-content clearfix">
                        <div class="col-lg-8 col-sm-7 clearfix">
                            <h3 class="tour-title">
                                <a href="{{ $tour_url }}">{{$tour->name;}} </a>
                            </h3>
                            <div class="row">
                                <div class="col-lg-7 col-sm-12">
                                    <p>Tour Duration : {{$tour->duration}}  days</p>
                                    <p>Tour Code : {{$tour->code}} </p>
                                    <p>Destinations : {{implode(',',$tour->places()->lists('name'))}}</p>
                                    <p>Great for : <span class="great-for">{{implode(',',$tour->travelStyles->lists('name'))}}</span></p>
                                     <div class="">
                                        <span class='st_facebook_hcount' st_url="{{ $tour_url }}" st_title="Bravo Tours - {{$tour->name}}" displayText='Facebook'></span>
                                        <span class='st_twitter_hcount' st_url="{{ $tour_url }}" st_title="Bravo Tours - {{$tour->name}}" displayText='Tweet'></span>
                                        <span class='st_googleplus_hcount' st_url="{{ $tour_url }}" st_title="Bravo Tours - {{$tour->name}}" displayText='Google +'></span>
                                        <span class='st_email_hcount' st_url="{{ $tour_url }}" st_title="Bravo Tours - {{$tour->name}}" displayText='Email'></span>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-sm-6 compare-col clearfix">
                                    <input id="compare-package-checkbox-{{$tour->id}}" class="pull-left compare-package-checkbox css-checkbox" type="checkbox" name="select_packages[]" value="{{$tour->id}}"/>
                                    <label for="compare-package-checkbox-{{$tour->id}}"  class="pull-lef complare-package-label css-label">Compare package</label>
                                </div>
                                <div class="col-lg-3 price-col col-sm-8">
                                    <p class="tour-price">START AT ${{$tour->price_from}} </p>
                                    <p class="tour-note">per person, without air</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-5 clearfix">
                            <div class="col-sm-6 no-padding-left">
                                <div data-id="{{$tour->id}}" id="tour-map-{{$tour->id}}" class="tour-map" style="width: 156px;height: 156px">
                                </div>
                            </div>
                            <div class="col-sm-6 no-padding-right tour-actions">
                                <?php if($loggedCustomer): ?>
                                    <button type="button" 
                                        data-add-url="{{route('wishlist.add', $tour->id)}}"
                                        data-remove-url="{{route('wishlist.remove', $tour->id)}}"
                                        class="btn btn-block {{in_array($tour->id, $wishlist_items) ? 'btn-remove-wishlist' : 'btn-add-wishlist' }}">
                                        {{in_array($tour->id, $wishlist_items) ? 'Remove from Wishlist' : 'Add to Wishlist'}}
                                    </button>
                                 <?php endif; ?> 
                                <button type="button" data-id='{{$tour->id}}' class="btn booking-tour btn-block btn-warning tour-booking">Enquiry Now</button>
                                <p>
                                    <a href="javascript:void(0);" class="btn-email-friend"><i class="fa fa-envelope"></i> EMAIL TO FRIEND</a>
                                </p>
                                <p><i class="fa fa-print"></i> PRINT THIS PAGE</p>
                                <p><i class="fa fa-phone-square"></i> 19008198</p>

                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach;?>
            </div>
            <div class="clearfix" id="area-tours-pagging-container">
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
        try {
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
           
        } catch (ex) {
            console.log(ex);
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
    $('checkbox:not(#checkbox-as-icon)').prop('checked',false);
    $('.compare-package-checkbox').change(function() {
        if(this.checked) {
            var freeCheckbox = $('#package-check .selected-package-checkbox:not(:checked)').first();
            if(freeCheckbox.length==0){
                alert('You may only compare 2 or 3 packages. After selecting your packages, click the Compare button at the top of the page')
                $(this).prop("checked",false);
            }else {
               freeCheckbox.prop("checked",true);
               freeCheckbox.val($(this).val());
            }
        }else{
            var checkedCheckbox = $('#package-check .selected-package-checkbox:checked').last();
            if(checkedCheckbox.length!==0){
                checkedCheckbox.prop("checked",false);
                 freeCheckbox.val('');
            }
        }
    });
    var url = "{{Request::root()}}/tours/{{$toursParent}}?filler=true";
    $('#filter-container select').change(function(){
        var travelStyle = $('#travel-style-sort').val();
        var price = $('#price-sort').val();
        var duration =  $('#duration-sort').val();
        if(travelStyle!==''){
           url += "&travel_style="+travelStyle;
        }
        if(price!==''){
           url += "&price="+price; 
        }
        if(duration !==''){
             url += "&duration="+duration; 
        }
        window.location = url;
    });
</script>
@stop