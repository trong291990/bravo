<?php

class AlbumCategory extends \Eloquent {

    protected $fillable = ['name'];
    protected $table = 'album_categories';
    public static $rules = array(
        'name' => 'required|unique:album_categories'
    );

    public static function boot() {
        parent::boot();
        static::saving(function($cat) {
                    if (!$cat->slug) {
                        $cat->slug = slug_string($cat->name);
                    }
                });
        static::deleting(function($cat) {
                    $cat->albums()->update(['category_id' => NULL]);
                });
    }

    public function albums() {
        return $this->hasMany('Album', 'category_id');
    }

}