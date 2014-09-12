<?php 
	
	class ReviewController extends BaseController {

		public function submit() {
                    $review = new Review(Input::all());
                    $review->save();
                    Session::flash('success', "Thank you. Your review are currently in the melting pot.");
                    return Redirect::to(route('review'));
		}

	}
 ?>
