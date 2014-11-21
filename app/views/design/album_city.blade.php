@section('content')
<div id="content">
    <h1 class="title" style="margin-top:20px">Search for a photo/video</h1>
    <p>
        Spread over an extensive area of 330,000 sq kilometers extending to the south of the Chinese border alongside the east coast of the Indo-China Peninsula, Vietnam is a small Southeast Asian country. It presents a pleasing potpourri of meandering rivers, towering mountains, and dense forests boasting exquisite fauna, rich delta plains and lovely tropical beaches with long stretches of shimmering sand. It has been decades since the conclusion of the American war in Vietnam, but for many, it is the first thing that still comes to mind when talking about this country. In fact, Vietnam boasts gorgeous landscapes with several quaint villages. This country is home to some of the most pristine islands and finest beaches in the entire Southeast Asia. These attractions are situated on the coastline of Vietnam. Delectable seafood items can be found here because of the country’s nearness to the sea. Vietnamese are forever cheerful and welcome visitors with politeness. They take pride in their rich heritage that is very much reflected in their daily life. Spirituality in this country is an amazing amalgamation of Confucianism and Christianity merged with Animism, Taoism, Tam Giao (which means triple region) and Buddhism. Vietnam will never fail to fascinate you with its picturesque setting, historic cities and gracious people.
    </p>
    <div id="album-index-search">
        <form action="" method="GET" class="row">
            <div class=" form-group col-sm-3">
                <label>Select Country</label>
                <select class="form-control no-br">
                    <option value="">Việt Nam</option>
                </select>
            </div>
            <div class=" form-group col-sm-3">
                <label>Select Country</label>
                <select class="form-control no-br">
                    <option value="">Việt Nam</option>
                </select>
            </div>
            <div class=" form-group col-sm-3">
                <label>Keyword</label>
                <input type="text" class="form-control no-br" name="" />
            </div>
            <div class=" form-group col-sm-3">
                <label style="display: block">&nbsp;</label>
                <button class="btn btn-primary no-br" type="submit">Create a new account</button>
            </div>
        </form>
    </div>
    <div id="album-city" class="clearfix">
        <ul class="list-unstyled list-inline">
            @for($i=1;$i<=20;$i++)
            <li><a href="#" title="The Old Room of Macabre Detritus"><img  src="<?php echo url('/dummy_images/1.jpg') ?>" width="<?php echo rand(200,500) ?>px" height="180px" focus-y="<?php echo rand(1,4) ?>" focus-x="<?php echo rand(1,4) ?>"  /></a></li>
            @endfor
        </ul>
    </div>
</div>
@stop
@section('inline_scripts')
<script type="text/javascript">
        $(function() {
                $('#album-city ul img').each(function(i, element) {
                        var focusY = Math.floor((Math.random()*4)+1);
                        var focusX = Math.floor((Math.random()*4)+1);
                        $(element).attr({'focus-y': focusY, 'focus-x': focusX});
                });
                $('#album-city ul').brickwall();
        });
</script>
@stop
                