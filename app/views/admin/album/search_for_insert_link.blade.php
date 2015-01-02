<div class="col-md-12">
  @if($albums->count() > 0)
    @foreach($albums as $album)
      <?php
      $thumb_url = asset('backend/images/no-image.gif');
      if ($album->primaryPhoto()) {
          $thumb_url = asset($album->primaryPhoto()->thumb_path);
      }
      ?>   
      <div class="row album-search-item" 
          data-album-id="{{ $album->id }}" 
          data-album-url="{{ show_album_url($album) }}"
          data-album-name="{{ $album->name }}">
          <div class="col-sm-2">
            <div class="thumbnail">
              <img src="{{ $thumb_url }}" width="77" height="50">
            </div>
          </div>
          <div class="col-sm-7">
            <span class="text-info"><strong>{{ $album->name }}</strong></span>
            <br/>
            Country: {{ $album->area->name }}
            <br/>
            Type: {{ $album->typeLabel() }}
          </div>
          <div class="col-sm-3">
            <button class="btn btn-default btn-sm btn-block btn-select-album">Insert</button>
          </div>
      </div>
    @endforeach
  @else
    <p class="text-danger">Not found any albums match!</p>
  @endif  
</div>