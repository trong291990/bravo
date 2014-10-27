<?php

class AlbumPhoto extends \Eloquent {

    protected $fillable = [];
    protected $table = 'album_photos';
    public $timestamps = false;
    public static function boot() {
        parent::boot();

        static::deleted(function($photo) {
                    // TODO: Delete file
                });
    }

    public static $rules = array(
        'album_id' => 'required'
    );

}