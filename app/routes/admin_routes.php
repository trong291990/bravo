<?php

Route::group(array('namespace' => 'Admin', 'prefix' => 'admin'), function() {
    Route::match(array('GET', 'POST'), '/login', array(
        'as' => 'admin.login', 
        'uses' => 'AuthController@login'
    ));
    Route::get('/forgot-password', array('as' => 'admin.forgot_password', 'uses' => 'AuthController@forgotPassword')) ;
    Route::post('/reminder-password', array('as' => 'admin.reminder_password', 'uses' => 'AuthController@reminderPassword')) ;
    
    Route::group(array('before' => 'admin.auth'), function() {
        // Put authorized routes here
        Route::get('/', array('as' => 'admin.root', 'uses' => 'HomeController@index'));
        Route::get('/profile', array(
            'as' => 'admin.profile',
            'uses' => 'ProfileController@show'
        ));         
        Route::post('/profile/update', array(
            'as' => 'admin.profile.update',
            'uses' => 'ProfileController@update'
        ));      
        Route::post('/profile/update-password', array(
            'as' => 'admin.profile.update_password',
            'uses' => 'ProfileController@updatePassword'
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

    });
});
