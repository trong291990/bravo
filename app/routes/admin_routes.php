<?php

Route::group(array('namespace' => 'Admin', 'prefix' => 'admin'), function() {
     Route::get('/', array('as' => 'admin.root', 'uses' => 'HomeController@index'));
     Route::match(array('GET', 'POST'), '/login', array('as' => 'admin.login', 'uses' => 'AuthController@login'));
     
     Route::group(array('before' => 'admin.auth'), function() {
        // Put authorized routes here
     });
});
