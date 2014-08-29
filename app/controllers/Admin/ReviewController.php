<?php 
	namespace Admin;

	use \Request;
	use \Response;
	use \Session;
	use \Redirect;
	use \Input;
	use \View;
	use \Validator;
	use \Review;

	class ReviewController extends AdminBaseController {

		public function index() {
			$reviews = Review::loadOrSearch(Input::all());
			$this->layout->content = View::make('admin.review.index')
				->with(compact('reviews'));
		}

		public function approve($id) {
			$review = Review::findOrFail($id);
			$review->doApprove();
			Session::flash('success', "Approved review successfully");
			return Redirect::route('admin.review.index');
		}

		public function reject($id) {
			$review = Review::findOrFail($id);
			$review->doReject();
			Session::flash('success', "A review has been rejected");
			return Redirect::route('admin.review.index');
		}

	}
 ?>