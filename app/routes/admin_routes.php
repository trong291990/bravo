<?php

Route::group(array('namespace' => 'Admin', 'prefix' => 'admin'), function() {
    Route::match(array('GET', 'POST'), '/login', array(
        'as' => 'admin.login',
        'uses' => 'AuthController@login'
    ));
    Route::get('/forgot-password', array('as' => 'admin.forgot_password', 'uses' => 'AuthController@forgotPassword'));
    Route::post('/reminder-password', array('as' => 'admin.reminder_password', 'uses' => 'AuthController@reminderPassword'));

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
        Route::get('inquiry', array('as' => 'admin.inquiry.index', 'uses' => 'InquiryController@index'));
        Route::post('inquiry/{id}/mark_resolved', array('as' => 'admin.inquiry.mark_resolved', 'uses' => 'InquiryController@markResolved'));
        Route::get('inquiry/{id}', array('as' => 'admin.inquiry.show', 'uses' => 'InquiryController@show'));
        Route::delete('inquiry/{id}', array('as' => 'admin.inquiry.delete', 'uses' => 'InquiryController@destroy'));

        Route::resource('tour', 'TourController');
        Route::resource('reservation', 'ReservationController');
        Route::resource('contact', 'ContactController');
        Route::resource('album', 'AlbumController');
        Route::resource('customer', 'CustomerController');
        Route::resource('specialist', 'SpecialistController');
        
        Route::post('album/{album_id}/upload-photo', array('as' => 'admin.album.upload_photo', 'uses' => 'AlbumController@uploadPhoto'));
        Route::post('album/delete-photo/{photo_id}', array('as' => 'admin.album.delete_photo', 'uses' => 'AlbumController@deletePhoto'));
        
        Route::get('review', array('as' => 'admin.review.index', 'uses' => 'ReviewController@index'));
        Route::post('review/{id}/approve', array('as' => 'admin.review.approve', 'uses' => 'ReviewController@approve'));
        Route::post('review/{id}/reject', array('as' => 'admin.review.reject', 'uses' => 'ReviewController@reject'));

        Route::post('/tour/{tour_id}/itinerary/update', ['uses' => 'TourController@updateItinerary', 'as' => 'tour.itinerary.update']);
        Route::delete('/tour/{tour_id}/itinerary/{itinerary_id}', ['uses' => 'TourController@deleteItinerary', 'as' => 'tour.itinerary.delete']);
        Route::get('/tour/{tour_id}/itinerary', ['uses' => 'TourController@itinerary', 'as' => 'tour.itinerary.index']);
        Route::get('/setting/edit-terms', ['as' => 'admin.setting.edit_terms', 'uses' => 'SettingController@editTerms']);
        Route::post('/setting/update-terms', ['as' => 'admin.setting.update_terms', 'uses' => 'SettingController@updateTerms']);
        Route::get('/setting/static-pages', ['as' => 'admin.setting.static_pages', 'uses' => 'StaticPageController@index']);

        Route::get('/setting/pages/edit', ['as' => 'admin.static_page.edit', 'uses' => 'StaticPageController@edit']);
        Route::post('/setting/pages/update', ['as' => 'admin.static_page.update', 'uses' => 'StaticPageController@update']);
        Route::resource('booking', 'BookingController');
    });
});
