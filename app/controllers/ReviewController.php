<?php

class ReviewController extends BaseController {

    public function submit() {
        $customer = Auth::customer()->get();

        if (Validator::make(Input::all(), Review::$rules)->passes()) {
            $customer->reviews()->save(new Review(Input::all()));
        }

        Session::flash('success', "Thank you. Your review are currently in the melting pot.");
        return Redirect::to(route('review'));
    }

}

?>
