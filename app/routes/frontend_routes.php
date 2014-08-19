<?php

Route::get('/', array('as' => 'root', 'uses' => 'HomeController@landing'));
Route::get('/tours/{slug}', array('as' => 'root', 'uses' => 'TourController@area'));


