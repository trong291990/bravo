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
        $specialist = Specialist::findOrFail(extract_id_from_slug($id));
        $popularTour = $specialist->mostPopularTour();
        $newestTours = $specialist->newestResponsibleTours(3);
        $comments = $specialist->loadComments();
        $this->layout->content = View::make(
                        'frontend.specialist.profile', compact('specialist', 'popularTour', 'newestTours', 'comments')
        );
    }

    /**
     * View public profile of specialist
     */
    public function editProfile() {
        $specialist = $this->loggedSpecialist;
        $this->layout->content = View::make('frontend.specialist.edit_profile', compact('specialist'));
    }

    public function updateProfile() {
        $specialist = $this->loggedSpecialist;
        $v = Validator::make(Input::all(), Specialist::updateRules($specialist));
        if ($v->passes()) {
            $specialist->update(Input::all());
            return Redirect::route('specialist.edit_profile');
        } else {
            return Redirect::route('specialist.edit_profile')->withInput()->withErrors($v);
        }
    }

    public function updatePassword() {
        $specialist = $this->loggedSpecialist;
        $v = Validator::make(Input::all(), ['password' => 'required|min:6|confirmed']);
        if ($v->passes()) {
            $specialist->updatePassword(Input::get('password'));
            return Redirect::route('specialist.edit_profile');
        } else {
            return Redirect::route('specialist.edit_profile')->withInput()->withErrors($v);
        }
    }

    /**
     * Customer post a review for specialist
     */
    public function postReview($id) {
        $specialist = Specialist::findOrFail($id);
        $comment = $specialist->buildComment($this->loggedCustomer, Input::all());
        $comment->save();
        return Redirect::route('specialist.profile', $specialist->parameterize());
    }

}

?>