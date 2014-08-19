<?php

class Place extends Eloquent {

    protected $table = 'places';
    protected $fillable = ['name', 'lat', 'lng'];
    public $timestamps = false;

    public function area() {
        return $this->belongsTo('Area', 'area_id');
    }

    public function photos() {
        return $this->hasMany('PlacePhoto', 'place_id');
    }
    
    public function tours(){
        return $this->belongsToMany('Tour');
    }
}