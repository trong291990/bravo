<?php

Route::get('/', array('as' => 'root', 'uses' => 'HomeController@landing'));
Route::get('/tours/{slug}', array('as' => 'area_tours', 'uses' => 'TourController@area'));
Route::get('/tours/{area_slug}/{tour_slug}', array('as' => 'tour.show', 'uses' => 'TourController@show'));
Route::get('/contact', array('as' => 'contract', 'uses' => 'HomeController@contact'));
Route::get('/about-us', array('as' => 'about_us', 'uses' => 'HomeController@aboutUs'));


