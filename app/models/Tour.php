<?php

class Tour extends Eloquent {

    const PHOTO_PATH = '/uploads/tours/';
    protected $table = 'tours';
    public static $rules = array(
        'name'=>'required',
        'price_from'=>'required'
    );
    public function area() {
        return $this->belongsTo('Area', 'area_id');
    }

    public function itineraries() {
        return $this->hasMany('Itinerary', 'tour_id');
    }

    public function scopeInCountry($query, $country) {
        return $query->where('country_id', $country->id);
    }
    
    public function travelStyles(){
        return $this->belongsToMany('TravelStyle');
    }
    
    public function places(){
        return $this->belongsToMany('Place');
    }
}

?>
