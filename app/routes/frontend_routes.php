<?php

Route::get('/', array('as' => 'root', 'uses' => 'HomeController@landing'));
Route::get('/tours/{slug}', array('as' => 'area_tours', 'uses' => 'TourController@area'));
Route::get('/contact', array('as' => 'contract', 'uses' => 'HomeController@contact'));


