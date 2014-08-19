<?php

Route::get('/', array('as' => 'root', 'uses' => 'HomeController@landing'));
Route::get('/tours/view/{slug}{id}', array('as' => 'root', 'uses' => 'TourController@area'));


