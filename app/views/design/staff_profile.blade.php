@section('body_class')
staff-page
@stop
@section('content')
<div class="row">
    <div class="col-sm-3" id="staff-sidebar-wrapper">
        <div class="staff-sidebar">
            <div class="thumbnail">
               {{HTML::image('/frontend/images/avatar.jpg','',['class'=>'img-responsive','style'=>"width:100%"])}}
            </div>
            <h3 class="staff-name"> Yzhachi Suzuki</h3>
            <p><b>Specialties:</b></p>
            <ul class="agentStrengthsUList">
                <li class="agentStrengthsList">Passionate about Egypt </li>
                <li class="agentStrengthsList">Specialist in offering local culture
                </li><li class="agentStrengthsList">Experienced with private and group tours</li>
            </ul>
            <a class="btn btn-primary btn-block"><i class="fa fa-envelope"></i> Send me an email</a>
        </div>
        
        <div class='staff-sidebar'>
            <h3>Most popular trip</h3>
            <div class='staff-popular-trip'>
                <div class="thumbnail">
                    <img src="/frontend/images/page/hoi-an.jpg" class='img-responsive' />
                </div>
                <div class="desc vertical">
                    <div class="trip-box-details">
                        <h4>Egypt - 8 days</h4>
                        <h3>A Tour of Ancient Egypt</h3>
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
        
    </div>
    <div class="col-sm-9" id='staff-content-wrapper'>
        <div class='staff-content'>
            <div class='staff-content-header'>
                <h1>Hello, my name is Yzhachi Suzuki</h1>
            </div>
            <div class='staff-content-primary'>
                <p class='egypt'>Egypt travel expert </p>
                <div>
                    Being an Egyptian that have been promoting her country for 14 years is really a bless, allover those years I got more closer to its soul and attractions. My task is not only selling programs,sightseeeing and excursions in my destination but I believe that one of my main responsibilites is to be the client`s eyes in my country so that he can feel such deep soul and contemplate its attractions. 
                </div>
                <div class='row staff-meta'>
                    <div class='col-sm-6'>
                        <p><i class='fa fa-language'> </i> Language : English, China, Japanese</p>
                        <p><i class='fa fa-home'></i> Lives in : VietNam</p>
                    </div>
                    <div class="col-sm-6">
                        <div class='staff-rate-wrapper'>
                            <h3>Current rating</h3>
                            <div class='staff-ratied' data-ratied="4"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <h2>Individual trip deals from Yzhachi</h2>
        <div class='row staff-trips'>
                @for($i=1;$i<=3;$i++)
               <div class='col-sm-4'>
                   <div class='staff-trip'>
                        <div class="thumbnail">
                            <img src="/frontend/images/page/hoi-an.jpg" class='img-responsive' />
                        </div>
                        <div class="desc vertical">
                            <div class="trip-box-details">
                                <h4>Egypt - 8 days</h4>
                                <h3>A Tour of Ancient Egypt</h3>
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
                @endfor
        </div>
        <div class='staff-content staff-comments'>
            @for($i=1;$i<=3;$i++)
            <div class='row staff-comment-item'>
                <div class='col-sm-2'>
                    <div class="clearfix comment-avatar">
                        <img src="/frontend/images/avatar.jpg" class='img-circle img-responsive' />
                    </div>
                    <p class='comment-name a-center'>Adam khoo</p>
                </div>
                <div class='col-sm-10 comment-text'>
                    <div class="bs-callout bs-callout-info">
                        <p>This is a success callout.</p>
                        <hr class="divider no-margin pt-10" />
                        <div class='cleafix'>
                            <div class='staff-ratied pull-right' data-ratied="4"></div>
                        </div>
                    </div>
                </div>
            </div>
            @endfor
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
    $('.staff-ratied').each(function() {
        var dataRaty = $(this).data('ratied');
        $(this).raty({starType: 'i', 'score': dataRaty,'readOnly':true});
    });
</script>   
@stop