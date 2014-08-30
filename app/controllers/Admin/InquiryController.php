<?php 
namespace Admin;

use \Request;
use \Response;
use \Session;
use \Redirect;
use \Input;
use \View;
use \Validator;
use \Inquiry;

class InquiryController extends AdminBaseController {

	public function index() {
		$inquiries = Inquiry::loadOrSearch(Input::all());
		$this->layout->content = View::make('admin.inquiry.index')->with(compact('inquiries'));
	}

	public function show($id) {
		$inquiry = Inquiry::findOrFail($id);
		$this->layout->content = View::make('admin.inquiry.show')->with(compact('inquiry'));
	}	

	public function markResolved($id) {
		$inquiry = Inquiry::findOrFail($id);
		$inquiry->markResolved();
		Session::flash('success', 'An inquiry has been marked as resolved');
		return Redirect::route('admin.inquiry.index');
	}

	public function destroy($id) {
		$inquiry = Inquiry::findOrFail($id);
		$inquiry->delete();
		Session::flash('success', 'Delete inquiry successfully');
		return Redirect::route('admin.inquiry.index');
	}	
}
 ?>