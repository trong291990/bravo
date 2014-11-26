<div id="gui-ebooks" class='row'>
    <div class="container">
    <div class="col-lg-6 col-sm-6">
        {{Former::open()->method('GET')}}
        <input type="text" value="" placeholder="Top 10 South Indochina Tour" />
        <button type="submit">
            <span>ORDER NOW YOUR</span>
            <p>FREE EBOOK</p>
        </button>
        <img src="{{Request::root()}}/frontend/images/page/ebook.png" alt="Top 10 South Indochina Tour" />
        {{Former::close()}}
    </div>
    <div class="col-lg-6 col-sm-6">
        {{Former::open()}}
        <input type="text" value="" placeholder="Gui To South Indochina Travel" />
        <button type="submit">
            <span>ORDER NOW YOUR</span>
            <p>FREE GUIDE</p>
        </button>
        <img src="{{Request::root()}}/frontend/images/page/guide.png" alt="Gui To South Indochina Travel" />
        {{Former::close()}}
    </div>
        </div> 
</div>