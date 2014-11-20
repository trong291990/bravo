<?php

Route::group(array('namespace' => 'Design', 'prefix' => 'design'), function() {
    Route::get('album','DesignController@album'); 
});

