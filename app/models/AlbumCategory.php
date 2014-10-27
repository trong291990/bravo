<?php

class AlbumCategory extends \Eloquent {

    protected $fillable = [];
    protected $table = 'album_categories';
    public static $rules = array(
        'name' => 'required'
    );

}