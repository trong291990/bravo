<?php

class BaseController extends Controller {

    public function __construct() {
      $this->beforeFilter(function() {
        View::share('loggedCustomer', Auth::customer()->get());
      });
  }
  protected function setupLayout() {
      if (!is_null($this->layout)) {
          $this->layout = View::make($this->layout);
      }
  }  
}
