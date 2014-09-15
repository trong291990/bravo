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

                        Route::get('review', array('as' => 'admin.review.index', 'uses' => 'ReviewController@index'));
                        Route::post('review/{id}/approve', array('as' => 'admin.review.approve', 'uses' => 'ReviewController@approve'));
                        Route::post('review/{id}/reject', array('as' => 'admin.review.reject', 'uses' => 'ReviewController@reject'));

                        Route::post('/tour/{tour_id}/itinerary/update', ['uses' => 'TourController@updateItinerary', 'as' => 'tour.itinerary.update']);
                        Route::delete('/tour/{tour_id}/itinerary/{itinerary_id}', ['uses' => 'TourController@deleteItinerary', 'as' => 'tour.itinerary.delete']);
                        Route::get('/tour/{tour_id}/itinerary', ['uses' => 'TourController@itinerary', 'as' => 'tour.itinerary.index']);
                        Route::get('/setting/edit-terms', ['as' => 'admin.setting.edit_terms', 'uses' => 'SettingController@editTerms']);
                        Route::post('/setting/update-terms', ['as' => 'admin.setting.update_terms', 'uses' => 'SettingController@updateTerms']);
                        Route::get('/setting/pages', ['as' => 'admin.setting.static_pages', 'uses' => 'StaticPageController@index']);
                        foreach (StaticPage::$VALID_NAMES as $page_name) {
                            Route::get('/pages/' . $page_name, [
                                'as' => 'admin.edit.' . str_replace('-', '_', $page_name),
                                'uses' => 'StaticPageController@edit']
                            );
                            Route::post('/pages/' . $page_name, [
                                'as' => 'admin.update.' . str_replace('-', '_', $page_name),
                                'uses' => 'StaticPageController@update']
                            );
                        }
                    });
        });
