<?php

Route::get('/', array('as' => 'root', 'uses' => 'HomeController@landing'));
Route::get('/tours/search', array('as' => 'tour.search', 'uses' => 'TourController@search'));
Route::get('/tours/{slug}', array('as' => 'area_tours', 'uses' => 'TourController@area'));
Route::get('/tours/{id}/place_coordinates', array('as' => 'tour.load_place_coordinates', 'uses' => 'TourController@placeCoordinates'));
Route::get('/tours/{area_slug}/{tour_slug}', array('as' => 'tour.show', 'uses' => 'TourController@show'));

Route::get('/travel-reviews', array('as' => 'review', 'uses' => 'HomeController@review'));
Route::get('/geo', array('as' => 'geo', 'uses' => 'ToolController@geo'));
Route::get('/tour-slug', array('as' => 'tour.slug', 'uses' => 'ToolController@tourSlug'));
Route::get('/place-slug', array('as' => 'place.slug', 'uses' => 'ToolController@placeSlug'));
Route::post('/package-compare', array('as' => 'package_compare', 'uses' => 'TourController@compare'));
Route::post('/booking', array('as' => 'booking', 'uses' => 'TourController@booking'));
Route::get('/customize-your-trip', array('as' => 'inquiry.create', 'uses' => 'TourController@createInquiry'));
Route::post('/inquiry', array('as' => 'inquiry.store', 'uses' => 'TourController@storeInquiry'));
Route::post('/review/submit', array('as' => 'review_submit', 'uses' => 'ReviewController@submit'));

Route::post('/subscribe', ['as' => 'subscribe_newsletter', 'uses' => 'HomeController@subscribeNewsletter']);
foreach (StaticPage::$VALID_NAMES as $page_name) {
    Route::get('/' . $page_name, [
        'as' => str_replace('-', '_', $page_name),
        'uses' => 'HomeController@staticPage']
    );
}

Route::get('/paymento/confirmpayment', array('uses' => 'PaypalPaymentController@getConfirmpayment'));
Route::resource('payment', 'PaypalPaymentController');
Route::get('/travel-albums', array('as' => 'travel_album' ,'uses' => 'AlbumController@index'));
Route::get('/travel-albums/{area_slug}', array('as' => 'album.area' ,'uses' => 'AlbumController@area'));
Route::get('/travel-albums/{area_slug}/{album_id}', array('as' => 'travel_album.show' ,'uses' => 'AlbumController@show'));
Route::post('/login', ['as' => 'customer_login', 'uses' => 'AuthController@customerLogin']);
Route::get('/logout', ['as' => 'customer_logout', 'uses' => 'AuthController@customerLogout']);
Route::post('/register', ['as' => 'customer_register', 'uses' => 'AuthController@customerRegister']);
Route::get('/facebook-auth', ['as' => 'facebook_auth', 'uses' => 'AuthController@facebook']);
Route::get('/google-auth', ['as' => 'google_auth', 'uses' => 'AuthController@google']);