<?php

Route::get('/', array('as' => 'root', 'uses' => 'HomeController@landing'));
Route::get('/tours/search', array('as' => 'tour.search', 'uses' => 'TourController@search'));
Route::get('/tours/{slug}', array('as' => 'area_tours', 'uses' => 'TourController@area'));
Route::get('/tours/{id}/place_coordinates', array('as' => 'tour.load_place_coordinates', 'uses' => 'TourController@placeCoordinates'));
Route::get('/tours/{area_slug}/{tour_slug}', array('as' => 'tour.show', 'uses' => 'TourController@show'));

Route::get('/travel-reviews', array('as' => 'review', 'uses' => 'ReviewController@index'));
Route::get('/geo', array('as' => 'geo', 'uses' => 'ToolController@geo'));
Route::get('/tour-slug', array('as' => 'tour.slug', 'uses' => 'ToolController@tourSlug'));
Route::get('/place-slug', array('as' => 'place.slug', 'uses' => 'ToolController@placeSlug'));
Route::post('/package-compare', array('as' => 'package_compare', 'uses' => 'TourController@compare'));
Route::post('/booking', array('as' => 'booking', 'uses' => 'TourController@booking'));
Route::get('/booking/success',['as' => 'booking.success','uses'=>'BookingController@success']);
Route::get('/booking/faild',['as' => 'booking.success','uses'=>'BookingController@faild']);
Route::get('/customize-your-trip', array('as' => 'inquiry.create', 'uses' => 'TourController@createInquiry'));
Route::post('/inquiry', array('as' => 'inquiry.store', 'uses' => 'TourController@storeInquiry'));
Route::post('/subscribe', ['as' => 'subscribe_newsletter', 'uses' => 'HomeController@subscribeNewsletter']);

Route::get('/paymento/confirmpayment', array('uses' => 'PaypalPaymentController@getConfirmpayment'));
Route::resource('payment', 'PaypalPaymentController');


Route::get('/booking/{token}',array('as'=>'booking.form','uses'=>'BookingController@form'));
Route::post('/booking',array('as'=>'booking.deposit','uses'=>'BookingController@deposit'));
Route::get('/booking/confirmpayment',array('as'=>'booking.confirmpayment','uses'=>'BookingController@confirmPayment'));
Route::get('/travel-albums', array('as' => 'travel_album' ,'uses' => 'AlbumController@index'));
Route::get('/travel-albums/{album_id}/download', array('as' => 'travel_album.download' ,'uses' => 'AlbumController@download'));
Route::post('/travel-albums/{album_id}/comments', array('as' => 'travel_album.comment.store' ,'uses' => 'AlbumController@storeComment'));
Route::get('/travel-albums/{area_slug}', array('as' => 'album.area' ,'uses' => 'AlbumController@area'));
Route::get('/travel-albums/{area_slug}/{album_id}', array('as' => 'travel_album.show' ,'uses' => 'AlbumController@show'));
Route::post('/login', ['as' => 'login', 'uses' => 'AuthController@login']);
Route::get('/logout', ['as' => 'logout', 'uses' => 'AuthController@logout']);
Route::post('/register', ['as' => 'customer_register', 'uses' => 'AuthController@customerRegister']);
Route::get('/facebook-auth', ['as' => 'facebook_auth', 'uses' => 'AuthController@facebook']);
Route::get('/google-auth', ['as' => 'google_auth', 'uses' => 'AuthController@google']);

// Customer routes
Route::group(['before' => 'customer.auth'], function() {
    Route::post('/travel-reviews/submit', array('as' => 'review_submit', 'uses' => 'ReviewController@submit'));
    Route::post('/specialist/{id}/post-review', ['as' => 'specialist.post_review', 'uses' => 'SpecialistController@postReview']);
});

// Specialist routes
Route::get('/specialist', ['as' => 'specialist.index', 'uses' => 'SpecialistController@index']);
Route::get('/specialist/profile/{id}', ['as' => 'specialist.profile', 'uses' => 'SpecialistController@profile']);

Route::group(['before' => 'specialist.auth'], function() {
  Route::get('/specialist/my-profile', ['as' => 'specialist.edit_profile', 'uses' => 'SpecialistController@editProfile']);  
  Route::post('/specialist/update-profile', array('as' => 'specialist.update_profile', 'uses' => 'SpecialistController@updateProfile'));
  Route::post('/specialist/update-password', array('as' => 'specialist.update_password', 'uses' => 'SpecialistController@updatePassword'));
  Route::post('/specialist/update-avatar', array('as' => 'specialist.update_avatar', 'uses' => 'SpecialistController@updateAvatar'));
});

// Wishlist routes
Route::get('/wishlist', ['as' => 'wishlist.index', 'uses' => 'WishlistController@index']);
Route::post('/wishlist/add/{tour_id}', ['as' => 'wishlist.add', 'uses' => 'WishlistController@add']);
Route::post('/wishlist/remove/{tour_id}', ['as' => 'wishlist.remove', 'uses' => 'WishlistController@remove']);

foreach (StaticPage::$VALID_NAMES as $page_name) {
    Route::get('/' . $page_name, [
        'as' => str_replace('-', '_', $page_name),
        'uses' => 'HomeController@staticPage']
    );
}
