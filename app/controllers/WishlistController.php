<?php

class WishlistController extends FrontendBaseController {

  public function __construct() {
    parent::__construct();
      $this->beforeFilter(function() {
        if(!$this->loggedCustomer) {
          return Redirect::to(url('/tours/indochina-tours'));
        }
      });
  }

  public function index() {
    $wishlists = $this->loggedCustomer->wishlists()
        ->with('tour')->orderBy('created_at', 'DESC')->get();
    $this->layout->content = View::make('frontend.customer.wishlist.index', compact('wishlists'));
  }

  public function add($tour_id) {
    $this->loggedCustomer->addOrRemoveFromWishlist($tour_id);
    return Response::json([
      'success' => true, 
      'message' => 'The tour has been added to your wishlist'
    ]);
  }

  public function remove($tour_id) {
    $this->loggedCustomer->addOrRemoveFromWishlist($tour_id);
    return Response::json([
      'success' => true, 
      'message' => 'The tour has been removed from your wishlist'
    ]); 
  }    
}
?>