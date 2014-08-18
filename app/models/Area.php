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
                        $country->slug = slug_string($country->name);
                    }
                });
    }

    public function places() {
        return $this->hasMany('Place', 'area_id');
    }

    public function scopeOnMenu($query) {
        return $query->where('is_on_menu', true);
    }

}