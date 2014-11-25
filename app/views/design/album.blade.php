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
    <div id="album-index-list">
        <div class="panel panel-default album">
            <div class="panel-heading">TOP CITIES IN INDOCHINA
                <a class="view-more pull-right" href="#">View more</a>
            </div>
            <div class="panel-body">
                <div class="row album-row">
                    <?php for($i=1;$i<=8;$i++): ?>
                    <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                        <a class="thumbnail" href="album.html">
                            <img alt="..." src="http://bravoindochinatour.com/uploads/albums/thumb/2/5b6737214c64e0b1afca0674b52f23a3t.jpeg">
                        </a>
                        <div class="album-detail">
                            <a href="album.html">
                                    Honoi | <span class="number">36 photos</span>
                            </a>
                        </div>
                    </div>
                    <?php endfor;?>
                </div>
            </div>
          </div>
         <div class="panel panel-default album">
            <div class="panel-heading">TOP CITIES IN VIETNAM
                <a class="view-more pull-right" href="#">View more</a>
            </div>
            <div class="panel-body">
                <div class="row album-row">
                    <?php for($i=1;$i<=8;$i++): ?>
                    <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                        <a class="thumbnail" href="album.html">
                            <img alt="..." src="http://bravoindochinatour.com/uploads/albums/thumb/2/5b6737214c64e0b1afca0674b52f23a3t.jpeg">
                        </a>
                        <div class="album-detail">
                            <a href="album.html">
                                    Honoi | <span class="number">36 photos</span>
                            </a>
                        </div>
                    </div>
                    <?php endfor;?>
                </div>
            </div>
          </div>
    </div>
</div>
@stop