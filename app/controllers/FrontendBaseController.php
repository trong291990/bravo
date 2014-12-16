<?php

class FrontendBaseController extends BaseController {

  public function __construct() {
      $this->beforeFilter(function() {
        $this->loggedCustomer = Auth::customer()->get();
        $this->loggedSpecialist = Auth::specialist()->get();
        $wishlist_items = [];
        View::share('loggedCustomer', $this->loggedCustomer);
        View::share('loggedSpecialist', $this->loggedSpecialist);
        if($this->loggedCustomer) {
          $wishlist_items = $this->loggedCustomer->wishlists()->lists('tour_id');
        }
        View::share('wishlist_items', $wishlist_items);
      });
  }
    protected $layout = 'layouts.frontend';

}
?>
