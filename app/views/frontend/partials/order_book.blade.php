<div id="gui-ebooks" class='cleafix'>
    <div class="col-sm-6">
        {{Former::open()->method('GET')}}
        <input type="text" value="" placeholder="Top 10 South Americal Tour" />
        <button type="submit">
            <span>ORDER NOW YOUR</span>
            <p>FREE EBOOK</p>
        </button>
        <img src="{{Request::root()}}/frontend/images/page/order-book.png" alt="Top 10 South America Tour" />
        {{Former::close()}}
    </div>
    <div class="col-sm-6">
        {{Former::open()}}
        <input type="text" value="" placeholder="Gui To South America Travel" />
        <button type="submit">
            <span>ORDER NOW YOUR</span>
            <p>FREE GUIDE</p>
        </button>
        <img src="{{Request::root()}}/frontend/images/page/order-book.png" alt="booking" />
        {{Former::close()}}
    </div>
</div>