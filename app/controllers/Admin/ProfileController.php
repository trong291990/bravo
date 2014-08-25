<?php

namespace Admin;

use \Request;
use \Session;
use \Redirect;
use \Input;
use \View;
use \Auth;
use \Validator;
use \AdminUser;

class ProfileController extends AdminBaseController {

    /**
     * GET /admin/profile
     */
    public function show() {
    	$adminAccount = Auth::user();
        $this->layout->content = View::make('admin.profile')
        	->with(compact('adminAccount'));
    }

    public function update() {
    	$adminAccount = Auth::user();
    	$inputs = Input::all();
    	$validator = Validator::make(Input::all(), $adminAccount->updateProfileRules());
    	if($validator->passes()) {
    		$adminAccount->update($inputs);
    		Session::flash('success', 'Your profile has been updated successfully');
    		return Redirect::back();
    	} else {
	        return Redirect::back()->withInput()->withErrors($validator);
    	}
    }   

    public function updatePassword() {
  		$validator = Validator::make(Input::all(), AdminUser::$updatePasswordRules);
    	if($validator->passes()) {
    		$adminAccount = Auth::user();
    		$adminAccount->password = Input::get('password');
    		$adminAccount->save();
    		Session::flash('success', 'Your profile has been updated successfully');
    		return Redirect::back();
    	} else {
	        return Redirect::back()->withInput()->withErrors($validator);
    	}
    }

}

?>
