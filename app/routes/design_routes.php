<?php

Route::group(array('namespace' => 'Design', 'prefix' => 'design'), function() {
    Route::get('album','DesignController@album'); 
    Route::get('album-city','DesignController@albumCity'); 
    Route::get('album-detail',['uses'=>'DesignController@detailAlbum','as'=>'detail-album']); 
    Route::get('staff','DesignController@staff'); 
});

