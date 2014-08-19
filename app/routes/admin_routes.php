<?php

Route::group(array('namespace' => 'Admin', 'prefix' => 'admin'), function() {
     Route::get('/', array('as' => 'admin.root', 'uses' => 'HomeController@index'));
     Route::match(array('GET', 'POST'), '/login', array('as' => 'admin.login', 'uses' => 'AuthController@login'));
     
//     Route::group(array('before' => 'admin.auth'), function() {
        // Put authorized routes here
        Route::get('/profile', array(
            'as' => 'admin.profile',
            'uses' => 'ProfileController@show'
        ));         
        Route::get('/logout', array(
            'as' => 'admin.logout',
            'uses' => 'AuthController@logout',
        ));
        Route::resource('tour', 'TourController');
        Route::resource('reservation', 'ReservationController');

        Route::post('/tour/{tour_id}/itinerary/update', ['uses' => 'TourController@updateItinerary', 'as' => 'tour.itinerary.update']);
        Route::delete('/tour/{tour_id}/itinerary/{itinerary_id}', ['uses' => 'TourController@deleteItinerary', 'as' => 'tour.itinerary.delete']);
        Route::get('/tour/{tour_id}/itinerary', ['uses' => 'TourController@itinerary', 'as' => 'tour.itinerary.index']);

//     });
});
