@section('title')
{{ $specialist->fullName() }}'s Profile
@stop
@section('body_class')
staff-page
@stop
@section('content')
<div class="row">
    <div class="col-sm-3" id="staff-sidebar-wrapper">
        <div class="staff-sidebar">
            <div class="thumbnail">
                {{HTML::image($specialist->avatarURL(),'',['class'=>'img-responsive','style'=>"width:100%"])}}
            </div>
            <h3 class="staff-name"> {{ $specialist->fullName() }}</h3>
            <p><b>Specialties:</b></p>
            <ul class="agentStrengthsUList">
                @foreach($specialist->specialties as $s)
                <li class="agentStrengthsList">{{ $s }}</li>
                @endforeach
            </ul>
            <a class="btn btn-primary btn-block" href="mailto:{{ $specialist->email }}"><i class="fa fa-envelope"></i> Send me an email</a>
        </div>

        <div class='staff-sidebar'>
            <h3>Most popular trip</h3>
            <div class='staff-popular-trip'>
                @if($popularTour)
                    <div class="thumbnail">
                        <img src="{{ $popularTour->thumbnailURL() }}" class='img-responsive' />
                    </div>
                    <div class="desc vertical">
                        <div class="trip-box-details">
                            <h4>{{ $popularTour->area->name }} - {{ $popularTour->duration }} days</h4>
                            <h3><a href="{{ route('tour.show', [$popularTour->area->slug, $popularTour->slug]) }}">{{ $popularTour->name }}</a></h3>
                            <ul class="mainAttractionList">
                                <li>The Great Pyramids &amp; Sphinx</li>
                                <li>The Temple of Luxor and Karnak</li>
                                <li>Queen Hatchipsut's Temple</li>
                                <li>The Valley of Kings &amp; Queens</li>
                            </ul>
                        </div>
                        <span class="btn_small">See more</span>
                        <span class="price">
                            <sub>price/person</sub>
                            $ 527               
                        </span>                    
                        <div class="clear"></div>
                    </div>
                @endif
            </div>
        </div>

    </div>
    <div class="col-sm-9" id='staff-content-wrapper'>
        <div class='staff-content'>
            <div class='staff-content-header'>
                <h1>Hello, my name is {{ $specialist->fullName() }}</h1>
            </div>
            <div class='staff-content-primary'>
                <!--<p class='egypt'>Egypt travel expert </p>-->
                <div>
                    {{ $specialist->bio }}
                </div>
                <div class='row staff-meta'>
                    <div class='col-sm-6'>
                        <p><i class='fa fa-language'> </i> Language: {{ $specialist->languages }}</p>
                        <p><i class='fa fa-home'></i> Lives in: {{ $specialist->nationality }}</p>
                    </div>
                    <div class="col-sm-6">
                        <div class='staff-rate-wrapper'>
                            <h3>Current rating</h3>
                            <div class='staff-ratied' data-ratied="{{$specialist->avgRate()}}"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <h2>Individual trip deals from {{ $specialist->first_name }}</h2>
        <div class='row staff-trips'>
            @foreach($newestTours as $tour)
            <div class='col-sm-4'>
                <div class='staff-trip'>
                    <div class="thumbnail">
                        <img src="{{ $tour->thumbnailURL() }}" class='img-responsive' />
                    </div>
                    <div class="desc vertical">
                        <div class="trip-box-details">
                            <h4>{{ $tour->area->name }} - {{ $tour->duration }} days</h4>
                            <h3><a href="{{ route('tour.show', [$tour->area->slug, $tour->slug]) }}">{{ $tour->name }}</a>
                            </h3>
                            <ul class="mainAttractionList">
                                <li>The Great Pyramids &amp; Sphinx</li>
                                <li>The Temple of Luxor and Karnak</li>
                                <li>Queen Hatchipsut's Temple</li>
                                <li>The Valley of Kings &amp; Queens</li>
                            </ul>
                        </div>
                        <span class="btn_small">See more</span>
                        <span class="price">
                            <sub>price/person</sub>
                            $ 527               
                        </span>                    
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class='staff-content staff-comments'>
            @foreach($comments as $comment)
            <div class='row staff-comment-item'>
                <div class='col-sm-2'>
                    <div class="clearfix comment-avatar">
                        <img src="{{gravatar_url($comment->customer->email, 48)}}" class='img-circle img-responsive' />
                    </div>
                    <p class='comment-name a-center'>{{ $comment->customer->name }}</p>
                </div>
                <div class='col-sm-10 comment-text'>
                    <div class="bs-callout bs-callout-info">
                        <div class='cleafix'>
                            <div class='staff-ratied' data-ratied="{{ $comment->score }}"></div>
                        </div>
                        <p>{{ $comment->content }}</p>
                    </div>
                </div>
            </div>
            @endforeach
            <div class='row staff-comment-item'>
                <div class='col-md-10 col-md-offset-2'>
                    <?php if ($loggedCustomer): ?>
                        <h3>Write your review:</h3>
                        <?php echo Former::open(route('specialist.post_review', $specialist->id))->id('form-comment')->novalidate(false) ?>
                        <div class="form-group">
                            <div class="col-md-12">
                                <h4>Rate:  <span class="staff-rate"></span> </h4> 
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <textarea rows="5" required="required" class="form-control" name="content"></textarea>
                            </div>
                        </div>
                        <div class="form-group text-right">
                            <div class="col-md-12">
                                <button class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                        <?php echo Former::close() ?>
                    <?php else: ?>
                        <p>
                            <a href="#modal-login" data-toggle='modal'>Sign In</a> to write your review
                        </p>
                    <?php endif; ?>
                </div>
            </div>

        </div>
    </div>
    @stop
    @section('addon_stylesheets')
    {{ HTML::style('/plugins/raty/jquery.raty.css') }}
    @stop
    @section('addon_js')
    {{ HTML::script('/plugins/raty/jquery.raty.js') }}
    @stop
    @section('inline_scripts')
    <script>
        $('.staff-rate').raty({starType: 'i', 'score': 3});
        $('.staff-ratied').each(function() {
            var dataRaty = $(this).data('ratied');
            $(this).raty({starType: 'i', 'score': dataRaty, 'readOnly': true});
        });
        $('#form-comment').on('submit', function() {
            if($(this).find('[name="content"]').val().trim().length < 15) {
                bootbox.alert("Please write your review with at least 15 characters");
                return false;
            }
        });
    </script>   
    @stop
