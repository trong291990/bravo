<?php

class ReviewController extends FrontendBaseController {

    public function index() {
        $this->layout->content = View::make('frontend.pages.review')
                ->with('reviews', Review::with('customer')->where('is_approved', 1)
                ->paginate(10));
    }

    public function submit() {
        $customer = Auth::customer()->get();
        if (Validator::make(Input::all(), Review::$rules)->passes()) {
            $customer->reviews()->save(new Review(Input::all()));
            if(is_array(Input::file('photos'))) {
                $album = Album::createTravellerAlbum(Input::get('destination'));
                $album->uploadPhotos(Input::file('photos'));  
            } else {
                dd('ero co');
            }
        }

        Session::flash('success', "Thank you. Your review are currently in the melting pot.");
        return Redirect::to(route('review'));
    }

}

?>
