<?php

class Place extends Eloquent {

    protected $table = 'places';
    protected $fillable = ['name', 'lat', 'lng'];
    public $timestamps = false;

    public function places() {
        return $this->belongsTo('Country', 'country_id');
    }

    public function photos() {
        return $this->hasMany('PlacePhoto', 'place_id');
    }

}