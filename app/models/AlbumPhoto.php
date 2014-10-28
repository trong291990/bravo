<?php

class AlbumPhoto extends \Eloquent {

    protected $fillable = [];
    protected $table = 'album_photos';
    public $timestamps = false;
    public static function boot() {
        parent::boot();

        static::deleted(function($photo) {
                    File::delete(public_path($photo->thumb_path));
                     File::delete(public_path($photo->origin_path));
                });
    }

    public static $rules = array(
        'album_id' => 'required'
    );

}