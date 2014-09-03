<?php

Route::get('/', array('as' => 'root', 'uses' => 'HomeController@landing'));
Route::get('/tours/search', array('as' => 'tour.search', 'uses' => 'TourController@search'));
Route::get('/tours/{slug}', array('as' => 'area_tours', 'uses' => 'TourController@area'));
Route::get('/tours/{id}/place_coordinates', array('as' => 'tour.load_place_coordinates', 'uses' => 'TourController@placeCoordinates'));
Route::get('/tours/{area_slug}/{tour_slug}', array('as' => 'tour.show', 'uses' => 'TourController@show'));
Route::get('/contact', array('as' => 'contract', 'uses' => 'HomeController@contact'));
Route::get('/about-us', array('as' => 'about_us', 'uses' => 'HomeController@aboutUs'));
Route::get('/review', array('as' => 'review', 'uses' => 'HomeController@review'));
Route::get('/geo', array('as' => 'geo', 'uses' => 'ToolController@geo'));
Route::get('/tour-slug', array('as' => 'tour.slug', 'uses' => 'ToolController@tourSlug'));
Route::get('/place-slug', array('as' => 'place.slug', 'uses' => 'ToolController@placeSlug'));
Route::post('/package-compare', array('as' => 'package_compare', 'uses' => 'TourController@compare'));
Route::post('/booking', array('as' => 'booking', 'uses' => 'TourController@booking'));
Route::get('/customize-your-trip', array('as' => 'inquiry.create', 'uses' => 'TourController@createInquiry'));
Route::post('/inquiry', array('as' => 'inquiry.store', 'uses' => 'TourController@storeInquiry'));
