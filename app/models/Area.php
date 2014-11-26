<?php

class Area extends Eloquent {

    protected $table = 'areas';
    public $timestamps = false;
    protected $fillable = [
        'name', 'is_on_menu', 'menu_order', 'keyword', 'meta_keyword'
    ];

    public static function boot() {
        parent::boot();
        static::creating(function($country) {
                    if (!$country->slug) {
                        $country->slug = slug_string($country->name) . '-tours';
                    }
                });
    }

    public function scopeNotIsParent($query) {
        return $query->where('parent_id', '<>', 'NULL');
    }

    public function places() {
        return $this->hasMany('Place', 'area_id');
    }

    public function albums() {
        return $this->hasMany('Album', 'area_id');
    }

    public function mostViewAlbums() {
        return $this->albums()->orderBy('views', 'DESC')->take(4)->get();
    }

    public function tours() {
        return $this->hasMany('Tour', 'area_id');
    }

    public function scopeOnMenu($query) {
        return $query->where('is_on_menu', true);
    }
    
    public static function findByName($name) {
        return static::where('name', 'LIKE', '%' . $name .'%')->first();
    }
    

}