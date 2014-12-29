<div class="col-md-12">
  @foreach($albums as $album)
  <div class="row">
      <div class="col-sm-4">
        <div class="thumbnail">
          <img src="">
        </div>
      </div>
      <div class="col-sm-8">
        {{ $album->name }}
      </div>
  </div>
  @endforeach
</div>