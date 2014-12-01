<div class="row album-comment-item">
    <div class="col-sm-2">
        <img src="{{gravatar_url($comment->customer->email)}}"
             class="img-responsive img-thumbnail img-circle no-padding" />
    </div>
    <div class="col-sm-10">
        <div class="album-comment-author">
            <a href="#">{{$comment->customer->name}}</a> {{$comment->created_at->format('M m, Y')}}
            <br>
            <span class="comment-raty" data-scored="{{$comment->score}}"></span>
        </div>
        <div class="album-comment-content">
            {{$comment->content}}
        </div>
    </div>
</div>