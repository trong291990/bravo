<?php

class CustomerController extends FrontendBaseController {

  public function editProfile() {
    $this->layout->content = View::make('frontend.customer.edit_profile');
  }

  public function updateProfile() {
      $customer = $this->loggedCustomer;
      $v = Validator::make(Input::all(), Customer::updateRules($customer));
      if ($v->passes()) {
          $customer->update(Input::all());
          Session::flash('success', 'Your profile has been updated successfully');
          return Redirect::route('customer.edit_profile');
      } else {
          return Redirect::route('customer.edit_profile')->withInput()->withErrors($v);
      }    
      return Redirect::route('customer.edit_profile');
  }

  public function updatePassword() {
      $customer = $this->loggedCustomer;
      $v = Validator::make(Input::all(), ['password' => 'required|min:6|confirmed']);
      if ($v->passes()) {
          $customer->updatePassword(Input::get('password'));
          Session::flash('success', 'Your passord has been updated successfully');
          return Redirect::route('customer.edit_profile');
      } else {
          return Redirect::route('customer.edit_profile')->withInput()->withErrors($v);
      }
  }
  
}
?>