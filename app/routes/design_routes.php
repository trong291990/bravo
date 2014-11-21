<?php

Route::group(array('namespace' => 'Design', 'prefix' => 'design'), function() {
    Route::get('album','DesignController@album'); 
    Route::get('album-city','DesignController@albumCity'); 
});

