@section('title')
  Wishlist
@stop
@section('content')
 <div class="tour-sub-page">
  <div class="row">
    <div class="col-sm-12">
      <ol class="breadcrumb">
          <li><a href="{{route('root')}}">Home</a></li>
          <li class="active">Wishlist</li>
      </ol>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-12">
      <div class="wishlist-container">
            <?php foreach ($wishlists as $item) : ?>
              <?php $tour = $item->tour ?>
                <div class="row wishlist-row">
                  <div class="tour-thumbnail col-md-4 col-xs-12">
                    <div class="tour-thumbnail-img" style="background-image: url({{$tour->photoUrl()}})"></div>
                  </div>
                  <div class="tour-short-info col-md-4 col-xs-12">
                    <ul class="list-unstyled">
                      <li>
                        <h3><a href="{{route('tour.show', array($tour->area->slug, $tour->slug))}}">{{$item->tour->name}}</a>
                        </h3>
                      </li>
                      <li>
                        Tour code: {{$tour->code}}
                      </li>
                      <li>
                        Duration: {{$tour->duration}} days
                      </li>
                      <li>
                        Destinations: {{implode(',',$tour->places()->lists('name'))}}
                      </li>
                      <li>
                        Starting at: ${{$tour->price_from}}
                      </li>                                                       
                    </ul>
                  </div>
                  <div class="tour-short-info col-md-4 col-xs-12">
                    <a href="{{route('tour.show', array($tour->area->slug, $tour->slug))}}" class="btn btn-primary">Details</a>
                    <button type="button" 
                        data-add-url="{{route('wishlist.add', $tour->id)}}"
                        data-remove-url="{{route('wishlist.remove', $tour->id)}}"
                        class="btn {{in_array($tour->id, $wishlist_items) ? 'btn-remove-wishlist' : 'btn-add-wishlist' }}">
                        {{in_array($tour->id, $wishlist_items) ? 'Remove from Wishlist' : 'Add to Wishlist'}}
                    </button>                    
                  </div>
                </div>
            <?php endforeach; ?>          
      </div>
    </div>
  </div>
 </div>
@stop