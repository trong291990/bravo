<?php

class SpecialistController extends FrontendBaseController {

  /**
   * Listing specialists
   */
  public function index() {

  }

  /**
   * View public profile of specialist
   */
  public function profile($id) {
    $specialist = Specialist::findOrFail($id);
    $this->layout->content = View::make('frontend.specialist.profile');
  }

  /**
   * View public profile of specialist
   */
  public function editProfile($id) {
    $specialist = Specialist::findOrFail($id);
    $this->layout->content = View::make('frontend.specialist.edit_profile');
  }

  public function updateProfile($id) {
    $specialist = Specialist::findOrFail($id);
    return Redirect::to('/');
  }

  /**
   * Customer post a review for specialist
   */
  public function postReview($id) {

  }

}

?>